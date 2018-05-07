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
            @if ($errors->has('lname'))
            <div class="alert alert-warning" role="alert"> {{ $errors->first('lname') }} </div>
            @endif
            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                <label for="inputError1" class="control-label pmd-input-group-label">{{ __('Last Name') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
                    <input type="text" name="lname" class="form-control {{ $errors->has('lname') ? ' is-invalid' : '' }}" id="exampleInputAmount">
                </div>
            </div>
            
            @if ($errors->has('fname'))
            <div class="alert alert-warning" role="alert"> {{ $errors->first('fname') }} </div>
            @endif
            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                <label for="inputError1" class="control-label pmd-input-group-label">{{ __('First Name') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
                    <input type="text" name="fname" class="form-control {{ $errors->has('fname') ? ' is-invalid' : '' }}" id="exampleInputAmount">
                </div>
            </div>
            
            @if ($errors->has('email'))
            <div class="alert alert-warning" role="alert"> {{ $errors->first('email') }} </div>
            @endif
            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                <label for="inputError1" class="control-label pmd-input-group-label">{{ __('E-Mail Address') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputAmount">
                </div>
            </div>
            
            @if ($errors->has('phone'))
            <div class="alert alert-warning" role="alert"> {{ $errors->first('phone') }} </div>
            @endif
            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                <label for="inputError1" class="control-label pmd-input-group-label">{{ __('Phone Number') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">phone</i></div>
                    <input type="phone" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" id="exampleInputAmount">
                </div>
            </div>
            
            @if ($errors->has('password'))
                <div class="alert alert-success" role="alert"> {{ $errors->first('password') }} </div>
            @endif
            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                <label for="inputError1" class="control-label pmd-input-group-label">{{ __('Password') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">lock_outline</i></div>
                    <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="exampleInputAmount">
                </div>
            </div>
             @if ($errors->has('password'))
                <div class="alert alert-success" role="alert"> {{ $errors->first('re_password') }} </div>
            @endif
            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                <label for="inputError1" class="control-label pmd-input-group-label">{{ __('Re-type Password') }}</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">lock_outline</i></div>
                    <input type="password" class="form-control {{ $errors->has('re_password') ? ' is-invalid' : '' }}" id="exampleInputAmount">
                </div>
            </div>
        </div>
        <div class="pmd-card-footer card-footer-no-border card-footer-p16 text-center">         
            <button type="submit" class="btn pmd-ripple-effect btn-primary btn-block">{{ __('Register') }}</button>
            <p class="redirection-link">have an account? <a href="{{ route('login') }}" class="login-register">Sign In</a>. </p>
        </div>
    </form>
</div>
@endsection
