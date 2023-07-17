<html>

<head>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 16pt;
        }

        table,
        tr,
        th,
        td {
            border: 1px solid #000;
            border-collapse: collapse;
        }

        .h1>th {
            padding: 15px !important;
        }

        .h2>th {
            padding: 10px !important;
        }

        .h3>th {
            padding: 5px !important;
        }

        th {
            font-size: 14px;
            background-color: #D9D9D9;
        }

        td {
            font-size: 12px;
            padding: 5px;
        }

        .number {
            text-align: center;
            width: 20px;
        }

        .data>td:nth-child(2) {
            width: 200px;
        }
    </style>
</head>

<body lang=EN-US>
    <h1 align="center">Daftar Laporan Kerjasama <?= angkaKeBulan($bulan); ?> <?= $tahun; ?></h1>
    <table width="100%" align="center">
        <thead>
            <tr class="h2">
                <th>No</th>
                <th scope="col">Perihal Kerja Sama</th>
                <th scope="col">Awal Kerjasama</th>
                <th scope="col">Akhir Kerjasama</th>
                <th scope="col">Bentuk Kegiatan</th>
                <th scope="col">Unit Pelaksanaan Kerjasama</th>
                <th scope="col">Deskripsi Kerjasama</th>
                <th scope="col">Jenis Dokumen</th>
                <th scope="col">Rencana Implementasi Kegiatan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($kerjasama as $data) : ?>
                <tr class="data">
                    <td class="number"><?= $i++; ?></td>
                    <td><?= $data['perihal_ks']; ?></td>
                    <td><?= $data['awal_ks']; ?></td>
                    <td><?= $data['akhir_ks']; ?></td>
                    <td><?= $data['bentuk_kegiatan']; ?></td>
                    <td><?= $data['unit_p_ks']; ?></td>
                    <td><?= $data['deskripsi_ks']; ?></td>
                    <td><?= $data['jenis_dokumen']; ?></td>
                    <td><?= $data['rancangan_ik']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>