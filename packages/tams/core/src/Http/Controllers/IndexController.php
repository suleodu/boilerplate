<?php
namespace Tams\Core\Http\Controllers;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct() {
        
    }
    
    
    public function index(Request $request)
    {
        $data['page_title'] = "TAMS CORE";
        return view('TamsCore::index', $data);
    }
    
    
    public function test(Request $request)
    {
        return view('TamsCore::test');
    }
    
    
    public function school(Request $request)
    {
        return view('TamsCore::school');
    }
}
