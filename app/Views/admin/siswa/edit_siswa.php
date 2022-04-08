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
                        <h3 class="card-title">Form Siswa</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= route_to('updatesiswa', $siswa['id_siswa']) ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="number" name="nisn" class="form-control" value="<?= $siswa['nisn'] ?>" id="nisn" placeholder="Masukan NISN">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Siswa</label>
                                <input type="text" name="nama" class="form-control" value="<?= $siswa['nama_siswa'] ?>" id="nama" placeholder="Nama Siswa" required>
                            </div>
                            <div class="form-group">
                                <label for="jeniskelamin">Jenis Kelamin</label>
                                <select class="custom-select" id="jeniskelamin" name="jk">
                                    <option value="laki-laki" <?= $siswa['jenis_kelamin'] == 'laki-laki' ? 'selected': '' ?> >Laki Laki</option>
                                    <option value="perempuan" <?= $siswa['jenis_kelamin'] == 'perempuan' ? 'selected': '' ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <select class="form-control select2" name="kelas" style="width: 100%;">
                                    <?php foreach($kelas as $kelas) : ?>
                                        <option value="<?= $kelas['id_kelas'] ?>" <?= $kelas['id_kelas'] == $siswa['id_kelas'] ? 'selected': '' ?> ><?= strtoupper($kelas['kelas']) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <hr>
                            <label>Login Account</label>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="username">Username</label>
                                        <input type="text" value="<?= $siswa['username'] ?>" name="username" class="form-control" id="username" placeholder="username" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Perbarui Akun Siswa</button>
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