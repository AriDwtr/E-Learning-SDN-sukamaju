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
                <h1>Menu Kelas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= route_to('admindashboard') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">kelas</li>
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
    <?php

    use CodeIgniter\Router\Router;

    if (isset($validation)) : ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Form Edit Kelas</h3>
        </div>
        <form class="form-horizontal" method="POST" action="<?= route_to('updatekelas', $kelas['id_kelas']) ?>" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputKelas1" class="col-sm-2 col-form-label">Nama Kelas</label>
                    <div class="col-sm-10">
                        <input type="text" name="kelas" value="<?= $kelas['kelas'] ?>" class="form-control" id="inputKelas1" placeholder="kelas 1 a">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-info"><b>+ Ubah Kelas</b></button>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </form>
    </div>
</section>
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