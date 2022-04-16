<?php
function hari_ini()
{
  $hari = date("D");

  switch ($hari) {
    case 'Sun':
      $hari_ini = "Minggu";
      break;

    case 'Mon':
      $hari_ini = "Senin";
      break;

    case 'Tue':
      $hari_ini = "Selasa";
      break;

    case 'Wed':
      $hari_ini = "Rabu";
      break;

    case 'Thu':
      $hari_ini = "Kamis";
      break;

    case 'Fri':
      $hari_ini = "Jumat";
      break;

    case 'Sat':
      $hari_ini = "Sabtu";
      break;

    default:
      $hari_ini = "Tidak di ketahui";
      break;
  }

  return "<b>" . $hari_ini . "</b>";
}
function tgl_indo($tanggal)
{
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);

  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun

  return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>
<?= $this->extend('siswa/main_theme/theme_layout') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">

</section>

<!-- Main content -->
<section class="content">
<?php if (session()->getFlashdata('msg')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif; ?>
  <!-- Default box -->
  <div class="card card-info">
    <div class="card-body">
      <h3><?= hari_ini() . ', ' . tgl_indo(date('Y-m-d')) ?></h3>
      <hr>
      <div id="accordion">
        <?php foreach ($jadwalpelajaran as $jadwal) : ?>
          <?php if ($jadwal->tanggal_jadwal == date("Y-m-d")) { ?>
            <div class="card card-info">
              <div class="card-header">
                <h4 class="card-title w-100">
                  <a class="d-block w-100" data-toggle="collapse" href="#collapse<?= $jadwal->id_jadwal ?>">
                    <?= strtoupper($jadwal->pelajaran . ' - ' .  $jadwal->judul_materi) ?>
                  </a>
                </h4>
              </div>
              <div id="collapse<?= $jadwal->id_jadwal ?>" class="collapse" data-parent="#accordion">
                <div class="card-body">
                  <p><u><b>Materi Pembelajaran</b></u></p>
                    <div style="text-align: justify;"><?= $jadwal->ringkas_materi ?></div>
                  </p>
                  <p><b>Link Zoom : </b> <?= $jadwal->link_zoom ?></p>
                  <p><b>Materi : </b> <a href="<?= $jadwal->file_upload == NULL ? '#': route_to('downloadberkas', $jadwal->file_upload) ?>">Materi <?= $jadwal->judul_materi ?> Download</a></p>
                  <br>
                  <a href="<?= route_to('absensisiswa', $jadwal->id_jadwal) ?>" class="btn btn-primary"><i class="fas fa-hand-paper"></i> Absensi Sekarang</a>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php endforeach ?>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
<?= $this->endsection() ?>
<!-- /.content -->