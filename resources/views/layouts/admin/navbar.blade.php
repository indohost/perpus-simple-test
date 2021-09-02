<li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('admin/') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<li class="nav-item {{ Request::is('admin/user') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('admin/user/') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>User</span></a>
</li>

<li class="nav-item {{ Request::is('admin/author') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('admin/author/') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Pengarang</span></a>
</li>

<li class="nav-item {{ Request::is('admin/writer') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('admin/writer/') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Penerbit</span></a>
</li>

<li class="nav-item {{ Request::is('admin/rack') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('admin/rack/') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Rak</span></a>
</li>

<li class="nav-item {{ Request::is('admin/book') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('admin/book/') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Buku</span></a>
</li>

<li class="nav-item {{ Request::is('admin/regBook') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('admin/regBook/') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Registrasi Buku</span></a>
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
