<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<div class="sidebar">
      <!-- Sidebar user (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Menu Home -->
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Home
                    <span class="right badge badge-danger">New</span>
                </p>
            </a>
        </li>

        <!-- Menu Content -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Content
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/from_input" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>From Input</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/datatable" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Table</p>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Menu CRUD -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    CRUD
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="../cast" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Cast</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('film.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Film</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('genre.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Genre</p>
                    </a>
                </li>
                <li class="nav-item">
                <a href="{{ route('kritik.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kritik</p>
                </a>
            </li>
            </li>
                <li class="nav-item">
                <a href="{{ route('profile.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Profile</p>
                </a>
            </li>
            </li>
                <li class="nav-item">
                <a href="{{ route('peran.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Peran</p>
                </a>
            </li>
            </ul>
        </li>

        <!-- Menu Akun -->
        <li class="nav-item">
    <a href="#" class="nav-link">
        <i class="bi bi-person-fill"></i>
        <p>
            Akun
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
    <li class="nav-item">
        <a href="{{ route('akun.history_cast.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Riwayat</p>
        </a>
    </li>
    <!-- Tambahkan tautan untuk reset password di bawah ini -->
    <li class="nav-item">
            <a href="{{ route('reset.password.form.show', ['username']) }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Reset Password</p>
            </a>
        </li>
    </ul>
    </li>

        <!-- Menu Logout -->
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
                <i class="bi bi-box-arrow-right"></i>
                <p>Logout</p>
            </a>
        </li>
    </ul>
</nav>

      <!-- /.sidebar-menu -->
    </div>