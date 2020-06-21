<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Krucuk</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Kc</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Content</li>
            <li class="{{Request::is('admin/category*')?'active':''}}"><a class="nav-link" href="{{url('admin/category/')}}"><i class="far fa-square"></i> <span>Kategori</span></a></li>
            <li class="{{Request::is('admin/user*')?'active':''}}"><a class="nav-link" href="{{url('admin/user/')}}"><i class="fas fa-users"></i> <span>User</span></a></li>
            <li class="{{Request::is('admin/admin*')?'active':''}}"><a class="nav-link" href="{{url('admin/admin/')}}"><i class="far fa-user"></i> <span>Admin</span></a></li>
            <li class="{{Request::is('admin/merchant*')?'active':''}}"><a class="nav-link" href="{{url('admin/merchant/')}}"><i class="fas fa-store"></i> <span>Merchant</span></a></li>
            <li class="{{Request::is('admin/banner*')?'active':''}}"><a class="nav-link" href="{{url('admin/banner/')}}"><i class="far fa-square"></i> <span>Banner</span></a></li>
            {{-- <li class="{{Request::is('admin/comment*')?'active':''}}"><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Komentar</span></a></li> --}}
        </ul>

        {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> --}}
    </aside>
</div>
