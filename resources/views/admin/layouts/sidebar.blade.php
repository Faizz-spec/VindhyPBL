<aside>
    <div class="sidebar-wrapper">
        <div class="brand">
            <div class="logo">
                <img src="{{ asset('assets/images/brand/logo') }}/vhindy.png" alt="logo">
            </div>
            <div class="brand-name">
                <h1>Vhindy</h1>
                <span>Service monitor app</span>
            </div>
        </div>
        <nav>
            <ul class="navbar">
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard.index') }}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                <li class="{{ Request::routeIs('project.*') ? 'active' : '' }}"><a href="{{ route('project.index') }}"><i class="fa fa-tasks" aria-hidden="true"></i><span>Project</span></a></li>
                <li class="{{ Request::routeIs('sparepart.*') ? 'active' : '' }}"><a href="{{ route('sparepart.index') }}"><i class="fa fa-cogs" aria-hidden="true"></i><span>Sparepart</span></a></li>
                <li class="{{ Request::routeIs('category.*') ? 'active' : '' }}"><a href="{{ route('category.index') }}"><i class="fa fa-tags" aria-hidden="true"></i><span>Kategori</span></a></li>
                @can('isSuper')
                    <li class="{{ Request::routeIs('users.*') ? 'active' : '' }}"><a href="{{ route('users.index') }}"><i class="fa fa-users" aria-hidden="true"></i><span>Users</span></a></li>
                @endcan
                <li class="{{ Request::routeIs('profile.*') ? 'active' : '' }}"><a href="{{ route('profile.edit') }}"><i class="fa fa-user-circle-o" aria-hidden="true"></i><span>Profile</span></a></li>
                <li class="{{ Request::routeIs('pendapatan') ? 'active' : '' }}"><a href="{{ route('pendapatan') }}"><i class="fa fa-money" aria-hidden="true"></i><span>Pendapatan</span></a></li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <span>Log out</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>