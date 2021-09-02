<li class="nav-item {{ Request::is('user') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('user/') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<li class="nav-item {{ Request::is('user/book') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('user/book/') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Buku</span></a>
</li>

<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }}
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>
