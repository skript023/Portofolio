<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
    <li class="nav-item">
        <a href="/dashboard" class="{{ request()->is('/dashboard') ? 'nav-link active' : 'nav-link' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
            Dashboard
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/dashboard/profile" class="{{ request()->is('/dashboard/profile') ? 'nav-link active' : 'nav-link' }}">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg>
            <p>Profile<span class="right badge badge-danger">New</span></p>
        </a>
    </li>
    <li class="nav-item menu-open">
        <a href="#" class="{{ request()->is('/dashboard/article') ? 'nav-link active' : 'nav-link' }}">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
            </svg>
            <p>
            Article
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/dashboard/article" class="{{ request()->is('/dashboard/user') ? 'nav-link active' : 'nav-link'}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Article</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/dashboard/article/add" class="{{ request()->is('/dashboard/user?page=add') ? 'nav-link active' : 'nav-link' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Article</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="/dashboard/category" class="{{ request()->is('/dashboard/category') ? 'nav-link active' : 'nav-link' }}">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
            <p>
            Category
            <span class="right badge badge-danger">New</span>
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/dashboard/comments" class="{{ request()->is('/dashboard/comments') ? 'nav-link active' : 'nav-link' }}">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z"/>
            </svg>
            <p>Comments<span class="right badge badge-danger">New</span></p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/dashboard/profile" class="{{ request()->is('/dashboard/profile') ? 'nav-link active' : 'nav-link' }}">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg>
            <p>Profile<span class="right badge badge-danger">New</span></p>
        </a>
    </li>
    @if (auth()->user()->user_position === 'administrator')
        <li class="nav-item">
            <a href="/dashboard/contact" class="{{ request()->is('/dashboard/contact') ? 'nav-link active' : 'nav-link' }}">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-lines-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                </svg>
                <p>Contact<span class="right badge badge-danger">New</span></p>
            </a>
        </li>
        <li class="nav-item menu-open">
            <a href="#" class="{{ request()->is('/dashboard/user') ? 'nav-link active' : 'nav-link' }}">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                </svg>
                <p>
                Users
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/dashboard/user" class="{{ request()->is('/dashboard/user') ? 'nav-link active' : 'nav-link'}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/user?page=add" class="{{ request()->is('/dashboard/user?page=add') ? 'nav-link active' : 'nav-link' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Users</p>
                    </a>
                </li>
            </ul>
        </li>
    @endif
</ul>