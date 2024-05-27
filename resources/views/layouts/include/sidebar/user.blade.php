<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/user/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.mytransaction.*') ? '' : 'collapsed'}}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="ri-money-dollar-box-line"></i><span>Transaction</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content {{ request()->routeIs('user.mytransaction.index') ? 'show' : ''}}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('user.mytransaction.index')}}" class="{{ request()->routeIs('user.mytransaction.show') ? 'active' : ''}}">
                        <i class="bi bi-circle"></i><span>My Transaction</span>
                    </a>
                </li>
            </ul>
        </li>

                <!-- End Blank Page Nav -->

            </ul>

</aside>