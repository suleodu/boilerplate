@extends('layouts.app')

@section('app_content')


<div class="page-content">
    <div class="row">
        
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pmd-card pmd-card-default pmd-z-depth">
                            <div class="pmd-card-title">
                                <h2 class="pmd-card-title-text">Basic Info</h2>
                                <span class="pmd-card-subtitle-text">Basic profile info</span>	
                            </div>
                            <form method="post" action="{{route('update_next_of_kin')}}">
                                <div class="pmd-card-body">
                                    <div class="row">

                                        <div data-provides="fileinput" class="fileinput fileinput-new col-lg-3">
                                            <div data-trigger="fileinput" class="fileinput-preview thumbnail img-circle img-responsive">
                                                <img src="{{($user->image_url) ? asset('assets/images/users/'.$user->image_url) : asset('themes/images/avtar-b.jpg')}}">
                                            </div>
                                            <div class="action-button"> 
                                                <span class="btn btn-default btn-raised btn-file ripple-effect">
                                                    <span class="fileinput-new"><i class="material-icons md-light pmd-xs">add</i></span>
                                                    <span class="fileinput-exists"><i class="material-icons md-light pmd-xs">mode_edit</i></span>
                                                    <input type="file" name="...">
                                                </span> 
                                                <a data-dismiss="fileinput" class="btn btn-default btn-raised btn-file ripple-effect fileinput-exists" href="javascript:void(0);"><i class="material-icons md-light pmd-xs">close</i></a>
                                            </div>
                                        </div>

                                        <div class="col-lg-9 custom-col-9">
                                            <div class="row">
                                                <div class="form-horizontal">
                                                    <fieldset>
                                                        <div class="form-group prousername pmd-textfield">
                                                            <label class="control-label col-sm-3"> Surname </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="lname" class="form-control empty" id="lname" value="{{$user->lname}}"placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group prousername pmd-textfield">
                                                            <label class="control-label col-sm-3"> First Name </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="fname" class="form-control empty" id="fname" value="{{$user->fname}}"placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group prousername pmd-textfield">
                                                            <label class="control-label col-sm-3"> Other Name </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="lname" class="form-control empty" id="lname" value="{{$user-> mname}}"placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group pmd-textfield">
                                                            <label class="col-sm-3 control-label" for="email">E-mail </label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="email" class="form-control empty" id="email" value="{{$user -> email}}"placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group pmd-textfield">
                                                            <label class="col-sm-3 control-label" for="u_fname">Phone</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="phone" class="form-control empty" id="phone" value="{{$user -> phone}}"placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group pmd-textfield pmd-textfield-floating-label-completed">
                                                            <label class="col-sm-3 control-label" for="sex">Gender</label>
                                                            <div class="col-sm-9">
                                                                <select class="select-simple form-control pmd-select2">
                                                                    <!--<option></option> -->
                                                                    <option></option>
                                                                    <option {{ ($user->sex == 'female')? 'selected': ''}} >Female</option>
                                                                    <option {{ ($user->sex == 'male')? 'selected': ''}} >Male</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group pmd-textfield pmd-textfield-floating-label-completed">
                                                            <label class="col-sm-3 control-label" for="dob">Date of Birth</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" id="datetimepicker-default" class="form-control" value="{{\Carbon\Carbon::parse($user->dob)->format('M d, y')}}" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group pmd-textfield pmd-textfield-floating-label-completed">
                                                            <label class="col-sm-3 control-label" for="address">Address</label>
                                                            <div class="col-sm-9">
                                                                <textarea required="" name="address" class="form-control">{{$user -> address}}</textarea>
                                                            </div>
                                                        </div>

                                                    </fieldset>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="pmd-card-actions right">
                                    <button type="submit" class="btn pmd-btn-flat pmd-ripple-effect btn-primary">Update Profile Info</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <p>&nbsp;</p>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pmd-card pmd-card-default pmd-z-depth">
                            <div class="pmd-card-title">
                                <h2 class="pmd-card-title-text">Next of Kin Info</h2>
                                <span class="pmd-card-subtitle-text">Next of kin information</span>	
                            </div>
                            <form method="post" action="{{route('update_profile')}}">
                                <div class="pmd-card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group pmd-textfield">
                                                <label class="col-md-4 control-label" for="">Full Name </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="next_of_kin_name" class="form-control empty" id="phone" value="{{$user -> next_of_kin_name}}" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group pmd-textfield">
                                                <label class="col-md-4 control-label" for="email">E-mail </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="next_of_kin_email" class="form-control empty" id="phone" value="{{$user -> next_of_kin_email}}" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group pmd-textfield">
                                                <label class="col-md-4 control-label" for="email">Phone </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="next_of_kin_phone" class="form-control empty" id="phone" value="{{$user -> next_of_kin_phone}}" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group pmd-textfield">
                                                <label class="col-md-4 control-label" for="email">Address </label>
                                                <div class="col-md-8">
                                                    <textarea required="" name="address" class="form-control">{{$user -> next_of_kin_address}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="pmd-card-actions right">
                                    <button type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-primary">Update Next of Kin Info</button>
                                    <button class="btn pmd-btn-flat pmd-ripple-effect btn-default" type="button">Action</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        
        
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="pmd-card pmd-card-default pmd-z-depth">
                        <div class="pmd-card-title">
                            <h2 class="pmd-card-title-text">Permissions</h2>
                            <span class="pmd-card-subtitle-text">List of Permissions you have </span>	
                        </div>
                        <div class="pmd-card-body small">
                            <table class="table table-sm header-fixed table-bordered table-condensed" style="height:2px; overflow-y:scroll;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Permissions</th>
                                        <th>&nbsp</th>
                                    </tr>
                                </thead>
                                <tboday>
                                    @foreach($permissions as $key => $perm )
                                    <tr>  
                                        <th>{{++$key}}</th>
                                        <td>{{$perm -> display_name}}</td>
                                        <td>
                                            <span class="dropdown pmd-dropdown clearfix">
                                                <button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button" id="dropdownMenuBottomRight" data-toggle="dropdown" aria-expanded="true"><i class="material-icons pmd-sm">more_vert</i></button>
                                                <ul aria-labelledby="dropdownMenuDivider" role="menu" class="dropdown-menu dropdown-menu-right">
                                                    <li role="presentation"><a href="javascript:void(0);" ng-click="setCurrent(perm)" tabindex="-1" role="menuitem">View details</a></li>
                                                    <li class="divider" role="presentation"></li>
                                                    <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">Separated link</a></li>
                                                </ul>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach


                                </tboday>
                            </table>
                        </div>
                        <div class="pmd-card-actions">
                            <button type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-primary">Primary</button>
                            <button class="btn pmd-btn-flat pmd-ripple-effect btn-default" type="button">Action</button>
                        </div>
                    </div>
                </div>
            </div>
            <p>&nbsp;</p>
            <div class="row">
                <div class="col-md-12">
                    <div class="pmd-card pmd-card-default pmd-z-depth">
                        <div class="pmd-card-title">
                            <h2 class="pmd-card-title-text">Role</h2>
                            <span class="pmd-card-subtitle-text">List of Roles you have</span>	
                        </div>
                        <div class="pmd-card-body">
                            <table class="table table-sm header-fixed table-bordered table-condensed" style="height:2px; overflow-y:scroll;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Role Name</th>
                                    </tr>
                                </thead>
                                <tboday>
                                    @foreach($roles as $key => $role )
                                    <tr>  
                                        <th>{{++$key}}</th>
                                        <td>{{$role -> display_name}}</td>
                                    </tr>
                                    @endforeach

                                </tboday>
                            </table>
                        </div>
                        <div class="pmd-card-actions">
                            <button type="button" class="btn pmd-btn-flat pmd-ripple-effect btn-primary">Primary</button>
                            <button class="btn pmd-btn-flat pmd-ripple-effect btn-default" type="button">Action</button>
                        </div>
                    </div>
                </div>
            </div>


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
<!-- Javascript for Datepicker -->
<script type="text/javascript" language="javascript" src="{{asset('components/datetimepicker/js/moment-with-locales.js')}}"></script>
<script type="text/javascript" language="javascript" src="{{asset('components/datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>

<script>
    // Default date and time picker
    $('#datetimepicker-default').datetimepicker();

</script>

@endpush
