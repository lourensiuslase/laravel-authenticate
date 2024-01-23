<ul class="navbar-nav flex-fill w-100">
    @if (in_array('1', $arr_menu))
        <li class="nav-item w-100">
            <a class="nav-link @if (Request::segment(1) == 'dashboard') active-label @endif"
               href="{{ route('dashboard') }}">
                <i class="bi bi-house"></i>
                <span class="ml-3 item-text">Dashboard</span>
            </a>
        </li>
    @endif

    <p class="text-muted nav-heading mt-1 mb-1">
        <span style="color: #6c757d">General Setting</span>
    </p>
    @if (in_array('2', $arr_menu))
        <li class="nav-item w-100">
            <a class="nav-link @if (Request::segment(3) == 'user-management') active-label @endif"
               href="{{ route('user-management.index') }}">
                <i class="bi bi-person-circle"></i>
                <span class="ml-3 item-text">User Management</span>
            </a>
        </li>
    @endif
    @if (in_array('3', $arr_menu))
        <li class="nav-item w-100">
            <a class="nav-link @if (Request::segment(3) == 'role-access') active-label @endif"
               href="{{ route('role-access.index') }}">
                <i class="bi bi-toggle-on"></i>
                <span class="ml-3 item-text">Role Access</span>
            </a>
        </li>
    @endif

    <p class="text-muted nav-heading mt-1 mb-1">
        <span style="color: #6c757d">Management Role</span>
    </p>
    @if (in_array('4', $arr_menu))
        <li class="nav-item w-100">
            <a class="nav-link @if (Request::segment(3) == 'role') active-label @endif"
               href="{{ route('role.index') }}">
                <i class="bi bi-universal-access-circle"></i>
                <span class="ml-3 item-text">Role</span>
            </a>
        </li>
    @endif
</ul>
