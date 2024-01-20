<ul class="navbar-nav flex-fill w-100 mb-2">
    <li class="nav-item w-100">
        <a class="nav-link @if (Request::segment(1) == 'dashboard') active-label @endif"
           href="{{ route('dashboard') }}">
            <i class="bi bi-speedometer fe-16"></i>
            <span class="ml-3 item-text">Dashboard</span>
        </a>
    </li>
</ul>
