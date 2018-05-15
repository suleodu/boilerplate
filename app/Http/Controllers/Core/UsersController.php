<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    
    
    public function users()
    {
        $data['page_title'] = "User Management";
        return view('users.index', $data);
    }
    
    
    
    public function profile()
    {
        
        $this->data['page_title'] = "Profile";
        $user = Auth::user();
        $this->data['permissions']= $user->allPermissions();
        $this->data['roles']= $user->roles;
        //$this->data['teams']= $user->teams;
        $this->data['user'] = User::whereId($user->id)->first();
        return view('core.profile ', $this->data);
    }
    
    
    
    public function profile_settings(){
        
        $user = Auth::user();
        
        if(Auth::user()->can('core.self.profile.edit')){
            $this->data['page_title'] = "Profile Settings";
            $this->data['user'] = $user;
            $this->data['permissions']= $user->allPermissions();
            $this->data['roles']= $user->roles;
            
            return view('core.profile_setting ', $this->data);
        }
        
        $notification = array(
            'message' => 'Sorry you do not have permission to perform this operation !', 
            'alert-type' => 'warning'
        );

        return Redirect::to('/home')->with($notification);
    }
    
    
    public function update_next_of_kin(Request $request){
        //TODO: update next on kin info 
        //redirect back to profile setting showing notification of 
        //update successfull
    }
    
    public function update_profile(Request $request){
        //TODO: update profile info 
        //redirect back to profile setting showing notification of 
        //update successfull
    }
    
    
    
}
