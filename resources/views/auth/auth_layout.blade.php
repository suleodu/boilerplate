@extends('layouts.main')

@section('content')
    <div class="logincard">
        <div class="pmd-card card-default pmd-z-depth">
            @yield('auth_content')
        </div>
    </div>
@endsection