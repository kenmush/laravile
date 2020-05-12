<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admins/assets/images/favicon.png')}}">
    <title>Client - CoveredPress</title>
    <link href="{{asset('admins/assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('admins/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('admins/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/dist/css/style.min.css')}}" rel="stylesheet">
    <style>
        #coverage .feather-book-open {
            transform: scale(3.5)
        }

        #coverage button {
            border-radius: 1.2em;
        }

        #coverage .title {
            font-size: 12px;
            font-weight: 500
        }

        #coverage .overlay {
            position: absolute;
            background: rgba(0, 0, 0, 0.6);
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .overlay {
            visibility: hidden;
            transition: .3s ease-in-out
        }

        .card-coverage:hover .overlay {
            visibility: visible;

        }
    </style>

</head>

<body>
    <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md">
            <div class="navbar-header" data-logobg="skin6">
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
                <div class="navbar-brand">
                    <a href="{{ url('client/dashboard') }}">
                        <span class="logo-text">
                            <img src="{{asset('admins/assets/images/logo-text.png')}}" alt="homepage"
                                class="dark-logo')}}" />

                        </span>
                    </a>
                </div>
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" style="visibility:hidden"
                    href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="ti-more"></i>
                </a>
            </div>
            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <ul class="navbar-nav float-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex" href="javascript:void(0)" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            @if(isset(Auth::user()->profile_picture))
                            <div style="background:url({{Storage::url(Auth::user()->profile_picture)}})no-repeat center/cover; width:45px;height:45px"
                                alt="user" class="rounded-circle p-2 m-auto">
                            </div>
                            @else
                            <div style="background:url(https://1.bp.blogspot.com/--ucL-rXn-Ec/VLwta4arOvI/AAAAAAAABHU/LzjxpJ_cA-g/s1600/wallpaper-for-facebook-profile-photo-738967.jpg)no-repeat center/cover; width:45px;height:45px"
                                alt="user" class="rounded-circle p-2 m-auto">
                            </div>
                            @endif
                            <span class="ml-2 d-none d-lg-inline-block">
                                <span>Hello,</span>
                                <span class="text-dark">{{Auth::user()->email}}</span>
                                <i data-feather="chevron-down" class="svg-icon"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"><i data-feather="power"
                                    class="svg-icon mr-2 ml-1"></i>
                                Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="page-wrapper p-5">
        <div class="page-breadcrumb">
            <div class="row mb-5">
                <div class="col-7 align-self-center">
                    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome, {{ $client->name }}!
                    </h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="{{ url('client/dashboard') }}">Dashboard</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card-group">
                        <div class="card border-right">
                            <div class="card-body">
                                <div class="d-flex d-lg-flex d-md-block align-items-center">
                                    <div>
                                        <div class="d-inline-flex align-items-center">
                                            <h2 class="text-dark mb-1 font-weight-medium">
                                                {{ $client->reports()->count() }}
                                            </h2>
                                        </div>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Reports
                                        </h6>
                                    </div>
                                    <div class="ml-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="file-text"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-right">
                            <div class="card-body">
                                <div class="d-flex d-lg-flex d-md-block align-items-center">
                                    <div>
                                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">
                                            </sup>{{ $urlsCount }}
                                        </h2>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Urls
                                        </h6>
                                    </div>
                                    <div class="ml-auto mt-md-3 mt-lg-0">
                                        <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ml-2">
                <h2>Reports List</h2>
            </div>
            <div class="row">
                @foreach($client->reports as $r)
                @php
                if(!isset($r->coverage)){
                continue;
                }
                @endphp
                <div class="col-md-4 mb-3">
                    <div class="shadow-sm bg-white card-coverage text-center">
                        <div class="position-relative">
                            <div class="overlay d-flex">
                                <div class="d-flex m-auto">
                                    <a href="{{ route('report.show',$r->coverage->report_id) }}"
                                        class="btn btn-light px-3 py-2 rounded btn-sm ml-auto">View
                                    </a>
                                </div>
                            </div>
                            @if($r->coverage->cover)
                            <div class="cover"
                                style="background: url({{Storage::url($r->coverage->cover)}}) top/cover; height:226px ; width:100%">
                            </div>
                            @else
                            <div class="cover"
                                style="background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQQxxOHodeBBvPKkfZJX8z6E_3xZGtKx2eW9Qn1xgFmc5cQ6zzR&usqp=CAU) top/cover; height:226px ; width:100%">
                            </div>
                            @endif
                        </div>
                        <div class="rep_title bg-dark py-2 px-2">
                            <p class="mb-0 text-white title text-left">{{$r->coverage->title}}</p>
                            <p class="date text-white title text-left mb-0"><i class="fa fa-calendar mr-1"></i>
                                <?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($r->coverage->created_at))->diffForHumans() ?>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="{{asset('admins/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('admins/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('admins/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admins/dist/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('admins/dist/js/feather.min.js')}}"></script>
    <script src="{{asset('admins/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('admins/dist/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('admins/dist/js/custom.min.js')}}"></script>
    <script src="{{asset('admins/assets/extra-libs/c3/d3.min.js')}}"></script>
    <script src="{{asset('admins/assets/extra-libs/c3/c3.min.js')}}"></script>
    <script src="{{asset('admins/assets/libs/chartist/dist/chartist.min.js')}}"></script>
    <script src="{{asset('admins/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}">
    </script>
    <script src="{{asset('admins/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('admins/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('admins/dist/js/pages/dashboards/dashboard1.min.js')}}"></script>
    <script src="{{asset('admins/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admins/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
    <script>
        $('.hide').hide();
        $('.dataTables_paginate').remove();
    </script>
</body>

</html>