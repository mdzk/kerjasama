<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>


<section class="section">
  <div class="section-header">
    <h1>Ajukan Kerjasama</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="<?= base_url(); ?>home">Dashboard</a></div>
      <div class="breadcrumb-item">Ajukan Kerjasama</div>
    </div>
  </div>


  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Form Ajukan Kerjasama Baru</h4>
          <div style="margin-left: 750px;">

          </div>
          <a class="btn btn-success rounded-pill mb-2 btn-icon action-icon" href="<?= route_to('kerjasama'); ?>">
            Kerjasama
          </a>
        </div>

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
        
        <form enctype="multipart/form-data" action="<?= route_to('ajukan-add'); ?>" method="POST">
          <div class="card-body form">
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Perihal Kerja Sama</label>
              <div class="col-sm-12 col-md-7">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="perihal_ks"></textarea>
                <div id="passwordHelpBlock" class="form-text">
                  Tuliskan secara singkat deskripsi kerja sama ini
                </div>
              </div>
            </div>

            <div class="row mb-2">
              <div class="form-group col-2 " style="margin-left: 277px;">
                <label>Awal Kerjasama</label>
                <input type="date" class="form-control" name="awal_ks">
              </div>
              <div class="form-group col-2">
                <label>Akhir Kerja</label>
                <input type="date" class="form-control" name="akhir_ks">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bentuk Kegiatan</label>
              <div class="col-sm-12 col-md-7">
                <select class="form-control selectric" name="bentuk_kegiatan">
                  <option>Pilih Bentuk Kegiatan</option>
                  <option value="pendidikan">Pendidikan</option>
                  <option value="penelitian">Penelitian</option>
                  <option value="pengabdian">Pengabdian</option>
                </select>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Unit Pelaksanaan Kerjasama</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="unit_p_ks">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Kerjasama</label>
              <div class="col-sm-12 col-md-7">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi_ks"></textarea>
                <div id="passwordHelpBlock" class="form-text">
                  Tuliskan secara singkat deskripsi kerja sama ini
                </div>
              </div>
            </div>

            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Dokumen</label>
              <div class="col-sm-12 col-md-7">
                <select class="form-control selectric" name="jenis_dokumen">
                  <option>Pilih Jenis Kegiatan</option>
                  <option value="MOU">MOU</option>
                  <option value="PKS">PKS</option>
                </select>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Rencana Implementasi Kegiatan</label>
              <div class="col-sm-12 col-md-7">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="rancangan_ik"></textarea>
                <div id="passwordHelpBlock" class="form-text">
                  Tuliskan secara singkat implementasi kegiatan kerja sama ini
                </div>
              </div>
            </div>
            <div class="form-group row mb-4" style="margin-left: 260px;">
              <div class=" col-12 col-md-7">
                <input type="file" class="form-control" id="inputGroupFile01" name="file_input_pk">
              </div>
              <div id="passwordHelpBlock" class="form-text">
                Penawaran kerjasama
              </div>
            </div>
            <div class="form-group row mb-4" style="margin-left: 260px;">
              <div class="col-12 col-md-7">
                <input type="file" class="form-control" id="inputGroupFile01" name="file_input_dk">
              </div>
              <div id="passwordHelpBlock" class="form-text">
                Draf kerjasama
              </div>
            </div>

            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>

              <div class="col-sm-12 col-md-7">
                <button type="submit" class="btn btn-primary">Ajukan</button>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>

</section>

<?= $this->endSection() ?>