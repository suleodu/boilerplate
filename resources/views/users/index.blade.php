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
        <button type="button" class="btn btn-primary" > Add New User </button>
    </div>
    <div class="col-md-12">
        <div class="component-box">
            <!-- Basic Bootstrap Table example -->
            <div class="pmd-card pmd-z-depth pmd-card-custom-view">
                <div class="table-responsive">
                    <table class="table" id="table-bootstrap " cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Email<span class="caret shoarting"></span> </th>
                                <th>phone</th>
                                <th>Sex</th>
                                <th>DoB</th>
                                <th>Status</th>
                                <th><button type="button" class="btn btn-primary" > Add New User </button></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Adedayo Sule-Odu</td>
                                <td>suleodu.adedayo@gmail.com</td>
                                <td>+2348074000367</td>
                                <td>Male</td>
                                <td>1st Aprill 2018</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <span class="dropdown pmd-dropdown clearfix">
                                        <button class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect btn-primary" type="button" id="dropdownMenuBottomRight" data-toggle="dropdown" aria-expanded="false"><i class="material-icons pmd-sm">more_vert</i></button>
                                        <div class="pmd-dropdown-menu-container"><div class="pmd-dropdown-menu-bg pmd-dropdown-menu-bg-right"></div><ul aria-labelledby="dropdownMenuDivider" role="menu" class="dropdown-menu dropdown-menu-right pm-ini" style="clip: rect(0px, 160px, 0px, 160px);">
                                                <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">Action</a></li>
                                                <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">Another action</a></li>
                                                <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">Something else here</a></li>
                                                <li class="divider" role="presentation"></li>
                                                <li role="presentation"><a href="javascript:void(0);" tabindex="-1" role="menuitem">Separated link</a></li>
                                            </ul></div>
                                    </span>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- Basic Bootstrap Table example end-->
    </div>
</section>
@endsection

@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('components/file-upload/css/upload-file.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('components/file-upload/css/image-upload.css')}}">

<!-- Propeller date time picker css-->
<link rel="stylesheet" type="text/css" href="{{asset('components/datetimepicker/css/bootstrap-datetimepicker.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('components/datetimepicker/css/pmd-datetimepicker.css')}}" />

<!-- Select2 css-->
<link rel="stylesheet" type="text/css" href="{{asset('components/select2/css/select2.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('components/select2/css/select2-bootstrap.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('components/select2/css/pmd-select2.css')}}" />
@endpush

@push('script')

<script src="{{asset('components/file-upload/js/upload-image.js')}}"></script>
<script type="text/javascript" src="{{asset('components/select2/js/select2.full.js')}}"></script>
<!-- Propeller Select2 -->
<script type="text/javascript">
	$(document).ready(function() {
		<!-- Simple Selectbox -->
		$(".select-simple").select2({
			theme: "bootstrap",
			minimumResultsForSearch: Infinity,
		});
		<!-- Selectbox with search -->
		$(".select-with-search").select2({
			theme: "bootstrap"
		});
		<!-- Select Multiple Tags -->
		$(".select-tags").select2({
			tags: false,
			theme: "bootstrap",
		});
		<!-- Select & Add Multiple Tags -->
		$(".select-add-tags").select2({
			tags: true,
			theme: "bootstrap",
		});
	});
</script>
<script type="text/javascript" src="{{asset('components/select2/js/pmd-select2.js')}}"></script>
@endpush
