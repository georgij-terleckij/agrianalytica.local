<!-- User Info in Header -->
<nav class="navbar navbar-expand navbar-light bg-white">
    <ul class="navbar-nav ml-auto">
        <!-- Language Switcher (если нужен) -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="langDropdown" role="button" data-toggle="dropdown">
                <i class="fas fa-globe"></i>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">🇺🇸 English</a>
                <a class="dropdown-item" href="#">🇷🇺 Русский</a>
            </div>
        </li>

        <!-- User Profile -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                <img src="{{ auth()->user()->avatar ?? asset('images/default-avatar.png') }}" class="rounded-circle" width="30" height="30">
                <span class="ml-2">{{ auth()->user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Профиль</a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Выйти</button>
                </form>
            </div>
        </li>
    </ul>
</nav>
