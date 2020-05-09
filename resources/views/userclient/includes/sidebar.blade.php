<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
                        href="{{route('client.dash',request('client_id'))}}" aria-expanded="false"><i
                            data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li class="list-divider"></li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="book" class="feather-icon"></i>
                        <span class="hide-menu">Coverage Report</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{route('coverage_report.show',request('client_id'))}}" class="sidebar-link">
                                <span class="hide-menu"> List</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('coverage.new',request('client_id'))}}" class="sidebar-link">
                                <span class="hide-menu"> Add Report</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-small-cap mt-4"><span class="hide-menu">Settings</span></li>

                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" aria-expanded="false "
                        href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();"><i
                            data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Logout</span></a>
                </li>

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