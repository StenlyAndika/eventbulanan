<header id="header" class="fixed-top d-flex align-items-center menu-bar">
    <div class="container d-flex justify-content-between">
        <div class="toggle">
            <i class="bi bi-list"></i>
        </div>
        <nav id="navbar" class="navbar">
            <ul>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}" target="_blank">Preview Website</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Selamat datang kembali, {{ auth()->user()->nama }}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.user.show', auth()->user()->id) }}">Profil</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>

<div class="nav-bar">
    <ul class="nav">
        <li class="list {{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <span class="icon"><i class="bi bi-house"></i></span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/event*') ? 'active' : '' }}">
            <a href="{{ route('admin.event.index') }}">
                <span class="icon"><i class="bi bi-calendar"></i></span>
                <span class="title">Event Bulanan</span>
            </a>
        </li>
        <li class="list {{ Request::is('admin/user*') ? 'active' : '' }}">
            <a href="{{ route('admin.user.index') }}">
                <span class="icon"><i class="bi bi-person-circle"></i></span>
                <span class="title">Data User</span>
            </a>
        </li>
    </ul>
</div>

