<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>


<section class="section">
    <div class="section-header">
        <h1>Akun Pengguna</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>home">Dashboard</a></div>
            <div class="breadcrumb-item">Akun Pengguna</div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <button class="btn btn-primary rounded-pill mb-2" data-bs-toggle="modal" data-bs-target="#tambahuser">+ Akun Baru</button>
            <a class="btn rounded-pill mb-2" href="<?= route_to('verif-akun'); ?>">Verifikasi Akun</a>
            <div class="card">
                <div class="card-header">
                    <h4>Akun Pengguna</h4>
                </div>

                <?php $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php } ?>

                <div class="card-body">
                    <table class="table" id="table-1">
                        <thead>
                            <tr style="text-align:center;">
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
                            <?php $no = 1;
                            foreach ($users as $user) : ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $user['nik']; ?></td>
                                    <td><?= $user['nm_instansi']; ?></td>
                                    <td><?= $user['email']; ?></td>
                                    <td><?= $user['no_hp']; ?></td>
                                    <td><?= $user['roles']; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editakun<?= $user['id_users']; ?>">Edit</a>
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#hapususer<?= $user['id_users']; ?>">Hapus</button>

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


<?php foreach ($users as $user) : ?>

    <!-- Tambah akun -->
    <div class="modal fade text-left modal-borderless" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
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
            <form action="<?= route_to('akun-add'); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Akun Baru</h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="first_name">Nama Instansi</label>
                                <input id="nm_instansi" type="text" class="form-control" name="nm_instansi" autofocus>
                            </div>
                            <div class="form-group col-6">
                                <label for="last_name">Nik</label>
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
                            <label for="roles">Roles</label>
                            <select id="roles" class="form-control" name="roles">
                                <option>Pilih Jenis Roles</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                                <option value="pimpinan">Pimpinan</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="email">Foto</label>
                            <input type="file" class="form-control" accept="image/*" id="formFile" name="foto">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                            <span class="d-sm-block">Batal</span>
                        </button>
                        <button name="submit" type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">

                            <span class="d-sm-block">Registrasi</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end tambah -->

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

    <!-- Edit akun modal -->
    <div class="modal fade text-left modal-borderless" id="editakun<?= $user['id_users']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Akun</h5>
                </div>

                <form action="<?= route_to('akun-update'); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_users" value="<?= $user['id_users']; ?>">
                    <div class="modal-body">
                        <div class="login-brand">
                            <img src="<?= base_url() . '/img/' . $user['foto']; ?>" style="object-fit: cover;" alt="foto" width="200" height="200" class="shadow-light rounded-circle">
                        </div>

                        <div class="form-group">
                            <label for="basicInput">Masukkan Foto Baru</label>
                            <input type="file" value="<?= base_url() . '/img/' . $user['foto']; ?>" name="foto" class="form-control {{$errors->first('cover') ? "is-invalid" : ""}}" accept="image/*" id="formFile" id="basicInput" placeholder="pilih file">
                            <span class="text-muted">*Kosongkan jika tidak ingin mengganti foto baru</span>
                        </div>

                        <div class="form-group">
                            <label for="basicInput">NIK</label>
                            <input type="number" maxlength="16" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);this.value = this.value.replace(/[^0-9]/g, '')" name="nik" value="<?= $user['nik'] ?>" class="form-control" id="basicInput">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Nama Instansi</label>
                            <input type="text" name="nm_instansi" value="<?= $user['nm_instansi'] ?>" class="form-control" id="basicInput">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Email</label>
                            <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control" id="basicInput">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Nomor Handphone</label>
                            <input type="text" name="no_hp" value="<?= $user['no_hp'] ?>" class="form-control" id="basicInput">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Provinsi</label>
                            <input type="text" name="provinsi" value="<?= $user['provinsi'] ?>" class="form-control" id="basicInput">
                        </div>
                        <div class="form-group">
                            <label for="basicInput">Kota</label>
                            <input type="text" name="kota" value="<?= $user['kota'] ?>" class="form-control" id="basicInput">
                        </div>
                        <div class="form-group">
                            <label for="roles">Roles</label>
                            <select id="roles" class="form-control" name="roles">
                                <option>Pilih Jenis Roles</option>
                                <option value="user" <?= $user['roles'] == 'user' ? 'selected' : '' ?>>User</option>
                                <option value="admin" <?= $user['roles'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                <option value="pimpinan" <?= $user['roles'] == 'pimpinan' ? 'selected' : '' ?>>Pimpinan</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="basicInput">Password</label>
                            <input type="password" name="password" class="form-control" id="basicInput">
                            <span class="text-muted">*Kosongkan jika tidak ingin mengubah password</span>
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

<?php endforeach; ?>


<?= $this->endSection() ?>