@extends('layouts.app')

@section('app_content')
<div class="card">
    <div class="card-heading">
        <h2>Core Dashboard</h2>
        
    </div>
    <div class="card-body bg-light lt">
        
        <div class="row text-center">
            <div class="col-sm-3">
                <div class="panel bg-primary pos-rlt">
                    <span class="arrow top b-primary"></span>
                    <a href="{{route('manage-school')}}" class="panel-body">
                        School
                    </a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel bg-info pos-rlt">
                    <span class="arrow top b-info"></span>
                    <div class="panel-body">
                        Sub School
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel bg-success pos-rlt">
                    <span class="arrow top b-success"></span>
                    <div class="panel-body">
                        College
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel bg-warning pos-rlt">
                    <span class="arrow top b-warning"></span>
                    <div class="panel-body">
                        Department
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-3">
                <div class="panel b-a bg-light pos-rlt">
                    <span class="arrow top b-light"></span>
                    <div class="panel-body">
                        Programme
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel bg-dark pos-rlt">
                    <span class="arrow top b-dark"></span>
                    <div class="panel-body">
                        Session
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel bg-accent pos-rlt">
                    <span class="arrow top b-accent"></span>
                    <div class="panel-body">
                        Course
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>


@endsection


@push('style')

@endpush
