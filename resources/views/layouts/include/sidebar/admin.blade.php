<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('admin.dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.category.*','admin.product.gallery.index','admin.product.index') ? '' : 'collapsed'}}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content {{ request()->routeIs('admin.category.*') ? 'show' : ''}}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.category.index') }}" class="{{ request()->routeIs('admin.category.index') ? 'active' : ''}}">
                        <i class="bi bi-circle"></i><span>Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.product.index')}}" class="{{ request()->routeIs('admin.product.index', 'admin.product.gallery.index') ? 'active' : ''}}">
                        <i class="bi bi-circle"></i><span>Data Product</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.transaction.*','admin.mytransaction.index') ? '' : 'collapsed'}}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="ri-money-dollar-box-line"></i><span>Transaction</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content {{ request()->routeIs('admin.transaction.*') ? 'show' : ''}}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.transaction.index') }}" class="{{ request()->routeIs('admin.transaction.index') ? 'active' : ''}}">
                        <i class="bi bi-circle"></i><span>Transaction</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.mytransaction.index')}}" class="{{ request()->routeIs('admin.mytransaction.index') ? 'active' : ''}}">
                        <i class="bi bi-circle"></i><span>My Transaction</span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>

</aside>