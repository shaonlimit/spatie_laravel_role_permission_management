<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="index.html">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="{{ route("user.index") }}">
                <i class="bi bi-menu-button-wide"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route("user.index") }}">
                        <i class="bi bi-circle"></i><span>User List</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="{{ route("role.index") }}">
                <i class="bi bi-menu-button-wide"></i><span>Roles</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav1">
                <li>
                    <a href="{{ route("role.index") }}">
                        <i class="bi bi-circle"></i><span>Role List</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="{{ route("permission.index") }}">
                <i class="bi bi-menu-button-wide"></i><span>Permission</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav2">
                <li>
                    <a href="{{ route("permission.index") }}">
                        <i class="bi bi-circle"></i><span>Permission List</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

</aside>
