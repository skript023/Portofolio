<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
    <li class="nav-item">
        <a href="/" class="{{ request()->is('/') ? 'nav-link active' : 'nav-link' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
            Dashboard
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/user" class="{{ request()->is('/user') ? 'nav-link active' : 'nav-link' }}">
            <i class="nav-icon fas fa-th"></i>
            <p>
            User
            <span class="right badge badge-danger">New</span>
            </p>
        </a>
    </li>
</ul>