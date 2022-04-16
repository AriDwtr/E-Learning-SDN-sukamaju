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
        <form class="form-horizontal" method="POST" action="<?= route_to('storepelajaran') ?>" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputKelas1" class="col-sm-2 col-form-label">Nama Pelajaran</label>
                    <div class="col-sm-10">
                        <input type="text" name="pelajaran" class="form-control" id="inputKelas1" placeholder="IPA, IPS, AGAMA" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputKelas1" class="col-sm-2 col-form-label">Pilih Kelas</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" name="kelas" style="width: 100%;">
                            <?php foreach ($kelas as $kelas) : ?>
                                <option value="<?= $kelas['id_kelas'] ?>"><?= strtoupper($kelas['kelas']) ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputKelas1" class="col-sm-2 col-form-label">Pilih Guru Pengajar</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" name="staff" style="width: 100%;">
                            <?php foreach ($staff as $staff) : ?>
                                <?php if($staff['tipe']=="guru") {?>
                                    <option value="<?= $staff['id_staff'] ?>"><?= strtoupper($staff['nama_pegawai'].'-'.$staff['nip']) ?></option>
                                <?php } ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-info"><b>+ Tambah Mata Pelajaran</b></button>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </form>
    </div>
</section>
<div class="col-md-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Data Pelajaran</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Mata Pelajaran</th>
                        <th>Nama Guru Pengajar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 1;
                    foreach ($pelajaran as $pelajaran) : ?>
                        <tr>
                            <td><?= $nomor ++ ?></td>
                            <td><?= strtoupper($pelajaran->kelas) ?></td>
                            <td><b><?= strtoupper($pelajaran->pelajaran) ?></b></td>
                            <td><i><?= ucwords($pelajaran->nama_pegawai.' - '.$pelajaran->nip) ?></i></td>
                            <td>
                            <a href="<?= route_to('editpelajaran', $pelajaran->id_pelajaran) ?>" style="color:orange"><i class="fas fa-edit"></i> Edit</a>
                                &nbsp;&nbsp;
                            <a href="<?= route_to('deletepelajaran', $pelajaran->id_pelajaran) ?>" style="color:red" onclick='return window.confirm("Are you sure you want to delete this?");'><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
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