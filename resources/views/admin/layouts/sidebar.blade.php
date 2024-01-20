<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-3 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./">
                <img class="navbar-brand-img brand-md" src="{{ asset('admin/assets/images/laravel.png') }}"
                     alt="">
            </a>
        </div>
        @include('admin.layouts.menu')
    </nav>
</aside>
