<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>


<section class="section">
  <div class="section-header">
    <h1>Daftar Kerjasama</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="<?= base_url(); ?>home">Dashboard</a></div>
      <div class="breadcrumb-item">Daftar Kerjasama</div>
    </div>
  </div>


  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Daftar Seluruh Kerjasama</h4>
        </div>
        <div class="card-body">
          <table class="table" id="table-1">
            <thead>
              <tr style="text-align:center;">
                <th scope="col">No</th>
                <th scope="col">Perihal Kerjasama </th>
                <th scope="col">Pengusul</th>
                <th scope="col">Tanggal Diajukan</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($tb_uks as $tb_uk) : ?>
                <tr style="text-align:center;">
                  <th scope="row"><?= $no++ ?></th>
                  <td><?= $tb_uk['perihal_ks']; ?></td>
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
                  <td>
                    <a href="#" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editkategori<?= $tb_uk['id_uk']; ?>">Revisi</a>
                    <a href="#" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#acc<?= $tb_uk['id_uk']; ?>">ACC</a>
                    <a href="#" data-href="#" onclick="confirmToDelete(this)" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#tolak<?= $tb_uk['id_uk']; ?>">Tolak</a>
                    <a href="#" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $tb_uk['id_uk']; ?>">Delete</a>
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
  <!-- Revisi Modal -->
  <div class="modal fade text-left modal-borderless" id="editkategori<?= $tb_uk['id_uk']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Revisi Usulan Kerjasama</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>

        <form action="<?= route_to('kerjasama-update'); ?>" method="POST">
          <div class="modal-body">
            <p>

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
              <input type="text" name="awal_ks" disabled value="<?= $tb_uk['akhir_ks'] ?>" class="form-control" id="basicInput" placeholder="Masukkan Judul" @error('name') is-invalid @enderror>
            </div>
            <div class="form-group">
              <label for="basicInput">Bentuk Kegiatan</label>
              <input type="text" name="awal_ks" disabled value="<?= $tb_uk['bentuk_kegiatan'] ?>" class="form-control" id="basicInput" placeholder="Masukkan Judul" @error('name') is-invalid @enderror>
            </div>
            <div class="form-group">
              <label for="basicInput">Unit Pelaksanaan Kerjasama</label>
              <input type="text" name="awal_ks" disabled value="<?= $tb_uk['unit_p_ks'] ?>" class="form-control" id="basicInput" placeholder="Masukkan Judul" @error('name') is-invalid @enderror>
            </div>
            <div class="form-group">
              <label for="basicInput">Deskripsi Kerjasama</label>
              <input type="text" name="awal_ks" disabled value="<?= $tb_uk['deskripsi_ks'] ?>" class="form-control" id="basicInput" placeholder="Masukkan Judul" @error('name') is-invalid @enderror>
            </div>
            <div class="form-group">
              <label for="basicInput">Jenis Dokumen</label>
              <input type="text" name="awal_ks" disabled value="<?= $tb_uk['jenis_dokumen'] ?>" class="form-control" id="basicInput" placeholder="Masukkan Judul" @error('name') is-invalid @enderror>
            </div>
            <div class="form-group">
              <label for="basicInput">Rancangan Implementasi Kegiatan</label>
              <input type="text" name="awal_ks" disabled value="<?= $tb_uk['rancangan_ik'] ?>" class="form-control" id="basicInput" placeholder="Masukkan Judul" @error('name') is-invalid @enderror>
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

            <div class="form-group">
              <label for="">Keterangan</label>
              <input name="keterangan" class="form-control" type="text">
            </div>
            </p>

            <input type="text" value="<?= $tb_uk['id_uk']; ?>" name="id_uk" hidden>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light-primary ml-1" data-bs-dismiss="modal">
              <span class="d-sm-block">Tutup</span>
            </button>
            <button type="submit" name="submit" class="btn btn-primary" data-bs-dismiss="modal">
              <span class="d-sm-block">Submit</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Revisi Modal -->

  <!-- verivikasi revisi modal -->
  <div class="modal fade text-left modal-borderless" id="revisi<?= $tb_uk['id_uk']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Revisi Usulan Kerjasama</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>

        <form action="<?= route_to('verif-kerjasama-sekarang-revisi'); ?>" method="POST">
          <div class="modal-body">
            <p>
              Apakah anda yakin ingin revisi usulan kerjasama ini?
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
  <!-- end revisi verivikasi -->

  <!-- verivikasi acc modal -->
  <div class="modal fade text-left modal-borderless" id="acc<?= $tb_uk['id_uk']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Setujui Usulan Kerjasama</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>

        <form action="<?= route_to('verif-kerjasama-sekarang-acc'); ?>" method="POST">
          <div class="modal-body">
            <p>
              Apakah anda yakin ingin menyetujui usulan kerjasama ini?
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
  <!-- end acc verivikasi -->

  <!-- delete acc modal -->
  <div class="modal fade text-left modal-borderless" id="delete<?= $tb_uk['id_uk']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Hapus Kerjasama</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>

        <form action="<?= route_to('kerjasama-hapus'); ?>" method="POST">
          <div class="modal-body">
            <p>
              Apakah anda yakin ingin mengahapus usulan kerjasama ini?
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
  <!-- end acc delete -->

  <!-- verivikasi tolak modal -->
  <div class="modal fade text-left modal-borderless" id="tolak<?= $tb_uk['id_uk']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tolak Usulan Kerjasama</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>

        <form action="<?= route_to('verif-kerjasama-sekarang-tolak'); ?>" method="POST">
          <div class="modal-body">
            <p>
              Apakah anda yakin ingin menolak usulan kerjasama ini?
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