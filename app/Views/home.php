<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>


<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>
  <div class="mb-4">
    <div class="hero text-white hero-bg-image hero-bg-parallax" data-background="<?= base_url() ?>/template/assets/img/unsplash/andre-benz-1214056-unsplash.jpg" style="background-image: url(&quot;<?= base_url() ?>/template/assets/img/unsplash/andre-benz-1214056-unsplash.jpg&quot;);">
      <div class="hero-inner">
        <h2>Anda sebagai <u style="text-transform: uppercase;"><?= $user['roles']; ?></u></h2>
        <div class="d-sm-none d-lg-inline-block">
          <h5><?= $user['nm_instansi']; ?></h5>
        </div>
        <?php if (session('roles') == 'user') : ?>
          <p class="lead">Akses cepat berada di section ini.</p>
          <div class="mt-4">
            <a href="<?= site_url('ajukan') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class=""></i> Ajukan Kerjasama</a>
            <a href="<?= site_url('usulan') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class=""></i> Usulan Kerjasama</a>
            <a href="<?= site_url('aktif-kerjasama') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class=""></i> Kerjasama Aktif</a>
            <a href="<?= site_url('kerjasama-berakhir') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class=""></i> Kerjasama Tidak Aktif</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php if (session('roles') != 'user') : ?>
    <div class="section-body">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Kerjasama</h4>
              </div>
              <div class="card-body">
                <!-- <?php if (session('roles') == 'user') : ?>
                <?= $tb_uks; ?>
              <?php endif; ?> -->

                <?php if (session('roles') != 'user') : ?>
                  <?= $tb_uksall; ?>
                <?php endif; ?>

              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Dokumen Kerjasama Selesai</h4>
              </div>
              <div class="card-body">
                <!-- <?php if (session('roles') == 'user') : ?>
                <?= $tb_ttd; ?>
              <?php endif; ?> -->

                <?php if (session('roles') != 'user') : ?>
                  <?= $tb_ttdall; ?>
                <?php endif; ?>

              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Dokumen Kerjasama Masih Proses</h4>
              </div>
              <div class="card-body">
                <!-- <?php if (session('roles') == 'user') : ?>
                <?= $tb_proses; ?>
              <?php endif; ?> -->

                <?php if (session('roles') != 'user') : ?>
                  <?= $tb_prosesall; ?>
                <?php endif; ?>

              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Dokumen Kerjasama Ditolak</h4>
              </div>
              <div class="card-body">
                <!-- <?php if (session('roles') == 'user') : ?>
                <?= $tb_tolak; ?>
              <?php endif; ?> -->

                <?php if (session('roles') != 'user') : ?>
                  <?= $tb_tolakall; ?>
                <?php endif; ?>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Statistics</h4>
              <div class="card-header-action">
              </div>
            </div>
            <div class="card-body">
              <canvas id="myChart" style="display: block; width: 644px; height: 390px;" class="chartjs-render-monitor" width="644" height="390"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif ?>

</section>

<?= $this->endSection() ?>