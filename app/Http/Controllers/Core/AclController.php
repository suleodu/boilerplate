<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Permission;
use App\Role;

class AclController extends Controller
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
        $this->data['page_title'] = 'ACL Management';
    }
    
    
    public function index() 
    {       
        $this->data['permissions'] = Permission::all();
        $this->data['roles'] = Role::all();
        return view('core.acl', $this->data);
    }
    
    
    public function update_permission (Request $request)
    {
        if (Auth::user()->can('core.acl.permission.update')) {
            if ($request->method() == 'POST') {
                $request->validate([
                    'display_name' => 'required',
                ]);
                $req = array(
                    'display_name' => $request->display_name
                );
                if ($request->has('description')) {
                    $req['description'] = $request->description;
                }
                return $this->update_perm($req, $request->edit_id);
            }

            $notification = array(
                'message' => 'Invalid request type!',
                'alert-type' => 'warning'
            );
            return redirect()->route('acl-management')->with($notification);
        }

        $notification = array(
            'message' => 'Sorry you do not have permission to perform this operation !',
            'alert-type' => 'warning'
        );
        return redirect()->route('acl-management')->with($notification);
    }
    
    

    private function update_perm(array $data, $id) 
    {
        if (Permission::whereId($id)->update($data)) {
            $notification = array(
                'message' => 'Update successful',
                'alert-type' => 'success'
            );
            return redirect()->route('acl-management')->with($notification);
        }

        $notification = array(
            'message' => 'Update not successful try again or contact Admin',
            'alert-type' => 'error'
        );
        return redirect()->route('acl-management')->with($notification);
    }
    
    
    
    private function update_rl(array $data, $id) 
    {
        if (Role::whereId($id)->update($data)) {
            $notification = array(
                'message' => 'Update successful',
                'alert-type' => 'success'
            );
            return redirect()->route('acl-management')->with($notification);
        }

        $notification = array(
            'message' => 'Update not successful try again or contact Admin',
            'alert-type' => 'error'
        );
        return redirect()->route('acl-management')->with($notification);
    }
    
    
    
    public function update_role(Request $request) {
        if (Auth::user()->can('core.acl.role.update')) {
            if ($request->method() == 'POST') {
                $request->validate([
                    'name' => 'required',
                    'display_name' => 'required',
                ]);
                $req = array(
                    'name' => $request->name,
                    'display_name' => $request->display_name
                );
                if ($request->has('description')) {
                    $req['description'] = $request->description;
                }
                return $this->update_rl($req, $request->edit_id);
            }

            $notification = array(
                'message' => 'Invalid request type!',
                'alert-type' => 'warning'
            );
            return redirect()->route('acl-management')->with($notification);
        }

        $notification = array(
            'message' => 'Sorry you do not have permission to perform this operation !',
            'alert-type' => 'warning'
        );
        return redirect()->route('acl-management')->with($notification);
    }

    
    
    public function create_role(Request $request)
    {
        if (Auth::user()->can('core.acl.role.create') || true) {
            if ($request->method() == 'POST') {
                $request->validate([
                    'name' => 'required|unique:roles',
                    'display_name' => 'required',
                    'description' => 'required',
                ]);
                $req = array(
                    'name' => $request->name,
                    'display_name' => $request->display_name,
                    'description' => $request->description,
                );
                
                if (Role::create($req)) {
                    $notification = array(
                        'message' => 'Operation successful',
                        'alert-type' => 'success'
                    );
                    return redirect()->route('acl-management')->with($notification);
                }

                $notification = array(
                    'message' => 'Update not successful try again or contact Admin',
                    'alert-type' => 'error'
                );
                return redirect()->route('acl-management')->with($notification);
            }

            $notification = array(
                'message' => 'Invalid request type!',
                'alert-type' => 'warning'
            );
            return redirect()->route('acl-management')->with($notification);
        }

        $notification = array(
            'message' => 'Sorry you do not have permission to perform this operation !',
            'alert-type' => 'warning'
        );
        return redirect()->route('acl-management')->with($notification);
    }

    
    
    
    public function assign_perm_to_role(Request $request)
    {
        if (Auth::user()->can('core.acl.role.perm.assign') || true) {

            if ($request->method() == 'POST') {

                $request->validate([
                    'perm_id' => 'required',
                    'role_id' => 'required',
                ]);

                $role = Role::whereId($request->role_id)->first();
                $assigned = $role->attachPermissions($request->perm_id);

                $notification = array(
                    'message' => 'Opperation successful',
                    'alert-type' => 'success'
                );
                return redirect()->route('acl-management')->with($notification);
            }

            $notification = array(
                'message' => 'Invalid request type!',
                'alert-type' => 'warning'
            );
            return redirect()->route('acl-management')->with($notification);
        }

        $notification = array(
            'message' => 'Sorry you do not have permission to perform this operation !',
            'alert-type' => 'warning'
        );
        return redirect()->route('acl-management')->with($notification);
    }
}
