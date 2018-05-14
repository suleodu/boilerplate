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
        $userid = Auth::user()->id;
        
        $this->data['user'] = User::whereId($userid)->first();
        return view('core.profile ', $this->data);
    }
}
