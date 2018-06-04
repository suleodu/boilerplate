<?php

use Illuminate\Http\Request;
use App\User;
use App\Permission;
use App\Role;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/permissions/{id}', function(Request $request, $id){ 
    return User::whereId($id)->first()->permissions;
});


Route::get('/roles/{id}', function(Request $request, $id){
    return User::whereId($id)->first()->roles; 
});


Route::get('/role/available/{id}', function(Request $request, $id){
    $roles = User::whereId($id)->first()->roles; 
    $user_role = array();
    foreach ($roles as $role) {
        $user_role[] = $role->id;
    }
    
    return $available_roles = Role::whereNotIn('id', $user_role)->get();
   
});

Route::get('/permission/role/{id}', function(Request $request, $id){
    return Role::whereId($id)->first()->perm;  
});



Route::get('/permission/avail/role/{id}', function(Request $request, $id){
    $assigned_perm = Role::whereId($id)->first()->perm; 
    
    $perm_array = array();
    foreach ($assigned_perm as $prm) {
        $perm_array[] = $prm->id;
    }

    return Permission::whereNotIn('id', $perm_array)->get();
});



Route::get('/permission/available/{id}', function(Request $request, $id){
    $perms = User::whereId($id)->first()->allPermissions(); 
    $user_perm = array();
    foreach ($perms as $perm) {
        $user_perm[] = $perm->id;
    }
    return $available_permissions = Permission::whereNotIn('id', $user_perm)->get();
});


Route::post('/role/permission/detache', function(Request $request){
    return Role::whereId($request->role_id)->first()->detachPermission($request->perm_id);  
});



Route::post('/role/user/detache', function(Request $request){
    return User::whereId($request->user_id)->first()->detachRole($request->role_id);  
});


Route::post('/role/delete', function(Request $request){
    return Role::destroy($request->role_id);
});





