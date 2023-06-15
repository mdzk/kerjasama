<li class="menu-header">Dashboard</li>
<li class="<?= get_url(1, '') ? 'active' : ''; ?>">
    <a class="nav-link" href="<?= site_url('/') ?>">
        <i class="fas fa-fire"></i>
        <span>Dashboard</span>
    </a>
</li>
<?php if (session('roles') == 'user') : ?>

    <li class="menu-header">Kerjasama</li>

    <li class="<?= get_url(1, 'ajukan') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('ajukan') ?>">
            <i class="far fa-file"></i>
            <span>Ajukan Kerjasama</span>
        </a>
    </li>

    <li class="<?= get_url(1, 'usulan') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('usulan') ?>">
            <i class="far fa-file-alt"></i>
            <span>Usulan Kerjasama</span>
        </a>
    </li>

    <li class="<?= get_url(1, 'aktif-kerjasama') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('aktif-kerjasama') ?>">
            <i class="far fa-bookmark"></i>
            <span>Kerjasama Aktif</span>
        </a>
    </li>

    <li class=" <?= get_url(1, 'kerjasama-berakhir') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('kerjasama-berakhir') ?>">
            <i class="far fa-folder"></i>
            <span>Kerjasama Tidak Aktif</span>
        </a>
    </li>
<?php endif; ?>

<?php if (session('roles') == 'admin') : ?>

    <li class=" menu-header">Kerjasama
    </li>

    <li class="<?= get_url(1, 'usulan') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('usulan') ?>">
            <i class="far fa-file-alt"></i>
            <span>Usulan Kerjasama</span>
        </a>
    </li>
<?php endif; ?>

<?php if (session('roles') == 'pimpinan') : ?>
    <li class="menu-header">Kerjasama</li>

    <li class="<?= get_url(1, 'kerjasama') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('kerjasama') ?>">
            <i class="far fa-envelope"></i>
            <span>Daftar Kerjasama</span>
        </a>
    </li>
    <li class="<?= get_url(1, 'akhir-kerjasama') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('akhir-kerjasama') ?>">
            <i class="far fa-clock"></i>
            <span>Kerjasama Berakhir</span>
        </a>
    </li>
<?php endif; ?>

<?php if (session('roles') == 'admin') : ?>
    <li class="menu-header">Dokumen</li>
    <li class="<?= get_url(1, 'dokumen') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('dokumen') ?>">
            <i class="far fa-folder"></i>
            <span>Dokumen</span>
        </a>
    </li>
    <li class="menu-header">Pelaksanaan Kegiatan</li>
    <li class="<?= get_url(1, 'laporan') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('laporan') ?>">
            <i class="far fa-file"></i>
            <span>Laporan</span>
        </a>
    </li>
    <li class="menu-header">Akses</li>
    <li class="<?= get_url(1, 'akun') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= site_url('akun') ?>">
            <i class="far fa-user"></i>
            <span>Akun Pengguna</span>
        </a>
    </li>
<?php endif; ?>