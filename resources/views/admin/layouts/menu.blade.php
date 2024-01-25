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
        <span style="color: #6c757d">Master Data</span>
    </p>
    <li class="nav-item dropdown">
        <a href="#master-data" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="bi bi-globe fe-16"></i>
            <span class="ml-3 item-text">Data Master</span><span class="sr-only">(current)</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100  @if (Request::segment(2) == 'master-data') show @endif"
            id="master-data">
            <li class="nav-item w-100">
                <a class="nav-link @if (Request::segment(3) == 'cities') active-label @endif"
                   href="{{route('master-data.cities.index')}}">
                    <span class="ml-3 item-text">Cities</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link @if (Request::segment(3) == 'provinces') active-label @endif"
                   href="{{route('master-data.provinces.index')}}">
                    <span class="ml-3 item-text">Provinces</span>
                </a>
            </li>
        </ul>
    </li>

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
                <span class="ml-3 item-text">Access Roles</span>
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
