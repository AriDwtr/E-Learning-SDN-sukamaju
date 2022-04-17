<?php foreach ($pelajaran as $pelajaran) : ?>
    <?= $this->extend('guru/main_theme/theme_layout') ?>

    <?= $this->section('content') ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>JADWAL PELAJARAN <?= strtoupper($pelajaran->pelajaran) ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= route_to('gurudashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">MatPel</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Jadwal MatPel <?= strtoupper($pelajaran->pelajaran) ?></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">

                <form action="<?= route_to('gurupelajaranstore') ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputmatpel">Nama Mata Pelajaran</label>
                        <input type="text" class="form-control" value="<?= strtoupper($pelajaran->pelajaran . ' (' . $pelajaran->kelas . ')') ?>" readonly>
                        <input type="text" name="idpelajaran" class="form-control" value="<?= $pelajaran->id_pelajaran ?>" hidden>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputmateri">Judul Materi</label>
                        <input type="text" class="form-control" name="judul" id="exampleInputmateri" placeholder="Pertemuan 1" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputmateri">Ringkasan Materi</label>
                        <textarea id="summernote" name="kilas" rows="8">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputzoom">Link Zoom</label>
                        <input type="text" class="form-control" name="zoom" id="exampleInputzoom" placeholder="https://us05web.zoom.us/j/89083952521?pwd=SkFLSjJjaDdZUkdsVTRaSzBwVVJtQT09">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputtanggal">Tanggal Pertemuan</label>
                        <input type="date" class="form-control" name="tanggal" id="exampleInputtanggal">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Upload Materi</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="filemateri" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info"><i class="nav-icon fas fa-chalkboard-teacher"></i> Tambah Jadwal</button>

                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <br>
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Daftar Jadwal MatPel <?= strtoupper($pelajaran->pelajaran) ?></h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Judul Pertemuan</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas</th>
                            <th>Tanggal Pertemuan</th>
                            <th>Link Zoom</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1;
                        foreach ($jadwalpelajaran as $jadwalpelajaran) : ?>
                            <tr>
                                <td><?= $nomor++ ?></td>
                                <td><b><?= ucwords($jadwalpelajaran->judul_materi) ?><b></td>
                                <td><b><?= strtoupper($jadwalpelajaran->pelajaran) ?><b></td>
                                <td><i><?= ucwords($jadwalpelajaran->kelas) ?></i></td>
                                <td><?= date("d-m-Y", strtotime($jadwalpelajaran->tanggal_jadwal)) ?></td>
                                <td><i><?= $jadwalpelajaran->link_zoom ?></i></td>
                                <td>
                                <a href="<?= route_to('daftarabsensisiswa', $jadwalpelajaran->id_jadwal) ?>" style="color:green"><i class="fas fa-address-book"></i> Lihat Absensi</a>
                                <br>
                                <a href="<?= route_to('deletejadwalpelajaran', $jadwalpelajaran->id_jadwal) ?>" style="color:red" onclick='return window.confirm("Are you sure you want to delete this?");'><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
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
<?php endforeach ?>