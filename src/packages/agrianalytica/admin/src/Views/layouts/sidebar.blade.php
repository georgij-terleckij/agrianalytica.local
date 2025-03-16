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
                    <a href="{{ route('admin.land-managers.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Клиенты</p>
                    </a>
                </li>

                @if(auth()->user() && auth()->user()->role->name == 'admin')
                    <li class="nav-item has-treeview {{ request()->is('admin/employees*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/employees*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Сотрудники
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.employees.index') }}"
                                   class="nav-link {{ request()->is('admin/employees') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Список сотрудников</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.employees.create') }}"
                                   class="nav-link {{ request()->is('admin/employees/create') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Создать сотрудника</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.employees.archive') }}"
                                   class="nav-link {{ request()->is('admin/employees/archive') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Архив сотрудников</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.roles.index') }}"
                                   class="nav-link {{ request()->is('admin/employees/roles') ? 'active' : '' }}">
                                    <i class="fas fa-user-shield"></i>
                                    <p>Роли и права</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
