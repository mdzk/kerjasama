<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?= base_url(); ?>/template/assets/img/favicon.png" alt="logo" width="200" class="shadow-light">
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
              </div>

              <div class="card-body">
                <?php if (session()->getFlashdata('msg')) : ?>
                  <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif; ?>
                <?php
                ///jika error
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                  <div class="alert alert-danger" role="alert">
                    <ul>
                      <?php foreach ($errors as $error) : ?>
                        <li><?= esc($error) ?></li>
                      <?php endforeach ?>
                    </ul>
                  </div>
                <?php } ?>

                <?php
                if (session()->getFlashdata('pesan')) {
                  echo '<div class="alert alert-success" role="alert">';
                  echo session()->getFlashdata('pesan');
                  echo '</div>';
                }
                ?>
                <form action="<?= route_to('auth-add'); ?>" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="first_name">Nama Instansi</label>
                      <input id="nm_instansi" type="text" class="form-control" name="nm_instansi" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Nomor Induk Keluarga(NIK)</label>
                      <input id="nik" class="form-control" name="nik" type="number" maxlength="16" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);this.value = this.value.replace(/[^0-9]/g, '')" placeholder="18720202020001">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="no_hp">No Handphone</label>
                    <input id="no_hp" type="text" class="form-control" name="no_hp">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Provinsi</label>
                      <input type="text" class="form-control" name="provinsi">
                    </div>
                    <div class="form-group col-6">
                      <label>Kota</label>
                      <input type="text" class="form-control" name="kota">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="repassword">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Foto</label>
                    <input type="file" class="form-control {{$errors->first('cover') ? "is-invalid" : ""}}" accept="image/*" id="formFile" name="foto">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Sudah memiliki akun? <a href="<?= base_url('/') ?>">Masuk</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; Ajuin Kerjasama 2023
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <!-- General JS Scripts -->
  <script src="<?= base_url() ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url() ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>

  <script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>
  <script src="<?= base_url() ?>/template/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url() ?>/template/assets/js/page/auth-register.js"></script>
</body>

</html>