<ul class="navbar-nav flex-fill w-100">
    <li class="nav-item w-100">
        <a class="nav-link @if (Request::segment(1) == 'dashboard') active-label @endif"
           href="{{ route('dashboard') }}">
            <i class="bi bi-house"></i>
            <span class="ml-3 item-text">Dashboard</span>
        </a>
    </li>
    <li class="nav-item w-100">
        <a class="nav-link @if (Request::segment(1) == 'my-project') active-label @endif"
           href="#">
            <i class="bi bi-infinity"></i>
            <span class="ml-3 item-text">Project</span>
        </a>
    </li>
    <li class="nav-item w-100">
        <a class="nav-link @if (Request::segment(1) == 'activity') active-label @endif"
           href="#">
            <i class="bi bi-activity"></i>
            <span class="ml-3 item-text">Activity</span>
        </a>
    </li>
    <li class="nav-item w-100">
        <a class="nav-link @if (Request::segment(1) == 'resume') active-label @endif"
           href="#">
            <i class="bi bi-code"></i>
            <span class="ml-3 item-text">Resume</span>
        </a>
    </li>
    <li class="nav-item w-100">
        <a class="nav-link @if (Request::segment(1) == 'about-me') active-label @endif"
           href="#">
            <i class="bi bi-person-circle"></i>
            <span class="ml-3 item-text">About</span>
        </a>
    </li>
</ul>
