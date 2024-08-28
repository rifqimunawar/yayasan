<ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
        <a href="{{ route('dashboard.index') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
    </li>

    <li class="menu-header">Starter</li>
    @if (Auth::user()->role_id != 2)
        <li class="dropdown {{ Request::is('roles*') || Request::is('user*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                <span>User Management</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('user.index') }}">User</a></li>
                <li><a class="nav-link" href="{{ route('roles.index') }}">Role User</a></li>
            </ul>
        </li>

        <li
            class="dropdown {{ Request::is('tagihan*') || Request::is('tahun_masuk*') || Request::is('category*') || Request::is('siswa*') ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                <span>Master Data</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('tahun_masuk.index') }}">Tahun Masuk</a></li>
                <li><a class="nav-link" href="{{ route('tagihan.index') }}">List Tagihan</a></li>
                <li><a class="nav-link" href="{{ route('siswa.index') }}">Data Siswa</a></li>
                <li><a class="nav-link" href="{{ route('category.index') }}">Kategori</a></li>
            </ul>
        </li>
    @endif

    <li class="dropdown {{ Request::is('pembayaran*') ? 'active' : '' }}">
        <a href="{{ route('pembayaran.index') }}">
            <i class="fas fa-columns"></i>
            <span>Pembayaran</span>
        </a>
    </li>
    <li class="dropdown {{ Request::is('history*') ? 'active' : '' }}">
        <a href="{{ route('history.index') }}">
            <i class="fas fa-columns"></i>
            <span>Journal</span>
        </a>
    </li>

    <li class="menu-header">End</li>
    <li class="dropdown p-3 mb-5 ">
        <a href="{{ route('logout') }}" class="shadow-sm">
            <i class="fas fa-sign-out-alt text-danger shadow-sm "></i>
            <span class="text-danger">Logout</span>
        </a>
    </li>
</ul>
