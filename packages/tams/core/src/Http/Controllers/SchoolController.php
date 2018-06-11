<?php
namespace Tams\Core\Http\Controllers;

use App\Http\Controllers\Controller;
use Tams\Core\Models\School;

use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $data['module_name'] = "tams_core";
        
    }
    
    
    public function index(Request $request)
    {
        $school = School::query();
        
        $data['schools'] = $school->paginate(20);
        $data['page_title'] = "TAMS CORE - School Setup";
        return view('TamsCore::school', $data);
        
    }
    
    
}
