@extends('auth.auth_layout')

@section('auth_content')
<div class="login-card">
     <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="pmd-card-title card-header-border text-center">
            <div class="loginlogo">
                <a href="javascript:void(0);"><img src="{{asset('themes/images/logo-icon.png')}}" alt="Logo"></a>
            </div>
            <h3>Sign In <span>with <strong>{{ __('Login') }}</strong></span></h3>
        </div>
        <div class="pmd-card-body">
            <div class="form-group pmd-textfield pmd-textfield-floating-label {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email" class="control-label pmd-input-group-label">{{ __('E-Mail Address') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                @if ($errors->has('email'))
                <p class="help-block" > {{ $errors->first('email') }} </p>
                @endif
            </div>
            
            <div class="form-group pmd-textfield pmd-textfield-floating-label {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password" class="control-label pmd-input-group-label">{{ __('Password') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">lock_outline</i></div>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                @if ($errors->has('password'))
                <div class="help-block"> {{ $errors->first('password') }} </div>
                @endif
            </div>
        </div>
        <div class="pmd-card-footer card-footer-no-border card-footer-p16 text-center">
            <div class="form-group clearfix">
                <div class="checkbox pull-left">
                    <label class="pmd-checkbox checkbox-pmd-ripple-effect">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} >
                        <span class="pmd-checkbox"> {{ __('Remember Me') }}</span>
                    </label>
                </div>
                <span class="pull-right forgot-password">
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                </span>
            </div>
            <button type="submit" class="btn pmd-ripple-effect btn-primary btn-block">{{ __('Login') }}</button>

            <p class="redirection-link">Don't have an account? <a href="{{ route('register') }}" class="login-register">Sign Up</a>. </p>

        </div>

    </form>
</div>

@endsection
