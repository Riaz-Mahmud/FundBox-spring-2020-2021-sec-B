<!-- BEGIN: Header-->
<div class="header-navbar-shadow"></div>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon bx bx-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Email">
                                <i class="ficon bx bx-envelope"></i>
                            </a>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Chat">
                                <i class="ficon bx bx-chat"></i>
                            </a>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Todo">
                                <i class="ficon bx bx-check-circle"></i>
                            </a>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Calendar">
                                <i class="ficon bx bx-calendar-alt"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link nav-link-expand">
                            <i class="ficon bx bx-fullscreen nav-item-home-floating" data-toggle="tooltip" data-placement="top" title="Fullscreen"></i>
                        </a>
                    </li>
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name">GR_MANAGER_NAME</span>
                                <span class="user-status text-muted">GR_MANAGER_EMAIL</span>
                            </div>
                            <span>
                                <img class="round" src="{{ url('/images/avatar/avatar.png') }}" alt="avatar" height="40" width="40">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pb-0">
                            <a class="dropdown-item" href="#">
                                <i class="bx bx-user mr-50"></i> Edit Profile</a>
                            <a class="dropdown-item" href="#">
                                <i class="bx bx-envelope mr-50"></i> My Inbox</a>
                            <a class="dropdown-item" href="#">
                                <i class="bx bx-check-square mr-50"></i> Task</a>
                            <a class="dropdown-item" href="#">
                                <i class="bx bx-message mr-50"></i> Chats</a>
                            <div class="dropdown-divider mb-0"></div>
                            <a class="dropdown-item" href="#">
                                <i class="bx bx-power-off mr-50"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->

<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header mb-3">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="#">
                    <img src="{{ url('/images/logo/dummyLogo.png') }}" width="100%" height="70px"  />
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content" style="padding-bottom: 100px;">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
            
            <li class="nav-item">
                <a class="nav-hover" href="#">
                    <i class="bx bx-desktop mr-50"></i>
                    <span class="menu-title">Admin Dashboard</span>
                </a>
            </li>

            <li class=" navigation-header"><span>Admin</span></li>
            
            <li class="nav-item @if(url('/admin/createAdmin') == Request::url()) active @endif">
                <a class="nav-hover" href="{{ url('/admin/createAdmin') }}">
                    <i class="bx bxs-city mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Create Admin</span>
                </a>
            </li>

            <li class="nav-item @if(url('/admin/manageAdmin') == Request::url()) active @endif">
                <a class="nav-hover" href="/admin/manageAdmin">
                    <i class="bx bxs-city mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Manage Admin</span>
                </a>
            </li>
            
            <li class=" navigation-header"><span>Refund</span></li>
            <li class="nav-item">
                <a href="#">
                    <i class="bx bxs-bar-chart-alt-2 mr-50"></i>
                    <span class="menu-title" data-i18n="Category Manager">Manage Refund</span>
                </a>
            </li>

            <li class=" navigation-header"><span>Volunteer Event</span></li>
            <li class="nav-item ">
                <a class="nav-hover" href="#">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Create Volunteer Event</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-hover" href="#">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Manage Volunteer Event</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-hover" href="#">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Volunteer List</span>
                </a>
            </li>
        

            <li class=" navigation-header"><span>Account</span></li>
            <li class="nav-item ">
                <a class="nav-hover" href="#">
                    <i class="bx bx-planet mr-50"></i>
                    <span class="menu-title" data-i18n="City Manager">Manage Account</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->