@extends('layouts.app')

@section('app_content')
<section class="row component-section small">

  
    <!-- without background tab code and example -->
    <div class="col-md-12 col-sm-12">
        <div class=" component-box"> 
            <!--without background tab example -->
            <div class="pmd-card pmd-z-depth"> 
                <div class="pmd-tabs">
                    <div class="pmd-tab-active-bar"></div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#permissions" aria-controls="default" role="tab" data-toggle="tab">Permissions</a></li>
                        <li role="presentation"><a href="#roles" aria-controls="fixed" role="tab" data-toggle="tab">Roles</a></li> 
                    </ul>
                </div>
                <div class="pmd-card-body">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="permissions">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        All Permissions
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table class="table pmd-table table-sm table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Permissions name</th>
                                                <th>Permissions Description</th>
                                                <th>
                                                    <div class="form-group-sm pmd-textfield pmd-textfield-floating-label">
                                                        <label for="phone" class="control-label">
                                                            Find *
                                                        </label>
                                                        <input id="regular1" ng-model="seed" class="form-control" type="text"><span class="pmd-textfield-focused"></span>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr ng-repeat="perm in permissions | filter: seed | orderBy:'display_name'" ng-cloak="" ng-if="permissions.length > 0">  
                                                <th>@{{$index + 1}}</th>
                                                <td title="">@{{perm.display_name}}</td>
                                                <td title="">@{{perm.description}}</td>
                                                <td>
                                                    <a href="javascript:void(0);" data-dismiss="modal" ng-click="setCurrent(perm)" class="right pull-right btn btn-xs btn-primary" data-target="#edit_permission" data-toggle="modal" ><i class="material-icons pmd-xs">edit</i></a>
                                                </td> 
                                            </tr>
                                            <tr ng-if="perm.length < 1">
                                                <td colspan="4">
                                                    <div class="alert alert-warning"><p>No Permissions Found</p> </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="roles">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        All Roles 
                                        <button type="button" data-dismiss="modal"  class="right pull-right btn btn-xs btn-primary" data-target="#create_role" data-toggle="modal">add new</button>
                                    </div>

                                </div>
                                <div class="panel-body">
                                    <table class="table pmd-table table-sm table-condensed table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Role Name</th>
                                                <th>Role Name</th>
                                                <th width="15%">
                                                    <div class="form-group-sm pmd-textfield pmd-textfield-floating-label">
                                                        <label for="phone" class="control-label">
                                                            Find *
                                                        </label>
                                                        <input id="regular1" ng-model="seed2" class="form-control" type="text"><span class="pmd-textfield-focused"></span>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr ng-repeat="rl in roles | filter: seed2 | orderBy:'display_name'" ng-cloak="" ng-if="roles.length > 0">  
                                                <th>@{{$index + 1}}</th>
                                                <td title="">@{{rl.display_name}}</td>
                                                <td title="">@{{rl.description}}</td>
                                                <td>
                                                    <a  href="javascript:void(0);" ng-click="setCurrent(rl)" data-target="#edit_role" data-toggle="modal" ><i class="material-icons pmd-xs">mode_edit </i></a>
                                                    <a  href="javascript:void(0);" ng-click="setCurrent(rl); getRolePermissions(rl.id)" title="Assign Permissions" data-target="#role_perm" data-toggle="modal"  ><i class="material-icons pmd-xs">screen_lock_landscape </i></a>
                                                    <a ng-hide="loading == 'role-del_'+ rl.id" href="javascript:void(0);" ng-click="deleteRole(rl, $index)"><i class="material-icons pmd-xs">delete</i></a>
                                                    <img src="{{url('assets/images/min_load.gif')}}" ng-if="loading == 'role-del_'+ rl.id">
                                                </td> 
                                            </tr>
                                            <tr ng-if="roles.length < 1">
                                                <td colspan="3">
                                                    <div class="alert alert-warning"><p>No Role(s) Found </p> </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>        
                    </div>
                </div>
            </div> <!--without background tab example end -->
        </div>

    </div> <!-- without background tab code and example end -->

</section> <!-- end without background tab -->

<!--Edit permission-->
<div tabindex="-1" class="modal  fade" id="edit_permission" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <div class="media-body media-middle">
                    <h3 class="pmd-card-title-text">Update Permission </h3>
                    <span class="pmd-card-subtitle-text"></span> 
                </div>
            </div>
            <form method="post"  action="{{route('update-permission')}}" >
                @csrf
                <div class="modal-body">
                    <div class="group-fields clearfix row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label-active">
                                <label for="regular1" class="control-label">
                                    Permission Name
                                </label>
                                <input id="regular1" readonly=""  class="form-control" type="text" value="@{{current.name}}">
                            </div>
                        </div> 
                    </div>
                    <div class="group-fields clearfix row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label-active">
                                <label for="regular2" class="control-label">
                                    Permission Display Name*
                                </label>
                                <input id="regular2" required="" name="display_name" class="form-control" type="text" value="@{{current.display_name}}">
                            </div>
                        </div> 
                    </div>
                    <div class="group-fields clearfix row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label-active">
                                <label for="regular3" class="control-label">
                                    Permission Description*
                                </label>
                                <textarea rows="2" id="regular3"  name="description" class="form-control" ng-model="current.description"></textarea>
                            </div>
                        </div> 
                    </div>
                </div>
                <input type="hidden" name="edit_id" value="@{{current.id}}">
                <div class="modal-footer">
                    <div class="pmd-card-actions">
                        <button type="submit" class="btn pmd-btn-flat pmd-ripple-effect btn-primary">Update Permission</button>
                        <button aria-hidden="true" data-dismiss="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-default" type="button">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Create Role-->
<div tabindex="-1" class="modal  fade" id="create_role" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <div class="media-body media-middle">
                    <h3 class="pmd-card-title-text">Create new Role </h3>
                    <span class="pmd-card-subtitle-text"></span> 
                </div>
            </div>
            <form method="post"  action="{{route('create-role')}}" >
                @csrf
                <div class="modal-body">
                    <div class="group-fields clearfix row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label-active">
                                <label for="regular1" class="control-label"> 
                                    Role Name
                                </label>
                                <input id="regular1" required=""  name="name" class="form-control" type="text" >
                            </div>
                        </div> 
                    </div>
                    <div class="group-fields clearfix row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label-active">
                                <label for="regular2" class="control-label">
                                    Role Display Name*
                                </label>
                                <input id="regular2" required="" name="display_name" class="form-control" type="text" >
                            </div>
                        </div> 
                    </div>
                    <div class="group-fields clearfix row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label-active">
                                <label for="regular3" class="control-label">
                                    Role Description*
                                </label>
                                <textarea rows="2" id="regular3"  name="description" class="form-control" ></textarea>
                            </div>
                        </div> 
                    </div>
                </div>
                
                <div class="modal-footer">
                    <div class="pmd-card-actions">
                        <button type="submit" class="btn pmd-btn-flat pmd-ripple-effect btn-primary">Create Role</button>
                        <button aria-hidden="true" data-dismiss="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-default" type="button">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!--Edit Role-->
<div tabindex="-1" class="modal  fade" id="edit_role" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <div class="media-body media-middle">
                    <h3 class="pmd-card-title-text">Create new Role </h3>
                    <span class="pmd-card-subtitle-text"></span> 
                </div>
            </div>
            <form method="post"  action="{{route('update-role')}}" >
                @csrf
                <div class="modal-body">
                    <div class="group-fields clearfix row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label-active">
                                <label for="regular1" class="control-label"> 
                                    Role Name
                                </label>
                                <input id="regular1" required=""  name="name" class="form-control" type="text"  value="@{{current.name}}">
                            </div>
                        </div> 
                    </div>
                    <div class="group-fields clearfix row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label-active">
                                <label for="regular2" class="control-label">
                                    Role Display Name*
                                </label>
                                <input id="regular2" required="" name="display_name" value="@{{current.display_name}}" class="form-control" type="text" >
                            </div>
                        </div> 
                    </div>
                    <div class="group-fields clearfix row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label-active">
                                <label for="regular3" class="control-label">
                                    Role Description*
                                </label>
                                <textarea rows="2" id="regular3"  name="description" ng-model="current.description" class="form-control" ></textarea>
                            </div>
                        </div> 
                    </div>
                </div>
                <input type="hidden" name="edit_id" value="@{{current.id}}">
                <div class="modal-footer">
                    <div class="pmd-card-actions">
                        <button type="submit" class="btn pmd-btn-flat pmd-ripple-effect btn-primary">Update Role</button>
                        <button aria-hidden="true" data-dismiss="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-default" type="button">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!--Vew Role permissions-->
<div tabindex="-1" class="modal  fade" id="role_perm" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <div class="media-body media-middle">
                    <h3 class="pmd-card-title-text"> @{{current.name}} available permission(s)</h3>
                </div>
                <button type="button" data-dismiss="modal" ng-click="getAvailRolePermissions(current.id)" class="right pull-right btn btn-xs btn-primary" data-target="#role_add_permission" data-toggle="modal">attach new permission</button> 
            </div>
            <div class="modal-body">
                <table class="table pmd-table table-sm table-condensed table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Permissions Name</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr ng-repeat="perm in rolePerms | orderBy:'name'" ng-cloak="" ng-if="rolePerms.length > 0">  
                            <th>@{{$index + 1}}</th>
                            <td title="">@{{perm.display_name}}</td> 
                            <td>
                                <a ng-hide="loading == 'role-perm-del_'+ perm.id" href="javascript:void(0);" ng-click="deleteRolePerm(perm, current, $index)"><i class="material-icons pmd-xs">delete</i></a>
                                <img src="{{url('assets/images/min_load.gif')}}" ng-if="loading == 'role-perm-del_'+ perm.id">

                            </td> 
                        </tr>
                        <tr ng-if="rolePerms.length < 1">
                            <td colspan="3">
                                <div class="alert alert-warning"><p>No assigned permission(s) found</p> </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <input type="hidden" name="selected_user" value="@{{current.id}}">
            <div class="modal-footer">
                <div class="pmd-card-actions">
                    <button aria-hidden="true" data-dismiss="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-default" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Completed-->

<!--Assign Direct permission-->
<div tabindex="-1" class="modal  fade" id="role_add_permission" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <div class="media-body media-middle">
                    <h3 class="pmd-card-title-text">Assign Permission to Role @{{current.name}}</h3>
                    <span class="pmd-card-subtitle-text">Multiple selection is allowed.</span> 
                </div>
            </div>
            <form method="post"  action="{{route('assign-perm-to-role')}}" >
                @csrf
                <div class="modal-body">
                    <div class="group-fields clearfix row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label-active">       
                                <label>Available Permissions*</label>
                                <select class="select-simple form-control pmd-select2" name="perm_id[]" multiple="" style="width: 450px">
                                    <option></option>
                                    <option  ng-repeat="avail_perm in avail_perms" value="@{{avail_perm.id}}" >@{{avail_perm.display_name}}</option>
                                </select>
                            </div>
                        </div> 
                    </div>
                </div>
                <input type="hidden" name="role_id" value="@{{current.id}}">
                <div class="modal-footer">
                    <div class="pmd-card-actions">
                        <button type="submit" class="btn pmd-btn-flat pmd-ripple-effect btn-primary">Assign Permission(s)</button>
                        <button aria-hidden="true" data-dismiss="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-default" type="button">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--completed-->
@endsection

@push('style')

<!-- Propeller date time picker css-->
<link rel="stylesheet" type="text/css" href="{{asset('components/datetimepicker/css/bootstrap-datetimepicker.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('components/datetimepicker/css/pmd-datetimepicker.css')}}" />

@endpush

@push('script')

<script type="text/javascript" src="{{asset('components/select2/js/pmd-select2.js')}}"></script>

<!--Angular-->
<script type="text/javascript" src="{{asset('js/angular/angular/angular.js')}}"></script>
<script>
    var perms = '<?= $permissions->toJson() ?>';
    var roles = '<?= $roles->toJson() ?>';
    var app = angular.module('App', []);
    
    
    app.controller('PageController', function($scope, $http){
        $scope.permissions = JSON.parse(perms);
        $scope.roles = JSON.parse(roles);
       
        $scope.current = "";
        $scope.setCurrent = function(v){
            $scope.current = v;
        }
        
        $scope.getUserPerm = function(user) {
            $http({
                    method: "GET",
                    url: "api/permissions/"+user
                }).then(function mySucces(response) {
                    $scope.myPerms = response.data;
                }, function myError(err) {
                    toastr.error("Unable to fetch user Permission :"+ err.statusText);
                });
        };
            
            
        $scope.getUserRole = function(user) {
            $http({
                    method: "GET",
                    url: "api/roles/"+user
                }).then(function mySucces(response) {
                    $scope.myRoles = response.data;
                }, function myError(err) {
                    toastr.error("Unable to fetch user Role:"+ err.statusText);
                });
        };
        
        
        $scope.deletePerm = function(perm, user, index){
            if(confirm("Are you sure you want to detach permission ( "+perm.display_name+" ) form( "+ user.lname+" )")){
               $scope.loading = 'perm-del_'+perm.id; 
               $http({
                    method: "POST",
                    url: "api/permission/detache",
                    data: {
                        user_id: user.id,
                        perm_id: perm.id
                        }
                }).then(function mySucces(response) {
                    $scope.loading = false; 
                    $scope.myPerms.splice(index, 1);
                    toastr.success("Permission detach successfully");
                }, function myError(err) {
                    $scope.loading = false;
                    toastr.error("Unable to detach permission! Reason :"+ err.statusText);
                });
            }
        };
        
        
        $scope.deleteRole = function(role,  index){
            if(confirm("Are you sure you want to Delete  Role ( "+role.display_name+" ) ")){
                
               $scope.loading = 'role-del_'+role.id; 
               
               $http({
                    method: "POST",
                    url: "../api/role/delete",
                    data: {
                        role_id: role.id
                        }
                }).then(function mySucces(response) {
                    $scope.loading = false; 
                    $scope.roles.splice(index, 1);
                    toastr.success("Role detach successfully");
                }, function myError(err) {
                    $scope.loading = false;
                    toastr.error("Unable to detach Role! Reason :"+ err.statusText);
                    
                });
            }
        };
        
        
        /**
         * Detached permission from role 
         * @param {type} perm
         * @param {type} role
         * @param {type} index
         * @returns {undefined}
         */
        $scope.deleteRolePerm = function(perm, role, index){
            if(confirm("Are you sure you want to detach permission ( "+perm.display_name+" ) form( "+ role.name+" )")){
               $scope.loading = 'role-perm-del_'+perm.id; 
               $http({
                    method: "POST",
                    url: "../api/role/permission/detache",
                    data: {
                        role_id: role.id,
                        perm_id: perm.id
                        }
                }).then(function mySucces(response) {
                    $scope.loading = false; 
                    $scope.rolePerms.splice(index, 1);
                    toastr.success("Permission detach from role successfully");
                }, function myError(err) {
                    $scope.loading = false;
                    toastr.error("Unable to detach permission! Reason :"+ err.statusText);
                });
            }
        };
        
        
        
        
        /**
         * Get Role permissions 
         * 
         * @param {type} role_id
         * @returns {undefined}
         */
        $scope.getRolePermissions = function(role_id){
            $http({
                    method: "GET",
                    url: "../api/permission/role/"+role_id
                }).then(function mySucces(response) {
                    $scope.rolePerms = response.data;
                    console.log($scope.rolePerms);
                }, function myError(err) {
                    toastr.error("Unable to fetch Roles availble permission :"+ err.statusText);
                });
        };
        
        
        
        $scope.getAvailRolePermissions = function(role_id){
            $http({
                    method: "GET",
                    url: "../api/permission/avail/role/"+role_id
                }).then(function mySucces(response) {
                    $scope.avail_perms = response.data;
                }, function myError(err) {
                    toastr.error("Unable to fetch Roles availble permission :"+ err.statusText);
                });
        };
        
        
        
        $scope.getAvailRoles = function(user){
            $http({
                    method: "GET",
                    url: "api/role/available/"+user
                }).then(function mySucces(response) {
                    $scope.avail_roles = response.data;
                }, function myError(err) {
                    toastr.error("Unable to fetch user availble Role :"+ err.statusText);
                });
        };
        
    });
</script>
@endpush
