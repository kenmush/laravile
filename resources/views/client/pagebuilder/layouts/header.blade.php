<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md shadow p-1 px-2">
        <div class="navbar-header" data-logobg="skin6">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand p-2">
                <!-- Logo icon -->
                <a href="{{route('admin.dashboard')}}">
                    <b class="logo-icon">
                        <!-- Dark Logo icon -->
                        {{-- <img src="{{asset('admins/assets/images/logo-icon.png')}}" alt="homepage"
                        class="dark-logo')}}" /> --}}
                        <!-- Light Logo icon -->
                        {{-- <img src="{{asset('admins/assets/images/logo-icon.png')}}" alt="homepage"
                        class="light-logo')}}" /> --}}
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                        <!-- dark Logo text -->
                        <img src="{{asset('admins/assets/images/logo-text.png')}}" alt="homepage"
                            class="dark-logo" width="100"/>
                        <!-- Light Logo text -->
                        {{-- <img src="{{asset('admins/assets/images/logo-light-text.png')}}" class="light-logo"
                        alt="homepage')}}" /> --}}
                    </span>
                </a>

            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" style="visibility:hidden"
                href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse border-left pr-4 collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left mx-auto ml-3 pl-1">
                <li class="nav-item dropdown ">
                    <div class="icon icon-save d-flex flex-wrap">
                        <i data-feather="save" class="mx-auto"></i>
                        <div class="w-100 m-auto text-center">save</div>
                    </div>

                </li>
                <!-- Notification -->
                {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                                id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span><i data-feather="bell" class="svg-icon"></i></span>
                                <span class="badge badge-primary notify-no rounded-circle">5</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="message-center notifications position-relative">
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <div class="btn btn-danger rounded-circle btn-circle"><i
                                                        data-feather="airplay" class="text-white"></i></div>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Luanch Admins</h6>
                                                    <span class="font-12 text-nowrap d-block text-muted">Just see
                                                        the my new
                                                        admin!</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                                            <strong>Check all notifications</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                <!-- End Notification -->
                <!-- ============================================================== -->
                <!-- create new -->
                <!-- ============================================================== -->

            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">



                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex" href="javascript:void(0)" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">

                        @if(isset(Auth::user()->profile_picture))
                        <div style="background:url({{Storage::url(Auth::user()->profile_picture)}})no-repeat center/cover; width:44px;height:44px"
                            alt="user" class="rounded-circle p-2 m-auto">
                        </div>
                        @else
                        <div style="background:url(https://1.bp.blogspot.com/--ucL-rXn-Ec/VLwta4arOvI/AAAAAAAABHU/LzjxpJ_cA-g/s1600/wallpaper-for-facebook-profile-photo-738967.jpg)no-repeat center/cover; width:44px;height:44px"
                            alt="user" class="rounded-circle p-2 m-auto">
                        </div>
                        @endif

                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item" href="{{route('profile.index')}}"><i data-feather="user"
                                class="svg-icon mr-2 ml-1"></i>
                            My Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"><i data-feather="power"
                                class="svg-icon mr-2 ml-1"></i>
                            Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li> --}}
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
