    <?= $this->extend('guru/main_theme/theme_layout') ?>

    <?= $this->section('content') ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Daftar Absensi </h3>

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
                <table id="example3" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Pertemuan</th>
                            <th>Waktu Absensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1;
                        foreach ($absensi as $absensi) : ?>
                            <tr>
                                <td><?= $nomor++ ?></td>
                                <td><i><?= $absensi->nisn  ?><i></td>
                                <td><b><?= ucwords($absensi->nama_siswa) ?></b></td>
                                <td><?= strtoupper($absensi->jenis_kelamin) ?></td>
                                <td><?= ucwords($absensi->judul_materi.' - '.$absensi->pelajaran.' - '.$absensi->kelas) ?></td>
                                <td><?= $absensi->waktu_absensi ?></td>
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