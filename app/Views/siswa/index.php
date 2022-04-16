<?= $this->extend('siswa/main_theme/theme_layout') ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>MATA PELAJARAN</h1>
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
      <h3 class="card-title">List Jadwal MatPel</h3>

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
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
<?= $this->endsection() ?>
<!-- /.content -->