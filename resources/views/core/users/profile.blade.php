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
                        <div class="pmd-card-body">
                            <div class="row">

                                <div data-provides="fileinput" class="fileinput fileinput-new col-lg-3">
                                    <div data-trigger="fileinput" class="fileinput-preview thumbnail img-circle img-responsive">
                                        <img src="{{($user->image_url) ? asset('assets/images/users/'.$user->image_url) : asset('themes/images/avtar-b.jpg')}}">
                                    </div>
                                </div>
                                
                                <div class="col-lg-9 custom-col-9">
                                    <div class="row">
                                        <form class="form-horizontal">
                                            <fieldset>
                                                <div class="form-group prousername pmd-textfield">
                                                    <label class="control-label col-sm-3">Full Name (surnname First )</label>
                                                    <div class="col-sm-9">
                                                        <p class="form-control-static"><strong>{{$user->fname}}, {{$user->lname}} {{$user->mname}}</strong></p>
                                                    </div>
                                                </div>
                                                <div class="form-group pmd-textfield">
                                                    <label class="col-sm-3 control-label" for="email">E-mail </label>
                                                    <div class="col-sm-9">
                                                        <p class="form-control-static"><strong>{{$user->email}}</strong></p>
                                                    </div>
                                                </div>
                                                <div class="form-group pmd-textfield">
                                                    <label class="col-sm-3 control-label" for="u_fname">Phone</label>
                                                    <div class="col-sm-9">
                                                        <p class="form-control-static"><strong>{{$user->phone}}</strong></p>
                                                    </div>
                                                </div>
                                                <div class="form-group pmd-textfield pmd-textfield-floating-label-completed">
                                                    <label class="col-sm-3 control-label" for="sex">Gender</label>
                                                    <div class="col-sm-9">
                                                        <p class="form-control-static"><strong>{{$user->sex}}</strong></p>
                                                    </div>
                                                </div>
                                                <div class="form-group pmd-textfield pmd-textfield-floating-label-completed">
                                                    <label class="col-sm-3 control-label" for="dob">Date of Birth</label>
                                                    <div class="col-sm-9">
                                                        <p class="form-control-static"><strong>{{\Carbon\Carbon::parse($user->dob)->format('M d, y')}}</strong></p>
                                                    </div>
                                                </div>
                                                <div class="form-group pmd-textfield pmd-textfield-floating-label-completed">
                                                    <label class="col-sm-3 control-label" for="address">Address</label>
                                                    <div class="col-sm-9">
                                                        <p class="form-control-static"><strong>{{$user->address}}</strong></p>
                                                    </div>
                                                </div>
                                                
                                            </fieldset>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
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
                        <div class="pmd-card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group pmd-textfield">
                                        <label class="col-md-4 control-label" for="">Full Name </label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"><strong>{{$user->next_of_kin_name }}</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pmd-textfield">
                                        <label class="col-md-4 control-label" for="email">E-mail </label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"><strong>{{$user->next_of_kin_email}}</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group pmd-textfield">
                                        <label class="col-md-4 control-label" for="email">Phone </label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"><strong>{{$user->next_of_kin_phone}}</strong></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group pmd-textfield">
                                        <label class="col-md-4 control-label" for="email">Address </label>
                                        <div class="col-md-8">
                                            <p class="form-control-static"><strong>{{$user->next_of_kin_address}}</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
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
                                    </tr>
                                </thead>
                                <tboday>
                                    @foreach($permissions as $key => $perm )
                                    <tr>  
                                        <th>{{++$key}}</th>
                                        <td title="{{$perm->description}}">{{$perm->display_name}}</td> 
                                    </tr>
                                    @endforeach
                                </tboday>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
            <p>&nbsp;</p>
            <div class="row">
                <div class="col-md-12 small">
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
                                        <th>Permissions</th>
                                    </tr>
                                </thead>
                                <tboday>
                                    @foreach($roles as $key => $role )
                                    <tr>  
                                        <th>{{++$key}}</th>
                                        <td title="{{$role->description}}">{{$role->display_name}}</td>
                                    </tr>
                                    @endforeach
                                    
                                </tboday>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>

<!--            <p>&nbsp;</p>
            <div class="row">
                <div class="col-md-12">
                    <div class="pmd-card pmd-card-default pmd-z-depth">
                        <div class="pmd-card-title">
                            <h2 class="pmd-card-title-text">Team</h2>
                            <span class="pmd-card-subtitle-text">List of team you belong to</span>	
                        </div>
                        <div class="pmd-card-body">
                            <table class="table table-sm header-fixed table-bordered table-condensed" style="height:2px; overflow-y:scroll;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Permissions</th>
                                    </tr>
                                </thead>
                                <tboday>
                                    @foreach($permissions as $key => $perm )
                                    <tr>  
                                        <th>{{++$key}}</th>
                                        <td>{{$perm->display_name}}</td>
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
            </div>-->
        </div>
    </div>
</div>
@endsection

@push('style')

@endpush

@push('script')

@endpush
