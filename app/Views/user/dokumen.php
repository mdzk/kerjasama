<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>


<section class="section">
    <div class="section-header">
        <h1>Dokumen</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>home">Dashboard</a></div>
            <div class="breadcrumb-item">Dokumen</div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar dokumen yang berisikan (Penawaran Kerjasama) & (Draf Kerjasama)</h4>
                </div>



                <div class="row">
                    <?php foreach ($tb_uks as $tb_uk) : ?>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                            <article class="article">
                                <div class="article-header">
                                    <img class="article-image" src="<?= base_url(); ?>/img/pdf.png" alt="">
                                    </img>
                                    <div class="article-title">
                                        <h6>Penawaran Kerjasama	</h6>
                                        <h2><a href="<?= base_url(); ?>pdf/<?= $tb_uk['file_input_pk']; ?>">Lihat Dokumen</a></h2>
                                        <h6>Draf Kerjasama</h6>
                                        <h2><a href="<?= base_url(); ?>pdf/<?= $tb_uk['file_input_dk']; ?>">Lihat Dokumen</a></h2>

                                    </div>
                                </div>
                                <div class="article-details">
                                    <p><?= $tb_uk['perihal_ks']; ?></p>
                                    <p><?= $tb_uk['deskripsi_ks']; ?></p>
                                    <p><?= $tb_uk['awal_ks']; ?></p>
                                    </p>

                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>



            </div>
        </div>
    </div>

</section>




<?= $this->endSection() ?>