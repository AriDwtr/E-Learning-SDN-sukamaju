<?= $this->extend('admin/main_theme/theme_layout') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url() ?>/dashboard/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/dashboard/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<?= $this->endsection() ?>

<?= $this->section('content') ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Menu Siswa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= route_to('admindashboard') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Siswa</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Form Ganti Password Siswa</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= route_to('updatepasssiswa', $siswa['id_siswa']) ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="NewPassword">New Password</label>
                                <input type="password" name="password" class="form-control" id="NewPassword" placeholder="Masukan Password" required>
                            </div>
                            <div class="form-group">
                                <label for="RetypePassword">Re-type Password</label>
                                <input type="password" name="repassword" class="form-control" id="RetypePassword" placeholder="Tulis Ulang Password" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Perbarui Password Akun</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endsection() ?>

<?= $this->section('customjs') ?>
<script src="<?= base_url() ?>/dashboard/plugins/select2/js/select2.full.min.js"></script>
<script src="<?= base_url() ?>/dashboard/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<?= $this->endsection() ?>