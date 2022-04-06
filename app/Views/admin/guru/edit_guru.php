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
                <h1>Menu Guru</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= route_to('admindashboard') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Guru</li>
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
                        <h3 class="card-title">Form Guru</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= route_to('updateguru', $staff['id_staff']) ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="number" name="nip" class="form-control" value="<?= $staff['nip'] ?>" id="nip" placeholder="Masukan NIP">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Pegawai</label>
                                <input type="text" name="nama" class="form-control" value="<?= $staff['nama_pegawai'] ?>" id="nama" placeholder="Nama Pegawai" required>
                            </div>
                            <div class="form-group">
                                <label for="jeniskelamin">Jenis Kelamin</label>
                                <select class="custom-select" id="jeniskelamin" name="jk">
                                    <option value="laki-laki" <?= $staff['jenis_kelamin'] == 'laki-laki' ? 'selected': '' ?> >Laki Laki</option>
                                    <option value="perempuan" <?= $staff['jenis_kelamin'] == 'perempuan' ? 'selected': '' ?>>Perempuan</option>
                                </select>
                            </div>
                            <hr>
                            <label>Login Account</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="username">Username</label>
                                        <input type="text" value="<?= $staff['username'] ?>" name="username" class="form-control" id="username" placeholder="username" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tipe">Tipe</label>
                                <select class="custom-select" id="tipe" name="tipe">
                                    <option value="admin" <?= $staff['tipe'] == 'admin' ? 'selected': '' ?>>Admin</option>
                                    <option value="guru" <?= $staff['tipe'] == 'guru' ? 'selected': '' ?>>Guru</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Perbarui Akun</button>
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