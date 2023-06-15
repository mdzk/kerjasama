<html>

<head>
    <title>Kerjasama Baru</title>
    <style>
        /* Card */
        .card {
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
            padding: 1rem;
        }

        /* Card Header */
        .card-header {
            padding: 0.5rem 1rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        }

        /* Card Body */
        .card-body {
            flex: 1 1 auto;
            padding: 1rem;
        }

        /* Card Footer */
        .card-footer {
            padding: 0.5rem 1rem;
            background-color: rgba(0, 0, 0, 0.03);
            border-top: 1px solid rgba(0, 0, 0, 0.125);
        }

        /* Container */
        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        /* Contoh penggunaan */
        .card {
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-body {
            line-height: 1.5;
        }

        .card-footer {
            text-align: right;
        }

        .container {
            max-width: 960px;
        }
    </style>
</head>

<body>
    <section>
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h4>Detail Ajukan Kerjasama Baru</h4>
                </div>
                <div class="card-body">
                    <h3>Prihal Kerjasama</h3>
                    <p><?= $perihal_ks; ?></p>
                    <h3 class="mt-4">Awal Kerjasama</h3>
                    <p><?= $awal_ks; ?></p>
                    <h3 class="mt-4">Akhir Kerjasama</h3>
                    <p><?= $akhir_ks; ?></p>
                    <h3 class="mt-4">Bentuk Kegiatan</h3>
                    <p><?= $bentuk_kegiatan; ?></p>
                    <h3 class="mt-4">Unit Pelaksana Kerjasama</h3>
                    <p><?= $unit_p_ks; ?></p>
                    <h3 class="mt-4">Deskripsi Kerjasama</h3>
                    <p><?= $deskripsi_ks; ?></p>
                    <h3 class="mt-4">Jenis Dokumen</h3>
                    <p><?= $jenis_dokumen; ?></p>
                    <h3 class="mt-4">Rencana Implementasi Kegiatan</h3>
                    <p><?= $rancangan_ik; ?></p>
                </div>
            </div>
            <h5 align="center">
                Copyright &copy; Ajuin Kerjasama 2023
            </h5>
        </div>
    </section>
</body>

</html>