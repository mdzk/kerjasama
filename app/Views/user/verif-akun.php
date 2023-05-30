<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>


<section class="section">
    <div class="section-header">
        <h1>Akun</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>home">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>akun">Akun</a></div>
            <div class="breadcrumb-item">Verifikasi Akun</div>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <a class="btn btn-primary rounded-pill mb-2 btn-icon action-icon" href="<?= route_to('akun'); ?>">
                <!-- <span class="fonticon-wrap me-2">
                    <i class="bi bi-chevron-left"></i>
                </span> -->
                Kembali
            </a>
            <div class="card">
                <div class="card-header">
                    <h4>Verifikasi Akun Pengguna</h4>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nik</th>
                            <th>Nama Instansi</th>
                            <th>Email</th>
                            <th>No Hp</th>
                            <th>Roles</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($users as $user) : ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $user['nik']; ?></td>
                                <td><?= $user['nm_instansi']; ?></td>
                                <td><?= $user['email']; ?></td>
                                <td><?= $user['no_hp']; ?></td>
                                <td><?= $user['roles']; ?></td>
                                <td>
                                    <ul class="list-inline m-0 d-flex">
                                        <li class="list-inline-item mail-delete">

                                            <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#editkategori<?= $user['id_users']; ?>">
                                                Verifikasi
                                            </button>
                                        </li>
                                        <li class="list-inline-item mail-unread">
                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapususer<?= $user['id_users']; ?>">
                                                Hapus
                                            </button>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>
        </div>
    </div>

</section>

<!-- verivikasi modal -->
<div class="modal fade text-left modal-borderless" id="editkategori<?= $user['id_users']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Verifikasi Akun</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>

                <form action="<?= route_to('verif-akun-sekarang'); ?>" method="POST">
                    <div class="modal-body">
                        <p>
                            Apakah anda yakin ingin verifikasi akun ini?
                        </p>

                        <input type="text" value="<?= $user['id_users']; ?>" name="id_users" hidden>
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

     <!--Hapus User Modal Content -->
     <div class="modal fade text-left modal-borderless" id="hapususer<?= $user['id_users']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Peringatan</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>

                <form action="<?= route_to('akun-delete'); ?>" method="POST">

                    <div class="modal-body">
                        <p>
                            Apakah anda yakin ingin menghapus akun ini?
                        </p>
                    </div>
                    <input type="number" name="id_users" value="<?= $user['id_users']; ?>" hidden>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary ml-1" data-bs-dismiss="modal">
                            <span class="d-sm-block">Tidak</span>
                        </button>
                        <button name="submit" type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                            <span class="d-sm-block">Ya</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--Hapus User Modal Content End-->


<?= $this->endSection() ?>