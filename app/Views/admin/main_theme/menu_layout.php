<!-- Brand Logo -->
<a href="admin/dashboard" class="brand-link">
    <img src="<?= base_url() ?>/template/assets/img/favicon/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">E-Learning</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="<?= base_url() ?>/dashboard/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block"><?= strtoupper($nama_pegawai) ?></a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="<?= route_to('dashboard')?>" class="nav-link <?= uri_string() == 'admin/dashboard' ? 'active':'' ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-header">General Setting</li>
            <li class="nav-item">
                <a href="<?= route_to('menu_kelas')?> " class="nav-link <?= uri_string() == 'admin/kelas' ? 'active':'' ?>">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Kelas
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= route_to('menu_guru') ?>" class="nav-link <?= uri_string() == 'admin/guru' ? 'active':'' ?> <?= uri_string() == 'admin/guru_add' ? 'active':'' ?> <?= uri_string() == 'admin/guru_add/post' ? 'active':'' ?>">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Guru
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= route_to('menu_siswa') ?>" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                       Siswa
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->