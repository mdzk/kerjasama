<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>

<!-- Modal Cetak -->
<div class="modal fade text-left modal-borderless" id="cetak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cetak Laporan</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <form action="<?= route_to('export-laporan'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="name">Pilih Bulan</label>
            <select name="bulan" class="form-control">
              <option value="1">Januari</option>
              <option value="2">Februari</option>
              <option value="3">Maret</option>
              <option value="4">April</option>
              <option value="5">Mei</option>
              <option value="6">Juni</option>
              <option value="7">Juli</option>
              <option value="8">Agustus</option>
              <option value="9">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="name">Pilih Tahun</label>
            <select name="tahun" class="form-control">
              <?php for ($x = $usulan_lama; $x <= $usulan_terbaru; $x++) : ?>
                <option name="bulan" value="<?= $x; ?>"><?= $x; ?></option>
              <?php endfor; ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light-primary ml-1" data-bs-dismiss="modal">
            <span class="d-sm-block">Tutup</span>
          </button>
          <button name="submit" type="submit" class="btn btn-primary" data-bs-dismiss="modal">
            <span class="d-sm-block">Cetak</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Cetak -->

<section class="section">
  <div class="section-header">
    <h1>Laporan Kerjasama</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="<?= base_url(); ?>home">Dashboard</a></div>
      <div class="breadcrumb-item">Laporan Kerjasama</div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Laporan Kerjasama <button class="btn btn-primary rounded-pill mb-2" data-bs-toggle="modal" data-bs-target="#cetak"><i class="fas fa-print"></i> Cetak</button></h4>
        </div>


        <div class="card-body">

          <?php if ($errors = session()->getFlashdata('not-found')) : ?>
            <div class="alert alert-danger alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>×</span>
                </button>
                <?= $errors ?>
              </div>
            </div>
          <?php endif; ?>

          <table class="table" id="table-1">
            <thead>
              <tr style="text-align:center;">
                <th scope="col">No</th>
                <th scope="col">Perihal Kerjasama </th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Pengusul</th>
                <th scope="col">Tanggal Diajukan</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($tb_uks as $tb_uk) : ?>
                <tr style="text-align:center;">
                  <th scope="row"><?= $no++ ?></th>
                  <td><?= $tb_uk['perihal_ks']; ?></td>
                  <td><?= $tb_uk['deskripsi_ks']; ?></td>
                  <td><?= $tb_uk['unit_p_ks']; ?></td>
                  <td><?= $tb_uk['awal_ks']; ?></td>
                  <td>
                    <?php if ($tb_uk['status'] == 'proses') : ?>
                      <span class="badge badge-secondary">Proses</span>
                    <?php endif; ?>
                    <?php if ($tb_uk['status'] == 'ttd') : ?>
                      <span class="badge badge-success">Acc</span>
                    <?php endif; ?>
                    <?php if ($tb_uk['status'] == 'revisi' || $tb_uk['status'] == 'revisiadmin') : ?>
                      <span class="badge badge-warning">Revisi</span>
                    <?php endif; ?>
                    <?php if ($tb_uk['status'] == 'tolak') : ?>
                      <span class="badge badge-danger">Tolak</span>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>


</section>
<?php foreach ($tb_uks as $tb_uk) : ?>
  <!-- Edit kerjasama modal -->
  <div class="modal fade text-left modal-borderless" id="editkategori<?= $tb_uk['id_uk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Kerjasama</h5>
        </div>

        <form action="<?= route_to('usulan-update'); ?>" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id_uk" value="<?= $tb_uk['id_uk']; ?>">
          <div class="modal-body">
            <div class="form-group">
              <label for="basicInput">Perihal Kerjasama</label>
              <input type="text" name="perihal_ks" value="<?= $tb_uk['perihal_ks'] ?>" class="form-control" id="basicInput">
            </div>
            <div class="form-group">
              <label for="basicInput">Awal Kerjasama</label>
              <input type="date" name="awal_ks" value="<?= $tb_uk['awal_ks'] ?>" class="form-control" id="basicInput">
            </div>
            <div class="form-group">
              <label for="basicInput">Akhir Kerjasama</label>
              <input type="date" name="akhir_ks" value="<?= $tb_uk['akhir_ks'] ?>" class="form-control" id="basicInput">
            </div>
            <div class="form-group">
              <label for="basicInput">Bentuk Kegiatan</label>
              <input type="text" name="bentuk_kegiatan" value="<?= $tb_uk['bentuk_kegiatan'] ?>" class="form-control" id="basicInput">
            </div>
            <div class="form-group">
              <label for="basicInput">Unit Pelaksanaan Kerjasama</label>
              <input type="text" name="unit_p_ks" value="<?= $tb_uk['unit_p_ks'] ?>" class="form-control" id="basicInput">
            </div>
            <div class="form-group">
              <label for="basicInput">Deskripsi Kerjasama</label>
              <input type="text" name="deskripsi_ks" value="<?= $tb_uk['deskripsi_ks'] ?>" class="form-control" id="basicInput">
            </div>
            <div class="form-group">
              <label for="basicInput">Jenis Dokumen</label>
              <input type="text" name="jenis_dokumen" value="<?= $tb_uk['jenis_dokumen'] ?>" class="form-control" id="basicInput">
            </div>
            <div class="form-group">
              <label for="basicInput">Rancangan Implementasi Kegiatan</label>
              <input type="text" name="rancangan_ik" value="<?= $tb_uk['rancangan_ik'] ?>" class="form-control" id="basicInput">
            </div>

            <div class="form-group">
              <label for="basicInput">Dokumen Penawaran Kerjasama</label>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Penawaran Kerjasama</th>
                    <th scope="col">Draf Kerjasama </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="form-group">
                        <label for="formFile">File Penawaran Kerjasama</label>
                        <input name="filePDF" class="form-control" type="file" accept="application/pdf" id="formFile">
                        <div class="invalid-feedback">
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="form-group">
                        <label for="formFile">File Draf Kegiatan</label>
                        <input name="filePDF2" class="form-control" type="file" accept="application/pdf" id="formFile">
                        <div class="invalid-feedback">
                        </div>
                      </div>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
              <span class="d-sm-block">Tutup</span>
            </button>
            <button type="submit" name="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
              <span class="d-sm-block">Simpan</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Detail kerjasama modal -->
  <div class="modal fade text-left modal-borderless" id="lihatkategori<?= $tb_uk['id_uk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Kerjasama</h5>
        </div>

        <form action="<?= route_to('usulan-lihat'); ?>" method="POST">
          <input type="hidden" name="id_uk" value="<?= $tb_uk['id_uk']; ?>">
          <div class="modal-body">
            <div class="form-group">
              <label for="basicInput">Perihal Kerjasama</label>
              <input type="text" name="perihal_ks" disabled value="<?= $tb_uk['perihal_ks'] ?>" class="form-control" id="basicInput" placeholder="Masukkan Nama Donatur" @error('name') is-invalid @enderror>
            </div>
            <div class="form-group">
              <label for="basicInput">Awal Kerjasama</label>
              <input type="text" name="awal_ks" disabled value="<?= $tb_uk['awal_ks'] ?>" class="form-control" id="basicInput" placeholder="Masukkan Judul" @error('name') is-invalid @enderror>
            </div>
            <div class="form-group">
              <label for="basicInput">Akhir Kerjasama</label>
              <input type="text" name="akhir_ks" disabled value="<?= $tb_uk['akhir_ks'] ?>" class="form-control" id="basicInput" placeholder="Masukkan Judul" @error('name') is-invalid @enderror>
            </div>
            <div class="form-group">
              <label for="basicInput">Bentuk Kegiatan</label>
              <input type="text" name="bentuk_kegiatan" disabled value="<?= $tb_uk['bentuk_kegiatan'] ?>" class="form-control" id="basicInput" placeholder="Masukkan Judul" @error('name') is-invalid @enderror>
            </div>
            <div class="form-group">
              <label for="basicInput">Unit Pelaksanaan Kerjasama</label>
              <input type="text" name="unit_p_ks" disabled value="<?= $tb_uk['unit_p_ks'] ?>" class="form-control" id="basicInput" placeholder="Masukkan Judul" @error('name') is-invalid @enderror>
            </div>
            <div class="form-group">
              <label for="basicInput">Deskripsi Kerjasama</label>
              <input type="text" name="deskripsi_ks" disabled value="<?= $tb_uk['deskripsi_ks'] ?>" class="form-control" id="basicInput" placeholder="Masukkan Judul" @error('name') is-invalid @enderror>
            </div>
            <div class="form-group">
              <label for="basicInput">Jenis Dokumen</label>
              <input type="text" name="jenis_dokumen" disabled value="<?= $tb_uk['jenis_dokumen'] ?>" class="form-control" id="basicInput" placeholder="Masukkan Judul" @error('name') is-invalid @enderror>
            </div>
            <div class="form-group">
              <label for="basicInput">Rancangan Implementasi Kegiatan</label>
              <input type="text" name="rancangan_ik" disabled value="<?= $tb_uk['rancangan_ik'] ?>" class="form-control" id="basicInput" placeholder="Masukkan Judul" @error('name') is-invalid @enderror>
            </div>

            <div class="form-group">
              <label for="basicInput">Dokumen Penawaran Kerjasama</label>
              <table class="table" style="width: 20;">
                <thead>
                  <tr>
                    <th scope="col">Penawaran Kerjasama</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <a href="<?= base_url(); ?>pdf/<?= $tb_uk['file_input_pk']; ?>">Lihat Dokumen</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="form-group">
              <table class="table" style="width: 20;">
                <thead>
                  <tr>
                    <th scope="col">Draf Kerjasama </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <a href="<?= base_url(); ?>pdf/<?= $tb_uk['file_input_dk']; ?>">Lihat Dokumen</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light-danger" data-bs-dismiss="modal">
              <span class="d-sm-block">Tutup</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- verivikasi modal -->
  <div class="modal fade text-left modal-borderless" id="verifikasi<?= $tb_uk['id_uk']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Verifikasi Usulan Kerjasama</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>

        <form action="<?= route_to('verif-usulan-sekarang'); ?>" method="POST">
          <div class="modal-body">
            <p>
              Apakah anda yakin ingin verifikasi usulan kerjasama ini?
            </p>

            <input type="text" value="<?= $tb_uk['id_uk']; ?>" name="id_uk" hidden>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light-primary ml-1" data-bs-dismiss="modal">
              <span class="d-sm-block">Tidak</span>
            </button>
            <button type="submit" name="submit" class="btn btn-primary" data-bs-dismiss="modal">
              <span class="d-sm-block">Ya</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  </td>
  <!-- end verivikasi -->
<?php endforeach; ?>

<?= $this->endSection() ?>