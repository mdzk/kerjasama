<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>


<section class="section">
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?= base_url(); ?>home">Dashboard</a></div>
            <div class="breadcrumb-item">Profile</div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Profile</h4>
                </div>
                <div class="login-brand">
                    <img src="<?= base_url() . '/img/' . $user['foto']; ?>" style="object-fit: cover;" alt="foto" width="200" height="200" class="shadow-light rounded-circle">
                    <h5 class="font-bold">
                        <button type="button" class="btn btn-sm btn-light-secondary btn-icon action-icon" data-bs-toggle="modal" data-bs-target="#editfoto"> Edit
                        </button>
                    </h5>
                </div>

                <form action="<?= route_to('profile-update'); ?>" method="POST" enctype="multipart/form-data">
                    <input type="number" name="id_users" hidden value="<?= $user['id_users']; ?>">
                    <div class="col-12">
                        <div class="card mx-2 my-2">
                            <div class="card-body py-4 px-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3 name">
                                                <span class="text-muted">Nik</span>
                                                <h5 class="font-bold"><?= $user['nik']; ?>
                                                    <button type="button" class="btn btn-sm btn-light-secondary btn-icon action-icon" data-bs-toggle="modal" data-bs-target="#editnik"> Edit
                                                    </button>
                                                </h5>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card mx-2 my-2">
                            <div class="card-body py-4 px-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3 name">
                                                <span class="text-muted">Nama Instansi</span>
                                                <h5 class="font-bold"><?= $user['nm_instansi']; ?>
                                                    <button type="button" class="btn btn-sm btn-light-secondary btn-icon action-icon" data-bs-toggle="modal" data-bs-target="#editnminstansi"> Edit
                                                    </button>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card mx-2 my-2">
                            <div class="card-body py-4 px-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3 name">
                                                <span class="text-muted">Email</span>
                                                <h5 class="font-bold"><?= $user['email']; ?>
                                                    <button type="button" class="btn btn-sm btn-light-secondary btn-icon action-icon" data-bs-toggle="modal" data-bs-target="#editemail"> Edit
                                                    </button>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card mx-2 my-2">
                            <div class="card-body py-4 px-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3 name">
                                                <span class="text-muted">Nomer Handphone</span>
                                                <h5 class="font-bold"><?= $user['no_hp']; ?>
                                                    <button type="button" class="btn btn-sm btn-light-secondary btn-icon action-icon" data-bs-toggle="modal" data-bs-target="#editnohp"> Edit
                                                    </button>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card mx-2 my-2">
                            <div class="card-body py-4 px-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3 name">
                                                <span class="text-muted">Provinsi</span>
                                                <h5 class="font-bold"><?= $user['provinsi']; ?>
                                                    <button type="button" class="btn btn-sm btn-light-secondary btn-icon action-icon" data-bs-toggle="modal" data-bs-target="#editprovinsi"> Edit
                                                    </button>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card mx-2 my-2">
                            <div class="card-body py-4 px-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3 name">
                                                <span class="text-muted">Kota</span>
                                                <h5 class="font-bold"><?= $user['kota']; ?>
                                                    <button type="button" class="btn btn-sm btn-light-secondary btn-icon action-icon" data-bs-toggle="modal" data-bs-target="#editkota"> Edit
                                                    </button>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card mx-2 my-2">
                            <div class="card-body py-4 px-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3 name">
                                                <h5 class="font-bold">Password
                                                    <button type="button" class="btn btn-sm btn-light-secondary btn-icon action-icon" data-bs-toggle="modal" data-bs-target="#editpassword"> Edit
                                                    </button>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</section>

<!--Edit foto Modal Content -->
<div class="modal fade text-left modal-borderless" id="editfoto">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Foto</h5>
            </div>
            <input type="hidden" wire:model="categoryId">
            <div class="modal-body">
                <div class="form-group">
                    <label for="basicInput">Masukkan Foto Baru</label>
                    <input type="file" value="<?= base_url() . '/img/' . $user['foto']; ?>" name="foto" class="form-control {{$errors->first('cover') ? "is-invalid" : ""}}" accept="image/*" id="formFile" id="basicInput" placeholder="pilih file">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                    <span class="d-sm-block">Batal</span>
                </button>
                <button type="submit" name="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                    <span class="d-sm-block">Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--Edit foto Modal Content End-->

<!--Edit NIK Modal Content -->
<div class="modal fade text-left modal-borderless" id="editnik">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Nomer Induk Keluarga</h5>
            </div>
            <input type="hidden" wire:model="categoryId">
            <div class="modal-body">
                <div class="form-group">
                    <label for="basicInput">Masukkan Nomer Induk Keluarga</label>
                    <input type="text" value="<?= $user['nik']; ?>" name="nik" class="form-control" id="basicInput" placeholder="ketik disini">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                    <span class="d-sm-block">Batal</span>
                </button>
                <button type="submit" name="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                    <span class="d-sm-block">Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--Edit NIK Modal Content End-->

<!--Edit Nama Instansi Modal Content -->
<div class="modal fade text-left modal-borderless" id="editnminstansi">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Nama Instansi</h5>
            </div>
            <input type="hidden" wire:model="categoryId">
            <div class="modal-body">
                <div class="form-group">
                    <label for="basicInput">Masukkan Nama Instansi</label>
                    <input type="text" value="<?= $user['nm_instansi']; ?>" name="nm_instansi" class="form-control" id="basicInput" placeholder="ketik disini">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                    <span class="d-sm-block">Batal</span>
                </button>
                <button type="submit" name="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                    <span class="d-sm-block">Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--Edit Nama Instansi Modal Content End-->

<!--Edit email Modal Content -->
<div class="modal fade text-left modal-borderless" id="editemail">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Email</h5>
            </div>
            <input type="hidden" wire:model="categoryId">
            <div class="modal-body">
                <div class="form-group">
                    <label for="basicInput">Masukkan Email</label>
                    <input type="text" value="<?= $user['email']; ?>" name="email" class="form-control" id="basicInput" placeholder="ketik disini">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                    <span class="d-sm-block">Batal</span>
                </button>
                <button type="submit" name="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                    <span class="d-sm-block">Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--Edit email Content End-->

<!--Edit Nama Instansi Modal Content -->
<div class="modal fade text-left modal-borderless" id="editnohp">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Nomer Handphone</h5>
            </div>
            <input type="hidden" wire:model="categoryId">
            <div class="modal-body">
                <div class="form-group">
                    <label for="basicInput">Masukkan Nomer Handphone</label>
                    <input type="text" value="<?= $user['no_hp']; ?>" name="no_hp" class="form-control" id="basicInput" placeholder="ketik disini">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                    <span class="d-sm-block">Batal</span>
                </button>
                <button type="submit" name="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                    <span class="d-sm-block">Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--Edit Nama Instansi Modal Content End-->

<!--Edit provinsi Modal Content -->
<div class="modal fade text-left modal-borderless" id="editprovinsi">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Provinsi</h5>
            </div>
            <input type="hidden" wire:model="categoryId">
            <div class="modal-body">
                <div class="form-group">
                    <label for="basicInput">Masukkan Provinsi</label>
                    <input type="text" value="<?= $user['provinsi']; ?>" name="provinsi" class="form-control" id="basicInput" placeholder="ketik disini">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                    <span class="d-sm-block">Batal</span>
                </button>
                <button type="submit" name="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                    <span class="d-sm-block">Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--Edit provinsi Modal Content End-->

<!--Edit Kota Modal Content -->
<div class="modal fade text-left modal-borderless" id="editkota">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kota</h5>
            </div>
            <input type="hidden" wire:model="categoryId">
            <div class="modal-body">
                <div class="form-group">
                    <label for="basicInput">Masukkan Kota</label>
                    <input type="text" value="<?= $user['kota']; ?>" name="kota" class="form-control" id="basicInput" placeholder="ketik disini">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                    <span class="d-sm-block">Batal</span>
                </button>
                <button type="submit" name="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                    <span class="d-sm-block">Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--Edit Kota Modal Content End-->

<!--Edit Password Modal Content -->
<div class="modal fade text-left modal-borderless" id="editpassword">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Password</h5>
            </div>
            <input type="hidden" wire:model="userId">
            <div class="modal-body">

                <div class="form-group has-icon-left">
                    <label for="password">Password</label>
                    <div class="position-relative">
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" id="password">
                        <div class="form-control-icon">
                            <i class="bi bi-lock"></i>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                    <span class="d-sm-block">Batal</span>
                </button>
                <button type="submit" name="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                    <span class="d-sm-block">Simpan</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!--Edit Password Modal Content End-->
</form>


<?= $this->endSection() ?>