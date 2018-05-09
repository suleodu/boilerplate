@extends('layouts.app')

@section('app_content')
<section class="row component-section">
    <!-- Basic Bootstrap Table code and example -->
    <div class="col-md-12">
        <div class="component-box">
            <!-- Basic Bootstrap Table example -->
            <div class="pmd-card pmd-z-depth pmd-card-custom-view">
                <div class="table-responsive">
                    <table class="table" id="table-bootstrap" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Code</th>
                                <th>State/City <span class="caret shoarting"></span> </th>
                                <th>End Date of Work</th>
                                <th>Status</th>
                                <th>Timesheet</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Giacomo Guilizzoni</td>
                                <td>JONEA140</td>
                                <td>Melbourne</td>
                                <td>1 June 2014</td>
                                <td>Active</td>
                                <td>Timesheet</td>
                                <td><a href="javascript:void(0);"><i class="material-icons md-dark pmd-sm">more_vert</i></a></td>
                            </tr>
                            <tr>
                                <td>Giacomo Guilizzoni</td>
                                <td>JONEA140</td>
                                <td>Melbourne</td>
                                <td>1 June 2014</td>
                                <td>Active</td>
                                <td>Timesheet</td>
                                <td><a href="javascript:void(0);"><i class="material-icons md-dark pmd-sm">more_vert</i></a></td>
                            </tr>
                            <tr>
                                <td>Giacomo Guilizzoni</td>
                                <td>JONEA140</td>
                                <td>Melbourne</td>
                                <td>1 June 2014</td>
                                <td>Active</td>
                                <td>Timesheet</td>
                                <td><a href="javascript:void(0);"><i class="material-icons md-dark pmd-sm">more_vert</i></a></td>
                            </tr>
                            <tr>
                                <td>Giacomo Guilizzoni</td>
                                <td>JONEA140</td>
                                <td>Melbourne</td>
                                <td>1 June 2014</td>
                                <td>Active</td>
                                <td>Timesheet</td>
                                <td><a href="javascript:void(0);"><i class="material-icons md-dark pmd-sm">more_vert</i></a></td>
                            </tr>
                            <tr>
                                <td>Giacomo Guilizzoni</td>
                                <td>JONEA140</td>
                                <td>Melbourne</td>
                                <td>1 June 2014</td>
                                <td>Active</td>
                                <td>Timesheet</td>
                                <td><a href="javascript:void(0);"><i class="material-icons md-dark pmd-sm">more_vert</i></a></td>
                            </tr>
                            <tr>
                                <td>Giacomo Guilizzoni</td>
                                <td>JONEA140</td>
                                <td>Melbourne</td>
                                <td>1 June 2014</td>
                                <td>Active</td>
                                <td>Timesheet</td>
                                <td><a href="javascript:void(0);"><i class="material-icons md-dark pmd-sm">more_vert</i></a></td>
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
@endpush

@push('script')

<script src="{{asset('components/file-upload/js/upload-image.js')}}"></script>
@endpush
