@extends('auth.auth_layout')

@section('auth_content')


<div class="login-card">
     <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="pmd-card-title card-header-border text-center">
            <div class="loginlogo">
                <a href="javascript:void(0);"><img src="{{asset('themes/images/logo-icon.png')}}" alt="Logo"></a>
            </div>
            <h3>Sign In <span>with <strong>{{ __('Registration') }}</strong></span></h3>
        </div>
        <div class="pmd-card-body">
            
            <div class="form-group pmd-textfield pmd-textfield-floating-label {{ $errors->has('lname') ? 'has-error' : '' }}">
                <label for="lname" class="control-label pmd-input-group-label">{{ __('Last Name') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
                    <input type="text" name="lname" class="form-control" id="lname">
                </div>
                @if ($errors->has('lname'))
                <p class="help-block" role="alert"> {{ $errors->first('lname') }} </p>
                @endif
            </div>
            
            <!--First name-->
            <div class="form-group pmd-textfield pmd-textfield-floating-label {{ $errors->has('fname') ? 'has-error' : '' }}">
                <label for="fname" class="control-label pmd-input-group-label">{{ __('First Name') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
                    <input type="text" name="fname" class="form-control" id="fname">
                </div>
                @if ($errors->has('fname'))
                <p class="help-block"> {{ $errors->first('fname') }} </p>
                @endif
            </div>
            
            <!--Email-->
            <div class="form-group pmd-textfield pmd-textfield-floating-label {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label pmd-input-group-label">{{ __('E-Mail Address') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
                    <input type="email"  name="email" class="form-control " id="email">
                </div>
                @if ($errors->has('email'))
                <p class="help-block"> {{ $errors->first('email') }} </p>
                @endif
            </div>
            
            
            <div class="form-group pmd-textfield pmd-textfield-floating-label {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone" class="control-label pmd-input-group-label">{{ __('Phone Number') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">phone</i></div>
                    <input type="text" name="phone" class="form-control" id="phone">
                </div>
                @if ($errors->has('phone'))
                <p class="help-block"> {{ $errors->first('phone') }} </div>
                @endif
            </div>
           
            <!--password-->
            <div class="form-group pmd-textfield pmd-textfield-floating-label  {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password" class="control-label pmd-input-group-label">{{ __('Password') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">lock_outline</i></div>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                @if ($errors->has('password'))
                <p class="help-block"> {{ $errors->first('password') }} </p>
                @endif
            </div>
        
            <!--password confirmation--> 
            <div class="form-group pmd-textfield pmd-textfield-floating-label {{ $errors->has('password_confirmation') ? ' has-error' : '' }} ">
                <label for="password_confirmation" class="control-label pmd-input-group-label">{{ __('Confirm Password') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">lock_outline</i></div>
                    <input type="password" name="password_confirmation" class="form-control " id="password_confirmation">
                </div>
                @if ($errors->has('password_confirmation'))
                <p class="help-block"> {{ $errors->first('password_confirmation') }} </p>
                @endif
            </div>
        </div>
        <div class="pmd-card-footer card-footer-no-border card-footer-p16 text-center">         
            <button type="submit" class="btn pmd-ripple-effect btn-primary btn-block">{{ __('Register') }}</button>
            <p class="redirection-link">have an account? <a href="{{ route('login') }}" class="login-register">Sign In</a>. </p>
        </div>
    </form>
</div>
@endsection
