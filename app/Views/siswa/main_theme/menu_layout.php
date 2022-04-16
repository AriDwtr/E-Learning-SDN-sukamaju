<!-- Brand Logo -->
<a href="admin/dashboard" class="brand-link">
    <img src="<?= base_url() ?>/template/assets/img/favicon/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">E-Learning</span>
</a>

<!-- Sidebar -->
<?php foreach($listkelas as $listkelas) : ?>
<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="<?= base_url() ?>/foto/default.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block"><b><?= strtoupper($nama_siswa) ?></b></a>
            <a href="#" class="d-block"><?= strtoupper($listkelas->kelas) ?></a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="<?= route_to('siswadashboard')?>" class="nav-link <?= uri_string() == 'siswa/dashboard' ? 'active':'' ?>">
                    <i class="nav-icon fas fa-book-open"></i>
                    <p>
                        Pelajaran Hari ini
                    </p>
                </a>
            </li>
            <li class="nav-header">Daftar Pelajaran</li>
            <?php foreach($listmatpel as $listmatpel) : ?>
                <li class="nav-item">
                    <a href="<?= route_to('siswadashboard')?>" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            <?= strtoupper($listmatpel['pelajaran']) ?>
                        </p>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<?php endforeach ?>
<!-- /.sidebar -->