<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">CRM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i> <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-item {{ (request()->is('customer*') ? 'active menu-open' : '') }}">
                    <a href="#" class="nav-link {{ (request()->is('customer*') ? 'active' : '') }}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p> Customer <i class="fas fa-caret-right right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('customer-manage-index')}}" class="nav-link {{ request()->is('customer*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-tie sub-menu-margin-left"></i>
                                <p class="sub-menu-font">Manage Customers</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ (request()->is('settings*') ? 'active menu-open' : '') }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Settings
                            <i class="fas fa-caret-right right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link {{ request()->is('settings/users*') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-user sub-menu-margin-left"></i>
                                <p class="sub-menu-font">Manage User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('roles.index')}}" class="nav-link {{ request()->is('settings/roles*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-wrench sub-menu-margin-left"></i>
                                <p class="sub-menu-font">Roles</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
