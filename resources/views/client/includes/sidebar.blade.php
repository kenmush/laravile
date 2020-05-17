<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{route('user.dashboard')}}" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Dashboard</span></a>
                </li>
                <li class="list-divider"></li>

                <li class="nav-small-cap">
                    <span class="hide-menu">Manage and View</span>
                </li>
                @if (!auth()->user()->parent)


                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="users" class="feather-icon"></i>
                        <span class="hide-menu">Team Members</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{ route('team-members.index') }}" class="sidebar-link">
                                <span class="hide-menu"> List</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('team-members.create') }}" class="sidebar-link">
                                <span class="hide-menu"> Add Member</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu">Clients Manager</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{route('clients.index')}}" class="sidebar-link">
                                <span class="hide-menu"> List</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('clients.create')}}" class="sidebar-link">
                                <span class="hide-menu"> Add Client</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('client.customize.dashboard') }}" class="sidebar-link">
                                <span class="hide-menu">Customize Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    {{-- <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="list" class="feather-icon"></i>
                        <span class="hide-menu">Reports</span>
                    </a> --}}
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        {{-- <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <span class="hide-menu"> List</span>
                            </a>
                        </li> --}}
                        <li class="sidebar-item">
                            <a href="{{ route('video.report.index') }}" class="sidebar-link">
                                <span class="hide-menu">Add Mentions</span>
                            </a>
                        </li>
                        {{-- <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <span class="hide-menu">Generate</span>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="settings" class="feather-icon"></i>
                        <span class="hide-menu">Manage</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="{{ route('profile.index') }}" class="sidebar-link">
                                <span class="hide-menu">Edit Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('manage.subscription') }}" class="sidebar-link">
                                <span class="hide-menu">Manage Subscription</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('orders.index') }}" class="sidebar-link">
                                <span class="hide-menu">Orders</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->