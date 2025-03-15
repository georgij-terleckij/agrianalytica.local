<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Главная</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.roles.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Роли</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.land-managers.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Клиенты</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.employees.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Сотрудники</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
