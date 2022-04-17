<?= $this->extend('admin/main_theme/theme_layout') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Dashboard</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?= $staff ?></h3>

            <p>Pegawai Terdaftar</p>
          </div>
          <div class="icon">
            <i class="fas fa-user"></i>
          </div>
          <a href="<?= route_to('adminguru') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?= $siswa ?></h3>

            <p>Siswa Terdaftar</p>
          </div>
          <div class="icon">
          <i class="fas fa-users"></i>
          </div>
          <a href="<?= route_to('adminsiswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?= $kelas ?></h3>

            <p>Kelas Terdaftar</p>
          </div>
          <div class="icon">
          <i class="fas fa-home"></i>
          </div>
          <a href="<?= route_to('adminkelas')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?= $pelajaran ?></h3>

            <p>Pelajaran Terdaftar</p>
          </div>
          <div class="icon">
          <i class="fas fa-book"></i>
          </div>
          <a href="<?= route_to('adminpelajaran')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
<?= $this->endsection() ?>