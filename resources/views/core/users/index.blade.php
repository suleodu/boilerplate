@extends('layouts.app')

@section('app_content')

<section class="row component-section small">
    <!-- Basic Bootstrap Table code and example -->
    <div class="col-md-10">
        <!--Accordion with Icons code and example  -->
        <div class="component-box">
            <!--Accordion with icons example -->
            <div class="panel-group pmd-accordion" id="accordion3" role="tablist" aria-multiselectable="true"> 
                <div class="panel"> 
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title"> 
                            <a data-toggle="collapse" data-parent="#accordion3" href="#collapseOne3" aria-expanded="false" aria-controls="collapseOne3" data-expandable="false" class="collapsed">
                                <i class="material-icons pmd-sm pmd-accordion-icon-left">filter_list </i> Filter User <i class="material-icons md-dark pmd-sm pmd-accordion-arrow">keyboard_arrow_down</i>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                        <form  role="form"  method="post" action="{{route('user-management')}}">
                            @csrf
                           
                            <div class="panel-body">
                                <div class="group-fields clearfix row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                            <label for="surnname" class="control-label">
                                                Surname*
                                            </label>
                                            <input id="regular1" name="filt_lname" class="form-control" value="{{old('filt_lname')}}" type="text"><span class="pmd-textfield-focused"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                            <label for="fname" class="control-label">
                                                First Name*
                                            </label>
                                            <input id="regular1" name="filt_fname" class="form-control" value="{{old('filt_fname')}}" type="text"><span class="pmd-textfield-focused"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                            <label for="mname" class="control-label">
                                                Other Name*
                                            </label>
                                            <input id="regular1" name="filt_mname" value="{{old('filt_mname')}}" class="form-control" type="text"><span class="pmd-textfield-focused"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="group-fields clearfix row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                            <label for="email" class="control-label">
                                                Email *
                                            </label>
                                            <input id="email" name="filt_email" value="{{old('filt_email')}}" class="form-control" type="email"><span class="pmd-textfield-focused"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                            <label for="phone" class="control-label">
                                                Phone No.*
                                            </label>
                                            <input id="regular1" name="filt_phone" value="{{old('filt_phone')}}" class="form-control" type="text"><span class="pmd-textfield-focused"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                            <label for="sex" class="control-label">
                                                Sex*
                                            </label>
                                            <select class="select-simple form-control pmd-select2" name="filt_sex">
                                                <option></option>
                                                <option value="male" <?= (old('sex') == 'male') ? 'select' : '' ?>>Male</option>
                                                <option value="female" <?= (old('sex') == 'female') ? 'select' : '' ?>>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                            <button type="submit" class="btn btn-primary pmd-ripple-effect">Search</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div> 
            <!--Accordion with icons example end -->

        </div> <!--Accordion with Icons code and example  end-->
    </div>
    <div class="col-md-2" style="margin-top: 20px">
        <a href="javascript:void(0);" data-target="#create-user" class="btn btn-primary" data-toggle="modal">Add New User</a>
    </div>
    <div class="col-md-12">
        <div class="component-box">
            <!-- Basic Bootstrap Table example -->
            <div class="pmd-card pmd-card-default pmd-z-depth">
                <div class="pmd-card-body">
                    <div class="table-responsive table-responsive-md">
                        <table class="table table-condensed table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>phone</th>
                                    <th>Sex</th>
                                    <th>DoB</th>
                                    <th>Status</th>
                                    <th>
                                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                            <label for="phone" class="control-label">
                                               Find *
                                            </label>
                                            <input id="regular1" ng-model="seed" class="form-control" type="text"><span class="pmd-textfield-focused"></span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="user in users.data | filter: seed" ng-if="users.data.length > 0" ng-cloak="">
                                    <td>@{{$index + 1}}</td>
                                    <td>@{{user.lname}} @{{user.fname}} @{{user.mname}}</td>
                                    <td>@{{user.email}}</td>
                                    <td>@{{user.phone}}</td>
                                    <td>@{{user.sex}}</td>
                                    <td>@{{user.dob}}</td>
                                    <td><span class="badge badge-success">@{{user.status}}</span></td>
                                    <td>
                                        <a href="{{url('/manage/profile')}}/@{{user.id}}" target="tabs"><i class="material-icons pmd-sm">remove_red_eye </i></a>
                                        <a href="javascript:void(0);" ng-click="setCurrent(user)" data-target="#edit-user" data-toggle="modal"><i class="material-icons pmd-sm ">mode_edit</i></a>
                                        <a href="#"><i class="material-icons pmd-sm">delete</i></a>
                                    </td>  
                                </tr>
                                <tr ng-if="users.data.length < 1">
                                    <td colspan="8"><div class="alert alert-warning">No record found</div></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="pmd-card pmd-card-default pmd-z-depth">
                <div class="pmd-card-body">
                    {{$users->links()}}
                </div>
            </div>
        </div> <!-- Basic Bootstrap Table example end-->
    </div>
    
</section>
<!--Create new User Modal-->
<div tabindex="-1" class="modal fade" id="create-user" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <div class="media-body media-middle">
                    <h3 class="pmd-card-title-text">Add New User</h3>
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
                                <input id="regular1" required="" name="fname" class="form-control" type="text" value="@{{current.fname}}">
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
                                    <option value="active" ng-selected="current.status == 'active' ">Active</option>
                                    <option value="inactive" ng-selected="current.status == 'inactive' ">Inactive</option>
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
    var users = '<?= $users->toJson() ?>';
    var app = angular.module('App', []);
    
    
    app.controller('PageController', function($scope){
        $scope.users = JSON.parse(users);
        console.log($scope.users.data);
//        $scope.roles = JSON.parse(role);
//        $scope.teams = JSON.parse(team);
        
        $scope.current = "";
        $scope.setCurrent = function(v){
            console.log(v);
            $scope.current = v;
        }
        
    });
</script>
@endpush
