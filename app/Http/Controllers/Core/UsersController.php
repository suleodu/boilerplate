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
        $data['users'] = User::paginate(15);
        
        return view('core.users.index', $data);
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
        return redirect()->route('home')->with($notification);
    }
    
    
    public function create_user(Request $request)
    {
        
    }
    
    
    
    
}
