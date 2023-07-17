<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Usulan extends Model
{
    protected $table      = 'tb_uks';
    protected $primaryKey = 'id_uk';
    protected $allowedFields = ['keterangan', 'perihal_ks', 'awal_ks', 'akhir_ks', 'bentuk_kegiatan', 'unit_p_ks', 'deskripsi_ks', 'jenis_dokumen', 'rancangan_ik', 'file_input_pk', 'file_input_dk', 'status', 'id_users'];
    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
}
