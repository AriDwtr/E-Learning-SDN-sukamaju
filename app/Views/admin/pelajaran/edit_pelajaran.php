<?= $this->extend('admin/main_theme/theme_layout') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url() ?>/dashboard/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/dashboard/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<?= $this->endsection() ?>

<?= $this->section('content') ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Menu Pelajaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= route_to('admindashboard') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">pelajaran</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Form Tambah Pelajaran</h3>
        </div>
        <form class="form-horizontal" method="POST" action="<?= route_to('updatepelajaran',  $pelajaran['id_pelajaran']) ?>" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputKelas1" class="col-sm-2 col-form-label">Nama Pelajaran</label>
                    <div class="col-sm-10">
                        <input type="text" name="pelajaran" class="form-control" value="<?= $pelajaran['pelajaran'] ?>" id="inputKelas1" placeholder="IPA, IPS, AGAMA" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputKelas1" class="col-sm-2 col-form-label">Pilih Kelas</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" name="kelas" style="width: 100%;">
                            <?php foreach ($kelas as $kelas) : ?>
                                <option value="<?= $kelas['id_kelas'] ?>" <?= $kelas['id_kelas'] == $pelajaran['id_kelas'] ? 'selected': '' ?>><?= strtoupper($kelas['kelas']) ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputKelas1" class="col-sm-2 col-form-label">Pilih Guru Pengajar</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" name="staff" style="width: 100%;">
                            <?php foreach ($staff as $staff) : ?>
                                <option value="<?= $staff['id_staff'] ?>" <?= $staff['id_staff'] == $pelajaran['id_staff'] ? 'selected': '' ?>><?= strtoupper($staff['nama_pegawai'].'-'.$staff['nip']) ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-info"><b>+ Simpan Pembaharuan Data</b></button>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </form>
    </div>
</section>
<?= $this->endsection() ?>

<?= $this->section('customjs') ?>
<script src="<?= base_url() ?>/dashboard/plugins/select2/js/select2.full.min.js"></script>
<script src="<?= base_url() ?>/dashboard/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="<?= base_url() ?>/dashboard/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/dashboard/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>/dashboard/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/dashboard/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/dashboard/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/dashboard/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<?= $this->endsection() ?>