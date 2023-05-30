<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>


<section class="section">
  <div class="section-header">
    <h1>Kerjasama Berkahir</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="<?= base_url(); ?>home">Dashboard</a></div>
      <div class="breadcrumb-item">Kerjasama Berakhir</div>
    </div>
  </div>


  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Daftar Kerjasama Yang Akan Berakhir</h4>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Perihal Kerjasama </th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Pengusul</th>
              <th scope="col">Tanggal Berakhir</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($tb_uks as $tb_uk) : ?>
              <tr>
                <th scope="row"><?= $no++ ?></th>
                <td><?= $tb_uk['perihal_ks']; ?></td>
                <td><?= $tb_uk['deskripsi_ks']; ?></td>
                <td><?= $tb_uk['unit_p_ks']; ?></td>
                <td> <span class="badge badge-primary"><?= $tb_uk['akhir_ks']; ?></span></td>
              </tr>
            <?php endforeach; ?>

        </table>

      </div>
    </div>
  </div>


</section>



<?= $this->endSection() ?>