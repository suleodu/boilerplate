@extends('layouts.app')

@section('app_content')

<section class="row component-section small">
    <!-- Basic Bootstrap Table code and example -->
    <div class="row">
        <div class="col-md-10">

        </div>
        <div class="col-md-offset-10 col-md-2" style="margin-top: 20px">
            <a href="javascript:void(0);" data-target="#create-school" class="btn btn-primary" data-toggle="modal">Add New School</a>
        </div>
    </div>
    <p>&nbsp;</p>
    <div class="row">
        <div class="col-md-12">
            <div class="component-box">
                <!-- Basic Bootstrap Table example -->
                <div class="pmd-card pmd-card-default pmd-z-depth">
                    <div class="pmd-card-body">
                        <div class="table-responsive table-responsive-md">
                            <table class="table pmd-table table-sm  table-condensed table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Logo</th>
                                        <th>Short Name</th>
                                        <th>Full Name</th>
                                        <th>Status</th>
                                        <th>
                                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                <label for="seed" class="control-label">
                                                    Find *
                                                </label>
                                                <input id="regular1" ng-model="seed" class="form-control" type="text"><span class="pmd-textfield-focused"></span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="school in schools.data| filter: seed" ng-if="schools.data.length > 0" ng-cloak="">
                                        <td>@{{$index + 1}}</td>
                                        <td><img class="avatar-list-img40x40 img-responsive" scr="{{asset('assets/school_logo/')}}@{{school.short_logo}}"></td>
                                        <td>@{{school.short_name}}</td>
                                        <td>@{{school.sch_name}}</td>

                                        <td><span class="badge badge-success">@{{school.status}}</span></td>
                                        <td>
                                            <a href="javascript:void(0);" ng-click="setCurrent(school)" data-target="#view-school" data-toggle="modal"><i class="material-icons pmd-sm ">eye_open</i></a>
                                            <a href="javascript:void(0);" ng-click="setCurrent(school)" data-target="#edit-school" data-toggle="modal"><i class="material-icons pmd-sm ">mode_edit</i></a>
                                            <a href="#"><i class="material-icons pmd-sm">delete</i></a>
                                        </td>  
                                    </tr>
                                    <tr ng-if="school.data.length < 1">
                                        <td colspan="8"><div class="alert alert-warning">No record found</div></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="pmd-card pmd-card-default pmd-z-depth">
                    <div class="pmd-card-body">
                        {{$schools -> links()}}
                    </div>
                </div>
            </div> <!-- Basic Bootstrap Table example end-->
        </div>
    </div>
</section>
<!--Create new User Modal-->
<div tabindex="-1" class="modal fade" id="create-school" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <div class="media-body media-middle">
                    <h3 class="pmd-card-title-text">Create New School</h3>
                    <span class="pmd-card-subtitle-text">Secondary text</span> 
                </div>
            </div>
            <form action="{{route('create-user')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="group-fields clearfix row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label for="surnname" class="control-label">
                                    Surname *
                                </label>
                                <input id="regular1"  required="" name="lname" class="form-control" type="text"><span class="pmd-textfield-focused"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label for="fname" class="control-label">
                                    First Name*
                                </label>
                                <input id="regular1" required="" name="fname" class="form-control" type="text"><span class="pmd-textfield-focused"></span>
                            </div>
                        </div>
                    </div>
                    <div class="group-fields clearfix row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label for="phone" class="control-label">
                                    Phone*
                                </label>
                                <input id="regular1" name="phone" required="" class="form-control" type="text"><span class="pmd-textfield-focused"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label for="email" class="control-label">
                                    Email*
                                </label>
                                <input id="email"  name="email" required="" class="form-control" type="email"><span class="pmd-textfield-focused"></span>
                            </div>
                        </div>
                    </div>
                    <div class="group-fields clearfix row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">       
                                <label>Sex*</label>
                                <select class="select-simple form-control pmd-select2" name="sex">
                                    <option></option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label for="password" class="control-label">
                                    Password*
                                </label>
                                <input id="password"  name="password" required="" class="form-control" type="password"><span class="pmd-textfield-focused"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pmd-modal-action">
                    <button  type="submit" class="btn btn-sm  pmd-ripple-effect btn-primary">Create</button>
                    <button data-dismiss="modal"  type="button" class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary"> close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--Edit User Modal-->
<div tabindex="-1" class="modal fade" id="edit-user" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <div class="media-body media-middle">
                    <h3 class="pmd-card-title-text">Edit User</h3>
                    <span class="pmd-card-subtitle-text">Secondary text</span> 
                </div>
            </div>
            <form action="{{route('update-user')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="group-fields clearfix row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group pmd-textfield  pmd-textfield-floating-label-active">
                                <label for="surnname" class="control-label">
                                    Surname *
                                </label>
                                <input id="regular1"  required="" name="lname"class="form-control" type="text" value="@{{current.lname}}" >
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label-active">
                                <label for="fname" class="control-label">
                                    First Name*
                                </label>
                                <input id="regular1"  required="" name="fname" class="form-control" type="text" value="@{{current.fname}}">
                            </div>
                        </div>

                    </div>
                    <div class="group-fields clearfix row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label-active">
                                <label for="phone" class="control-label">
                                    Phone*
                                </label>
                                <input id="regular1" name="phone" required="" class="form-control" type="text" value="@{{current.phone}}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label-active">
                                <label for="email" class="control-label">
                                    Email*
                                </label>
                                <input id="email"  name="email" required="" class="form-control" type="email" value="@{{current.email}}">
                            </div>
                        </div>
                    </div>
                    <div class="group-fields clearfix row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label-active">       
                                <label>Status*</label>
                                <select class="select-simple form-control pmd-select2" name="status">
                                    <option></option>
                                    <option value="active" ng-selected="current.status == 'active'">Active</option>
                                    <option value="inactive" ng-selected="current.status == 'inactive'">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label for="password" class="control-label">
                                    Password*
                                </label>
                                <input id="password"  name="password"  class="form-control" type="password">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="edit_id" value="@{{current.id}}">
                <div class="pmd-modal-action">
                    <button  type="submit" class="btn btn-sm  pmd-ripple-effect btn-primary">Update</button>
                    <button data-dismiss="modal"  type="button" class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary"> close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!--Role n perm-->
<div tabindex="-1" class="modal  fade" id="roles_n_perm" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <div class="media-body media-middle">
                    <h3 class="pmd-card-title-text">Assign Roles Or Permission to @{{current.fname}}</h3>
                    <span class="pmd-card-subtitle-text">Secondary text</span> 
                </div>
            </div>
            <div class="modal-body">
                <div class="group-fields clearfix row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 small">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Directly Assigned Permission 
                                    <button type="button" data-dismiss="modal" ng-click="getAvailPermissions(current.id)" class="right pull-right btn btn-xs btn-primary" data-target="#add_permission" data-toggle="modal">add new</button>
                                </div>

                            </div>
                            <div class="panel-body">
                                <table class="table pmd-table table-sm table-condensed table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Permissions Name</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr ng-repeat="perm in myPerms" ng-cloak="" ng-if="myPerms.length > 0">  
                                            <th>@{{$index + 1}}</th>
                                            <td title="">@{{perm.display_name}}</td> 
                                            <td>
                                                <a ng-hide="loading == 'perm-del_' + perm.id" href="javascript:void(0);" ng-click="deletePerm(perm, current, $index)"><i class="material-icons pmd-xs">delete</i></a>
                                                <img src="{{url('assets/images/min_load.gif')}}" ng-if="loading == 'perm-del_' + perm.id">

                                            </td> 
                                        </tr>
                                        <tr ng-if="myPerms.length < 1">
                                            <td colspan="3">
                                                <div class="alert alert-warning"><p>No directly assigned permission(s) found</p> </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 small">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Assigned Roles 
                                    <button type="button" data-dismiss="modal" ng-click="getAvailRoles(current.id)" class="right pull-right btn btn-xs btn-primary" data-target="#add_role" data-toggle="modal">add new</button>
                                </div>

                            </div>
                            <div class="panel-body">
                                <table class="table pmd-table table-sm table-condensed table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Role Name</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr ng-repeat="rl in myRoles" ng-cloak="" ng-if="myRoles.length > 0">  
                                            <th>@{{$index + 1}}</th>
                                            <td title="">@{{rl.display_name}}</td> 
                                            <td>
                                                <a ng-hide="loading == 'role-del_' + rl.id" href="javascript:void(0);" ng-click="deleteRole(rl, current, $index)"><i class="material-icons pmd-xs">delete</i></a>
                                                <img src="{{url('assets/images/min_load.gif')}}" ng-if="loading == 'role-del_' + rl.id">
                                            </td> 
                                        </tr>
                                        <tr ng-if="myRoles.length < 1">
                                            <td colspan="3">
                                                <div class="alert alert-warning"><p>No Role(s) assigned </p> </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Assign Direct permission-->
<div tabindex="-1" class="modal  fade" id="add_permission" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <div class="media-body media-middle">
                    <h3 class="pmd-card-title-text">Assign Permission to @{{current.fname}}</h3>
                    <span class="pmd-card-subtitle-text">Multiple selection is allowed.</span> 
                </div>
            </div>
            <form method="post"  action="{{route('assign-direct-perm')}}" >
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
                <input type="hidden" name="selected_user" value="@{{current.id}}">
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

<!--assing role-->
<div tabindex="-1" class="modal fade" id="add_role" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <div class="media-body media-middle">
                    <h3 class="pmd-card-title-text">Assign Roles to <b/>@{{current.fname}}</b></h3>
                    <span class="pmd-card-subtitle-text">Multiple selection is allowed.</span> 
                </div>
            </div>
            <form method="post"  action="{{route('assign-role')}}" >
                @csrf
                <div class="modal-body">
                    <div class="group-fields clearfix row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group pmd-textfield pmd-textfield-floating-label-active">       
                                <label>Available Role*</label>
                                <select class="select-simple form-control pmd-select2" name="role_id[]" multiple="" style="width: 450px">
                                    <option></option>
                                    <option  ng-repeat="avail_role in avail_roles" value="@{{avail_role.id}}" >@{{avail_role.display_name}}</option>
                                </select>
                            </div>
                        </div> 
                    </div>
                </div>
                <input type="hidden" name="selected_user" value="@{{current.id}}">
                <div class="modal-footer">
                    <div class="pmd-card-actions">
                        <button type="submit" class="btn pmd-btn-flat pmd-ripple-effect btn-primary">Assign Role(s)</button>
                        <button aria-hidden="true" data-dismiss="modal" class="btn pmd-btn-flat pmd-ripple-effect btn-default" type="button">cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
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
    var schools = '<?= $schools->toJson() ?>';
    var app = angular.module('App', []);


    app.controller('PageController', function ($scope, $http) {
        $scope.schools = JSON.parse(schools);

        $scope.current = "";
        $scope.setCurrent = function (v) {
            $scope.current = v;
        };

    });
</script>
@endpush
