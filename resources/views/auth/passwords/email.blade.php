@extends('auth.auth_layout')

@section('auth_content')
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->

<div class="login-card">
     <form method="POST" action="{{ route('password.email') }}">
        @csrf
        
        
        <div class="pmd-card-title card-header-border text-center">
            <div class="loginlogo">
                <a href="javascript:void(0);"><img src="{{asset('themes/images/logo-icon.png')}}" alt="Logo"></a>
            </div>
            <h3>{{ __('Reset Password') }}</h3>
        </div>
        @if (session('status'))
            <div class="alert alert-warning" role="alert"> {{ $session('status') }} </div>
        @endif
        <div class="pmd-card-body">
            @if ($errors->has('email'))
            <div class="alert alert-warning" role="alert"> {{ $errors->first('email') }} </div>
            @endif
            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                <label for="inputError1" class="control-label pmd-input-group-label">{{ __('E-Mail Address') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" id="exampleInputAmount">
                </div>
            </div>
            
        </div>
        <div class="pmd-card-footer card-footer-no-border card-footer-p16 text-center">
            <button type="submit" class="btn pmd-ripple-effect btn-primary btn-block">{{ __('Send Password Reset Link') }}</button>
        </div>

    </form>
</div>
@endsection
