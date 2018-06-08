<?php
namespace Tams\Core\Http\Controllers;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function __construct() {
        
    }
    
    
    public function index(Request $request)
    {
        $data['page_title'] = "TAMS CORE- School";
        //return view('TamsCore::index', $data);
        return "This is my School Controller";
    }
    
    
}
