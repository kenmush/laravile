 <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{route('admin.dashboard')}}"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Manage and View</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                            aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span
                                class="hide-menu">Users </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{route('admin.users.index')}}" class="sidebar-link"><span
                                            class="hide-menu"> List
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{route('admin.users.create')}}" class="sidebar-link"><span
                                            class="hide-menu"> Add User
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                            aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                class="hide-menu">Plans </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{route('admin.plans.index')}}" class="sidebar-link"><span
                                            class="hide-menu"> List
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{route('admin.plans.create')}}" class="sidebar-link"><span
                                            class="hide-menu"> Add Plan
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                            aria-expanded="false"><i data-feather="credit-card" class="feather-icon"></i><span
                                class="hide-menu">Payments </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{route('admin.payment.index')}}" class="sidebar-link"><span
                                            class="hide-menu"> List
                                        </span></a>
                                </li>
                        </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                            aria-expanded="false"><i data-feather="list" class="feather-icon"></i><span
                                class="hide-menu">Report </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{route('admin.report.index')}}" class="sidebar-link"><span
                                            class="hide-menu"> User
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                            aria-expanded="false"><i data-feather="zap" class="feather-icon"></i><span
                                class="hide-menu">Affiliate </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{route('admin.affiliate.index')}}" class="sidebar-link"><span
                                            class="hide-menu"> Affiliates
                                        </span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-small-cap mt-4"><span class="hide-menu">Settings</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                            aria-expanded="false"><i data-feather="settings" class="feather-icon"></i><span
                                class="hide-menu">Settings </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="{{route('admin.setting-payment.index')}}" class="sidebar-link"><span
                                            class="hide-menu"> General Setting
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{route('admin.setting-payment.index')}}" class="sidebar-link"><span
                                            class="hide-menu"> Payment
                                        </span></a>
                                </li>

                                <li class="sidebar-item"><a href="{{route('admin.setting-mail.index')}}" class="sidebar-link"><span
                                            class="hide-menu"> Mail
                                        </span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link"
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
