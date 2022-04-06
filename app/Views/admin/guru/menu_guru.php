<?= $this->extend('admin/main_theme/theme_layout') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url() ?>/dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
    <?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif; ?>
</section>
<div class="col-md-12">
    <a href="<?= route_to('formguru')?>" class="btn btn-success mb-2"><i class="fas fa-user"></i> Tambah Guru Baru</a>
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Data Guru</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>NIP</th>
                        <th>Nama Staff</th>
                        <th>Tipe</th>
                        <th>Jenis Kelamin</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1;
                    foreach ($staff as $staff) : ?>
                    <tr>
                        <td><?= $nomor ++ ?></td>
                        <td><b><?= $staff['nip'] ?><b></td>
                        <td><?= ucwords($staff['nama_pegawai']) ?></td>
                        <td><?= strtoupper($staff['tipe']) ?></td>
                        <td><?= ucwords($staff['jenis_kelamin']) ?></td>
                        <td><center><?= $staff['foto']== NULL ? '<img src="'.base_url().'/foto/default.png" alt="User Image" width="20" height="20">' : '' ?></center></td>
                        <td>
                            <a href="<?= route_to('passguru', $staff['id_staff']) ?>" style="color:gray"><i class="fas fa-key"></i> Ganti Password</a>
                                &nbsp;&nbsp;
                            <a href="<?= route_to('editguru', $staff['id_staff']) ?>" style="color:orange"><i class="fas fa-edit"></i> Edit</a>
                                &nbsp;&nbsp;
                            <a href="<?= route_to('deleteguru', $staff['id_staff']) ?>" style="color:red" onclick='return window.confirm("Are you sure you want to delete this?");'><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<?= $this->endsection() ?>

<?= $this->section('customjs') ?>
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