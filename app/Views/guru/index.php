<?= $this->extend('guru/main_theme/theme_layout') ?>

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
              <li class="breadcrumb-item"><a href="<?= route_to('gurudashboard')?>">Home</a></li>
              <li class="breadcrumb-item active">MatPel</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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
        <div class="row">
          <?php foreach($pelajaran as $pelajaran) : ?>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-book-open"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b><?= strtoupper($pelajaran->pelajaran) ?></b></span>
                            <span class="info-box-text"><b><?= strtoupper($pelajaran->kelas) ?></b></span>
                            <span class="info-box-number">
                                <a href="<?= route_to('gurudetailpelajaran', $pelajaran->id_pelajaran) ?>" class="small-box-footer">
                                    Jadwal <i class="fas fa-arrow-circle-right"></i>
                                </a><br>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
          <?php endforeach; ?>
        </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
<?= $this->endsection() ?>