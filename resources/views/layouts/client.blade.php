<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admins/assets/images/favicon.png')}}">
    <title>Client - CoveredPress</title>
    <!-- Custom CSS -->
    <link href="{{asset('admins/assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('admins/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('admins/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{asset('admins/dist/css/style.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    @stack('css')
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        {{-- navbar --}}
        @include('client.includes.header')

        {{-- sidebar --}}
        @include('client.includes.sidebar')

        @yield('content')


    </div>
    {{-- toast --}}
    <style>
        .toast {
            border: none !important
        }
    </style>
    <div role="alert" aria-live="assertive" aria-atomic="true"
        class="toast fade shadow mt-3 mr-3 @if(Session::has('success') || Session::has('failure'))show @else hide @endif"
        data-autohide="false" style="position: fixed; top: 78px; right: 8px;">
        <div
            class="toast-header text-white @if(Session::has('success')) bg-primary @elseif(Session::has('failure')) bg-danger @endif">
            @if(Session::has('success'))<i class="fa fa-check-circle mr-1"></i> <strong
                class="mb-0  mr-auto">Succes</strong> @elseif(Session::has('failure'))<i
                class="fa fa-times-circle mr-1"></i>
            <p class="mb-0 font-weight-bold">Error</p> @endif
            <strong class="mr-auto"></strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="toast-body">@if(Session::has('success')) {{Session::get('success')}}
            @elseif(Session::has('failure')) {{Session::get('failure')}} @endif</div>
    </div>
    <div>

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('admins/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('admins/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('admins/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- apps -->
    @stack('script')
    <!-- apps -->
    <script src="{{asset('admins/dist/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('admins/dist/js/feather.min.js')}}"></script>
    <script src="{{asset('admins/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('admins/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('admins/dist/js/custom.min.js')}}"></script>
    <!--This page JavaScript -->
    <script src="{{asset('admins/assets/extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{asset('admins/assets/extra-libs/c3/c3.min.js')}}"></script>
    <script src="{{asset('admins/assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('admins/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('admins/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('admins/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('admins/dist/js/pages/dashboards/dashboard1.min.js')}}"></script>

    <script>
        $('.toast button').on('click',() => {
            $('.toast').hide()
        });
        setTimeout(() => {
        $('.toast').hide()},3000);

        $('.dropdown-toggle').click(function(){
            $('.dropdown-menu').toggle()
        })
    </script>

</body>

</html>
