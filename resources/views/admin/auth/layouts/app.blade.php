<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Admin Dashboard</title>
    <!-- Custom CSS -->
    <link href="{{asset('admins/dist/css/style.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>


        @yield('content')
    {{-- toast --}}
    <style>
        .toast{
            border: none!important
        }
    </style>
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade shadow mt-3 mr-3 @if(Session::has('success') || Session::has('failure'))show @else hide @endif" data-autohide="false" style="position: fixed; top: 78px; right: 8px;">
        <div class="toast-header text-white @if(Session::has('success')) bg-primary @elseif(Session::has('failure')) bg-danger @endif">
            @if(Session::has('success'))<i class="fa fa-check-circle mr-1"></i> <strong class="mb-0  mr-auto">Succes</strong>  @elseif(Session::has('failure'))<i class="fa fa-times-circle mr-1"></i> <p class="mb-0 font-weight-bold">Error</p> @endif
            <strong class="mr-auto"></strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="toast-body">@if(Session::has('success')) {{Session::get('success')}} @elseif(Session::has('failure')) {{Session::get('failure')}} @endif</div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{asset('admins/assets/libs/jquery/dist/jquery.min.js')}} "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('admins/assets/libs/popper.js/dist/umd/popper.min.js')}} "></script>
    <script src="{{asset('admins/assets/libs/bootstrap/dist/js/bootstrap.min.js')}} "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();

        $('.toast button').on('click',() => {
            $('.toast').hide()
        });
        setTimeout(() => {
        $('.toast').hide()},3000);
    </script>
</body>

</html>
