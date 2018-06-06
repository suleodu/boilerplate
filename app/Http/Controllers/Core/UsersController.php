<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Role;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller
{
    private $data;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->data['module_name'] = 'main';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('home', $this->data);
    }
    
    
    
    public function users(Request $request)
    {
        //dd(url('api'));
        $user = User::query();
        
        if($request->has('filt_fname') && $request->filt_fname !="") {
            $user->where('fname','like', '%'.$request->filt_fname.'%');
        } 
        
        if($request->has('filt_lname') && $request->filt_lname !="") {
           $user->where('lname','like', '%'.$request->filt_lname.'%');
        } 
        
        if($request->has('filt_mname') && $request->filt_mname !="") {
            $user->where('mname','like', '%'.$request->filt_mname.'%');
        } 
        
        if($request->has('filt_email') && $request->filt_email !="") {
            $user->whereEmail($request->filt_email);
        } 
        
        if($request->has('filt_phone') && $request->filt_phone !="") {
            $user->wherePhone($request->filt_phone);
        }
        
        if($request->has('filt_sex') && $request->filt_sex !="") {
            $user->whereSex($request->filt_sex);
        }
        
        $this->data['page_title'] = "User Management";
        $this->data['users'] = $user->paginate(20);
        return view('core.users.index', $this->data);
    }
    
    
    
    
    public function profile($id)
    {
        if(Auth::user()->can('core.others.profile.view'))
        {  
            $user = User::whereId($id)->first();
            $this->data['page_title'] = "{$user->fname}'s Profile";
            $this->data['permissions'] = $user->allPermissions();
            $this->data['roles'] = $user->roles;
            $this->data['user'] = $user;
            
            return view('core.users.profile ', $this->data);
        }
        $notification = array(
            'message' => 'Sorry you do not have permission to perform this operation !', 
            'alert-type' => 'warning'
        );
        return redirect()->route('user-management')->with($notification);
    }
    
    
    
    
    
    public function create_user(Request $request)
    {
         
        if (Auth::user()->can('core.others.profile.create')) {
           
            if($request->method() == 'POST'){
                
                $request->validate([
                    'fname' => 'required|max:255',
                    'lname' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'phone' => 'required|max:15|unique:users',
                    'sex' => 'required',
                    'password'=> 'required'   
                ]);
                
                $req = array(
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'sex' => $request->sex,
                    'status' => 'inactive',
                    'password' => Hash::make($request->password)
                );

                $user = User::create($req);
                $role = Role::whereName('user')->first();
                $user->attachRole($role);
                
                $notification = array(
                    'message' => 'Operation successful',
                    'alert-type' => 'success'
                );
                return redirect()->route('user-management')->with($notification);  
            }
            
            $notification = array(
                'message' => 'Invalid request type!',
                'alert-type' => 'warning'
            );
            return redirect()->route('user-management')->with($notification);  
        }
        
        $notification = array(
            'message' => 'Sorry you do not have permission to perform this operation!',
            'alert-type' => 'warning'
        );
        return redirect()->route('user-management')->with($notification);
    
    }
    
    
    
    public function update_user(Request $request) {
        
        if (Auth::user()->can('core.others.profile.edit')) {

            if ($request->method() == 'POST') {

                $request->validate([
                    'email' => 'required|email|max:255',
                    'fname' => 'required|max:255',
                    'lname' => 'required|max:255',
                    'phone' => 'required|max:15',
                    'status' => 'required'
                ]);

                $req = array(
                    'email' => $request->email,
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'phone' => $request->phone,
                    'status' => $request->status,
                );
                if($request->has('password')){
                    $req['password'] = Hash::make($request->password);
                }

                return $this->update($req, $request->edit_id);
            }

            $notification = array(
                'message' => 'Invalid request type!',
                'alert-type' => 'warning'
            );
            return redirect()->route('user-management')->with($notification);
        }

        $notification = array(
            'message' => 'Sorry you do not have permission to perform this operation !',
            'alert-type' => 'warning'
        );
        return redirect()->route('user-management')->with($notification);
    }

    
    public function assign_direct_perm(Request $request)
    {
        
        
        if (Auth::user()->can('core.acl.assign_perm')) {

            if ($request->method() == 'POST') {

                $request->validate([
                    'perm_id' => 'required',
                    'selected_user' => 'required',
                ]);
                
                $user = User::whereId($request->selected_user)->first();
                $assigned = $user->attachPermissions($request->perm_id);
                
                $notification = array(
                            'message' => 'Update successful',
                            'alert-type' => 'success'
                        );
                return redirect()->route('user-management')->with($notification);
                
            }

            $notification = array(
                'message' => 'Invalid request type!',
                'alert-type' => 'warning'
            );
            return redirect()->route('user-management')->with($notification);
        }

        $notification = array(
            'message' => 'Sorry you do not have permission to perform this operation !',
            'alert-type' => 'warning'
        );
        return redirect()->route('user-management')->with($notification);
    }
    
    
    public function assign_role(Request $request)
    {
        
        
        if (Auth::user()->can('core.acl.assign_role')) {

            if ($request->method() == 'POST') {

                $request->validate([
                    'role_id' => 'required',
                    'selected_user' => 'required',
                ]);
                //TODO: Get the user collection of the $user_id
                //attach all the permission
                $user = User::whereId($request->selected_user)->first();
                $assigned = $user->attachRoles($request->role_id);
                
                $notification = array(
                            'message' => 'Update successful',
                            'alert-type' => 'success'
                        );
                return redirect()->route('user-management')->with($notification);
                
            }

            $notification = array(
                'message' => 'Invalid request type!',
                'alert-type' => 'warning'
            );
            return redirect()->route('user-management')->with($notification);
        }

        $notification = array(
            'message' => 'Sorry you do not have permission to perform this operation !',
            'alert-type' => 'warning'
        );
        return redirect()->route('user-management')->with($notification);
    }
    
    
    private function update(array $data, $id) 
    {
        if (User::whereId($id)->update($data)) {
            $notification = array(
                'message' => 'Update successful',
                'alert-type' => 'success'
            );
            return redirect()->route('user-management')->with($notification);
        }

        $notification = array(
            'message' => 'Update not successful try again or contact Admin',
            'alert-type' => 'error'
        );
        return redirect()->route('user-management')->with($notification);
    }

    
    
}
