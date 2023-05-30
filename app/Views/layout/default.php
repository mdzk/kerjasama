<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Selamat datang&mdash;Ajuin Kerjasama</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.css">

  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/main/app.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/main/app-dark.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/shared/iconly.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/pages/summernote.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/pages/sweetalert2.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
            </div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" style="object-fit: cover;height: 30px;" src="<?= base_url() . '/img/' . $user['foto']; ?>" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block"><?= $user['nm_instansi']; ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title" style="text-align: center;">
                <h6><?= $user['roles']; ?></h6>
              </div>
              <a href="<?= site_url('profile') ?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= route_to('logout'); ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar ">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <img style="margin-left: 20;" src="https://sppd.fckng.site//assets/compiled/png/favicon.png" alt="logo" width="50">
            <a href="<?= site_url() ?>">Kerjasama</a>
          </div>

          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">AK</a>
          </div>
          <ul class="sidebar-menu">
            <?= $this->include('layout/menu') ?>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <?= $this->renderSection('content') ?>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2023 <div class="bullet"></div> Design By <a href="/">Ajuin Kerjasama</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <!-- General JS Scripts -->
  <script src="<?= base_url() ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->
  <script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>

  <!-- JS Libraies -->



  <!-- Template JS File -->
  <script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>
  <script src="<?= base_url() ?>/template/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url(); ?>/assets/js/app.js"></script>
  <script src="<?= base_url(); ?>/assets/js/extensions/jquery.min.js"></script>
  <script>
    var wtf = $.ajax({
      url: "<?= base_url() . '/admin/statistic'; ?>",
      async: false,
      dataType: 'json'
    }).responseJSON;
  </script>
  <script src="<?= base_url(); ?>/assets/js/extensions/summernote.js"></script>
  <script src="<?= base_url(); ?>/assets/js/extensions/sweetalert2.js"></script>
  <script src="<?= base_url(); ?>/assets/js/extensions/sweetalert2.min.js"></script>
  <script>
    $("#summernote").summernote({
      tabsize: 2,
      height: 320,
    })
  </script>
  <?php if (session()->getFlashdata('pesan')) : ?>
    <script>
      Swal.fire(
        'Berhasil!',
        '<?= session()->getFlashdata('pesan'); ?>',
        'success'
      )
    </script>
  <?php endif; ?>
</body>

</html>