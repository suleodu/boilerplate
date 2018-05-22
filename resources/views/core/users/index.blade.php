@extends('layouts.app')

@section('app_content')

<section class="row component-section">
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
                                <i class="material-icons pmd-sm pmd-accordion-icon-left">mood</i> Filter User <i class="material-icons md-dark pmd-sm pmd-accordion-arrow">keyboard_arrow_down</i>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <form class="row" role="form">
                                <div class="col-sm-3">
                                    <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                        <label>Filter by Name</label>
                                        <input class="form-control" id="exampleInputEmail2"  type="text"><span class="pmd-textfield-focused"></span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                        <label>Filter by E-mail</label>
                                        <input class="form-control" id="exampleInputEmail2" type="email"><span class="pmd-textfield-focused"></span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                        <label>Filter by Phone</label>
                                        <input class="form-control" id="exampleInputEmail2" type="email"><span class="pmd-textfield-focused"></span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group pmd-textfield pmd-textfield-floating-label">       
                                        <label>Filter by Sex</label>
                                        <select class="select-simple form-control pmd-select2">
                                            <option></option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-sm-3    ">
                                    <button type="submit" class="btn btn-primary pmd-ripple-effect">Search</button>
                                </div>
                            </form>
                        </div>
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
                    <div class="">
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
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody style="overflow-y: scroll">
                                <tr ng-repeat="user in users.data">
                                    <td>@{{$index + 1}}</td>
                                    <td>@{{user.lname}} @{{user.fname}} @{{user.mname}}</td>
                                    <td>@{{user.email}}</td>
                                    <td>@{{user.phone}}</td>
                                    <td>@{{user.sex}}</td>
                                    <td>@{{user.dob}}</td>
                                    <td><span class="badge badge-success">@{{user.status}}</span></td>
                                    <td>
                                        <a href="{{url('/manage/profile')}}/@{{user.id}}" target="tabs"><i class="material-icons pmd-sm">remove_red_eye </i></a>
                                        <a href="#"><i class="material-icons pmd-sm">mode_edit</i></a>
                                        <a href="#"><i class="material-icons pmd-sm">delete</i></a>
                                    </td>  
                                </tr>

                            </tbody>
                        </table>
                    </div>
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
                    <h3 class="pmd-card-title-text">Passport Upload dialog</h3>
                    <span class="pmd-card-subtitle-text">Secondary text</span> 
                </div>
            </div>
            <form action="{{route('create_user')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
                <div class="pmd-modal-action">
                    <button  type="submit" class="btn btn-sm  pmd-ripple-effect btn-primary">Save</button>
                    <button data-dismiss="modal"  type="button" class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary"> close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('components/file-upload/css/upload-file.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('components/file-upload/css/image-upload.css')}}">

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
