<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link" style="text-align: center">
        {{-- <img src="{{asset('assets/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"> --}}
        <span class="brand-text font-weight-bold">CYBER<span style="color:orange;">NETWORKS</span></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if (\Auth::user()->hasRole('admin'))
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                            class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p> Dashboard </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item {{ request()->is('customer*') ? 'active menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('customer*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p> Customers <i class="fas fa-caret-right right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('customer-manage-index') }}"
                                class="nav-link {{ request()->is('customer*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-dot-circle sub-menu-margin-left"></i>
                                <p class="sub-menu-font">Manage Customer</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ request()->is('settings*') ? 'active menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Settings
                            <i class="fas fa-caret-right right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('profile-update') }}"
                                class="nav-link {{ request()->is('settings/profile*') ? 'active' : '' }}">
                                <i class="nav-icon far fa-dot-circle sub-menu-margin-left"></i>
                                <p class="sub-menu-font">Profile Update</p>
                            </a>
                        </li>
                        @if (\Auth::user()->hasRole('admin'))
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}"
                                    class="nav-link {{ request()->is('settings/users*') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-dot-circle sub-menu-margin-left"></i>
                                    <p class="sub-menu-font">Manage User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}"
                                    class="nav-link {{ request()->is('settings/roles*') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-dot-circle sub-menu-margin-left"></i>
                                    <p class="sub-menu-font">Roles</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('enum-index') }}"
                                    class="nav-link {{ request()->is('settings/enum*') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-dot-circle sub-menu-margin-left"></i>
                                    <p class="sub-menu-font">General Settings</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('login-image') }}"
                                    class="nav-link {{ request()->is('settings/login-image*') ? 'active' : '' }}">
                                    <i class="nav-icon far fa-dot-circle sub-menu-margin-left"></i>
                                    <p class="sub-menu-font">Login Image</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
