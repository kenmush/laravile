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
    <link href="{{asset('admins/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admins/assets/images/favicon.png')}}">
    <title>Admin - CoveredPress</title>
    <!-- Custom CSS -->
    {{-- <link href="{{asset('admins/dist/css/style.min.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    @stack('css')
</head>

<body>

        @yield('content')

        <script src="{{asset('admins/assets/libs/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('admins/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{asset('admins/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- apps -->
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
        {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}
    @stack('script')
</body>

</html>
