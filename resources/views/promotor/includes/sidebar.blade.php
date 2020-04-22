 <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link" href="{{route('promotor.dashboard')}}"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Manage and View</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="{{route('promotor.affiliate.index')}}"
                            aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                                class="hide-menu">Product</span></a></li>


                        <li class="sidebar-item"> <a class="sidebar-link " href="{{route('promotor.affiliate.sales')}}"
                            aria-expanded="false"><i data-feather="trending-up" class="feather-icon"></i><span
                                class="hide-menu">Sales</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link " href="{{route('promotor.affiliate.payout')}}"
                            aria-expanded="false"><i data-feather="dollar-sign" class="feather-icon"></i><span
                                class="hide-menu">Payout</span></a></li>
                        <li class="list-divider"></li>

                        <li class="sidebar-item"> <a class="sidebar-link "
                                aria-expanded="false " href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"><i data-feather="log-out" class="feather-icon"></i><span
                                    class="hide-menu">Logout</span></a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
