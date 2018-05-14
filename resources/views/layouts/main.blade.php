<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Login | Propeller - Admin Dashboard">
        <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('themes/images/favicon.ico') }}">

        <!-- Google icon -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Bootstrap css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

        <!-- Propeller css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/propeller.min.css') }}">

        <!-- Propeller theme css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('themes/css/propeller-theme.css') }}" />

        <!-- Propeller admin theme css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('themes/css/propeller-admin.css') }}">
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        @stack('style')
    </head>

    <body >
        @yield('content')

        <!-- Scripts Starts -->
        <script src="{{ asset('assets/js/jquery-1.12.2.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/propeller.min.js') }}"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        
        <script>
            //toastr.options.closeButton = true;
//            toastr.options.showEasing = 'easeOutBounce';
//            toastr.options.hideEasing = 'easeInBack';
//            toastr.options.closeEasing = 'easeInBack';
//            toastr.options.showMethod = 'slideDown';
//            toastr.options.hideMethod = 'slideUp';
//            toastr.options.closeMethod = 'slideUp';
            
            
            
            @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;

                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;

                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;

                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
              }
            @endif
            
            @if(Session::has('error'))
                dd($errors)
                @foreach($errors as $error)
                    toastr.error("{{$error}}");
                @endforeach
            @endif
        </script>
        <!-- Scripts Ends -->
        @stack('script')
    </body>
</html>