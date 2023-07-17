<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Selamat datang&mdash;Ajuin Kerjasama</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.css">

  <link rel="stylesheet" href="<?= base_url(); ?>/template/assets/css/sweetalert2.min.css">
  <link rel="icon" href="<?= base_url(); ?>/template/assets/img/favicon.png">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/datatables.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/dataTables.bootstrap4.min.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <ul class="navbar-nav mr-3">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <form class="form-inline mr-auto">
          <?php if (session('roles') == 'admin' || session('roles') == 'pimpinan') : ?>
            <!-- <div class="search-element">
              <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
              <button class="btn" type="submit"><i class="fas fa-search"></i></button>
              <div class="search-backdrop"></div>
              <div class="search-result">
              </div>
            </div> -->
          <?php endif; ?>
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
      <div class="main-sidebar sidebar-style-2" tabindex="1" style="overflow: hidden; outline: none;">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <img style="margin-left: 20;" src="<?= base_url(); ?>/template/assets/img/favicon.png" alt="logo" width="50">
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
  <script src="<?= base_url() ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url() ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url() ?>/template/assets/js/app.js"></script>
  <script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>
  <script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url(); ?>/template/assets/js/sweetalert2.min.js"></script>
  <script src="<?= base_url(); ?>/template/assets/js/datatables.min.js"></script>
  <script src="<?= base_url(); ?>/template/assets/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url(); ?>/template/assets/js/chart.js"></script>
  <?php if (session()->getFlashdata('pesan')) : ?>
    <script>
      Swal.fire(
        'Berhasil!',
        '<?= session()->getFlashdata('pesan'); ?>',
        'success'
      )
    </script>
  <?php endif; ?>
  <script>
    $(document).ready(function() {
      $('#table-1').DataTable();
    });

    var dataKerjasama = $.ajax({
      url: "<?= base_url() . 'json/kerjasama'; ?>",
      async: false,
      dataType: 'json'
    }).responseJSON;

    var statistics_chart = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(statistics_chart, {
      type: 'line',
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
        datasets: [{
          label: 'Statistics',
          data: dataKerjasama,
          borderWidth: 5,
          borderColor: '#6777ef',
          backgroundColor: 'transparent',
          pointBackgroundColor: '#fff',
          pointBorderColor: '#6777ef',
          pointRadius: 4
        }]
      },
      options: {
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            gridLines: {
              display: false,
              drawBorder: false,
            }
          }],
          xAxes: [{
            gridLines: {
              color: '#fbfbfb',
              lineWidth: 2
            }
          }]
        },
      }
    });
  </script>
</body>

</html>