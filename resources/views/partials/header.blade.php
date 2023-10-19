<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="left: inherit; right: 0px;">
                <span class="dropdown-item dropdown-header"
                    style="font-weight: bold">{{ ucfirst(\Auth::user()->name) ?? '' }}</span>
                <div class="dropdown-divider"></div>
                <a href="{{ route('profile-update') }}" class="dropdown-item"
                    style="font-size: 14px; font-weight: 400;">
                    <i class="fas fa-user-circle mr-2"></i> Profile Setting
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('signout') }}" role="button" class="dropdown-item"
                    style="font-size: 14px; font-weight: 400;">
                    <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
                </a>
            </div>
        </li>
    </ul>
</nav>
