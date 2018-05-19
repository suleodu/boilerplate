<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends Controller
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
        
    }
    
    
    public function index()
    {
        
        if(Auth::user()->can('core.self.profile.view'))
        {  
            $this->data['page_title'] = "my Profile";
            $this->data['permissions'] = Auth::user()->allPermissions();
            $this->data['roles'] = Auth::user()->roles;
            $this->data['user'] = User::whereId(Auth::user()->id)->first();
            return view('core.profile ', $this->data);
        }
        
        $notification = array(
            'message' => 'Sorry you do not have permission to perform this operation !', 
            'alert-type' => 'warning'
        );
        return Redirect::to('/home')->with($notification);
    }
    
    
    public function edit()
    {
        if(Auth::user()->can('core.self.profile.edit'))
        {
            $this->data['page_title'] = "Profile Settings";
            $this->data['user'] = Auth::user();
            $this->data['permissions']= Auth::user()->allPermissions();
            $this->data['roles']= Auth::user()->roles;
            return view('core.profile_setting ', $this->data);
        }
        
        $notification = array(
            'message' => 'Sorry you do not have permission to perform this operation !', 
            'alert-type' => 'warning'
        );

        return Redirect::to('/home')->with($notification);
    }
    
    
    
    public function update_next_of_kin(Request $request)
    {   
        
        if (Auth::user()->can('core.self.profile.edit')) {
           
            if($request->method() == 'POST'){
                
                $request->validate([
                    'next_of_kin_name' => 'required|max:255',
                    'next_of_kin_email' => 'required|email|max:255',
                    'next_of_kin_phone' => 'required|max:15',
                    'next_of_kin_address' => 'required',
                ]);
                
                $req = array(
                    'next_of_kin_name' => $request->next_of_kin_name,
                    'next_of_kin_email' => $request->next_of_kin_email,
                    'next_of_kin_phone' => $request->next_of_kin_phone,
                    'next_of_kin_address' => $request->next_of_kin_address
                );
                
              return  $this->update($req);
                
            }
            
            $notification = array(
                'message' => 'Invalid request type!',
                'alert-type' => 'warning'
            );
            return redirect()->route('profile-setting')->with($notification);  
        }

        $notification = array(
            'message' => 'Sorry you do not have permission to perform this operation !',
            'alert-type' => 'warning'
        );
        return redirect()->route('profile-setting')->with($notification);
    }
    
    
    
    public function update_profile(Request $request)
    {
        if (Auth::user()->can('core.self.profile.edit')) {
           
            if($request->method() == 'POST'){
                
                $request->validate([
                    'lname' => 'required|max:255',
                    'email' => 'required|email|max:255',
                    'mname' => 'required',
                    'fname' => 'required',
                    'phone' => 'required|max:15',
                    'sex' => 'required',
                    'dob' => 'required',
                    'address' => 'required',
                ]);
                
                $req = array(
                    'lname' => $request->lname,
                    'email' => $request->email,
                    'mname' => $request->mname,
                    'fname' => $request->fname,
                    'phone' => $request->phone,
                    'sex' => $request->sex,
                    'dob' => \Carbon\Carbon::parse($request->dob)->format('Y/m/d'),
                    'address' => $request->address,
                );
                
              return  $this->update($req);
                
            }
            
            $notification = array(
                'message' => 'Invalid request type!',
                'alert-type' => 'warning'
            );
            return redirect()->route('profile-setting')->with($notification);  
        }

        $notification = array(
            'message' => 'Sorry you do not have permission to perform this operation !',
            'alert-type' => 'warning'
        );
        return redirect()->route('profile-setting')->with($notification);
    }
    
    
    public function upload_image(Request $request)
    {
        if (Auth::user()->can('core.self.profile.edit')) {

            if ($request->method() == 'POST') {
                
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                
                if($request->hasFile('image')){
                    $image_file = $request->file('image');
                    
                    $filename = 'user_'.Auth::user()->id.'.'.$image_file->getClientOriginalExtension();
                    $location = 'assets/images/users/' . $filename;
                    
                    if(Image::make($image_file)->resize(300,300)->save($location)){
                        return $this->update(array('image_url' => $filename));
                    } 
                    $notification = array(
                        'message' => 'Unable to upload your passport. Try again or contact Admin',
                        'alert-type' => 'error'
                    );
                    return redirect()->route('profile-setting')->with($notification);
                }
                $notification = array(
                    'message' => 'No image file found for upload',
                    'alert-type' => 'error'
                );
                return redirect()->route('profile-setting')->with($notification);
            }

            $notification = array(
                'message' => 'Invalid request type!',
                'alert-type' => 'warning'
            );
            return redirect()->route('profile-setting')->with($notification);
        }

        $notification = array(
            'message' => 'Sorry you do not have permission to perform this operation !',
            'alert-type' => 'warning'
        );
        return redirect()->route('profile-setting')->with($notification);
    }
    
    
    public function update_password(Request $request)
    {   
        
        if (Auth::user()->can('core.self.profile.edit')) {

            if ($request->method() == 'POST') {

                $request->validate([
                    'password' => 'required|string|min:6|confirmed',
                ]);
              //dd($request->password);
                //compare current password with auth password 
                if(Hash::check($request->cur_password, Auth::user()->password)  ){
                    //dd(strcmp($request->cur_password, $request->password));
                    //Compare current and new password 
                    if(strcmp($request->cur_password, $request->password) != 0){
                        return $this->update(array('password' => Hash::make($request->password)));
                    }
                    
                    $notification = array(
                        'message' => 'New password can not be same as your current password. Please choose a different password',
                        'alert-type' => 'warning'
                    );
                    return redirect($request->session()->previousUrl())->with($notification);
                }
                $notification = array(
                    'message' => 'Incorect curent password',
                    'alert-type' => 'error'
                );
                return redirect($request->session()->previousUrl())->with($notification);   
            }

            $notification = array(
                'message' => 'Invalid request type!',
                'alert-type' => 'error'
            );
            return redirect($request->session()->previousUrl())->with($notification);
        }

        $notification = array(
            'message' => 'Sorry you do not have permission to perform this operation !',
            'alert-type' => 'warning'
        );
        return redirect($request->session()->previousUrl())->with($notification);  
    }
    
    
    
    private function update(array $data)
    {
        if(User::whereId(Auth::user()->id)->update($data)){
            $notification = array(
                'message' => 'Update successful',
                'alert-type' => 'success'
            );
            return redirect()->route('profile-setting')->with($notification); 
        }
        
        $notification = array(
            'message' => 'Update not successful try again or contact Admin',
            'alert-type' => 'error'
        );
        return redirect()->route('profile-setting')->with($notification); 
    }
    
    
    
}
