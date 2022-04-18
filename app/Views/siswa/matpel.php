<?= $this->extend('siswa/main_theme/theme_layout') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">

</section>

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="card card-info">
    <div class="card-body">
      <h3>Materi Mata Pelajaran</h3>
      <hr>
      <div id="accordion">
        <?php foreach ($matpel as $matpel) : ?>
            <div class="card card-info">
              <div class="card-header">
                <h4 class="card-title w-100">
                  <a class="d-block w-100" data-toggle="collapse" href="#collapse<?= $matpel->id_jadwal ?>">
                    <?= strtoupper($matpel->pelajaran . ' - ' .  $matpel->judul_materi) ?>
                  </a>
                </h4>
              </div>
              <div id="collapse<?= $matpel->id_jadwal ?>" class="collapse" data-parent="#accordion">
                <div class="card-body">
                  <p><u><b>Materi Pembelajaran</b></u></p>
                    <div style="text-align: justify;"><?= $matpel->ringkas_materi ?></div>
                  </p>
                  <p><b>Link Zoom : </b><a href="<?= $matpel->link_zoom ?>" target="_blank">LINK ZOOM / MEET</a></p>
                  <p><b>Materi : </b> <a href="<?= $matpel->file_upload == NULL ? '#': route_to('downloadberkas', $matpel->file_upload) ?>">Materi <?= $matpel->judul_materi ?> Download</a></p>
                </div>
              </div>
            </div>
        <?php endforeach ?>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
<?= $this->endsection() ?>
<!-- /.content -->