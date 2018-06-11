<?php
namespace Tams\Core\Http\Controllers;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __construct() {
        $data['module_name'] = "tams_core";
    }
    
    
    public function index(Request $request)
    {
        $data['page_title'] = "TAMS CORE";
        return view('TamsCore::index', $data);
    }
}
