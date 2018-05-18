<!doctype html>
<html lang="{{ app()->getLocale() }}" ng-app="App">
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
        
        <!-- Select2 css-->
        <link rel="stylesheet" type="text/css" href="{{asset('components/select2/css/select2.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('components/select2/css/select2-bootstrap.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('components/select2/css/pmd-select2.css')}}" />
        @stack('style')
    </head>

    <body ng-controller="PageController" >
        @yield('content')

        <!-- Scripts Starts -->
        <script src="{{ asset('assets/js/jquery-1.12.2.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/propeller.min.js') }}"></script>
        
        <!-- Select2 js-->
        <script type="text/javascript" src="{{ asset('components/select2/js/select2.full.js') }}"></script>

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
        <script type="text/javascript" src="{{ asset('components/select2/js/pmd-select2.js') }}"></script>
                
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        
        <script>     
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
            
            @if ($errors->any())
                @foreach($errors->all() as $error)
                    toastr.error("{{$error}}");
                @endforeach
            @endif
        </script>
        <!-- Scripts Ends -->
        @stack('script')
    </body>
</html>