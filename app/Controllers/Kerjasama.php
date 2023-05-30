<?php

namespace App\Controllers;

use App\Models\Model_Auth;
use App\Models\Model_Usulan;


class Kerjasama extends BaseController
{
    public function index()
    {
        $user       = new Model_Auth();
        $tb_uk = new Model_Usulan();
        
        $data = [
            'user'  => $user->find(session()->get('id_users')),
            'tb_uks' => $tb_uk->where('status !=', 'verif')->findAll(),
        ];
        return view('user/kerjasama', $data);
    }

    public function update()
    {
        $tb_uk  = new Model_Usulan();
        $tb_uk->replace([
            'id_uk' => $this->request->getPost('id_uk'),
            'perihal_ks' => $this->request->getPost('perihal_ks'),
            'awal_ks' =>$this->request->getVar('awal_ks'),
            'akhir_ks' => $this->request->getVar('akhir_ks'),
            'bentuk_kegiatan' => $this->request->getVar('bentuk_kegiatan'),
            'unit_p_ks' => $this->request->getVar('unit_p_ks'),
            'deskripsi_ks' => $this->request->getVar('deskripsi_ks'),
            'jenis_dokumen' => $this->request->getVar('jenis_dokumen'),
            'rancangan_ik' =>$this->request->getVar('rancangan_ik'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diedit');
        return redirect()->to('user/kerjasama');
    }

    public function kerjasamaVerifAcc()
    {
        $tb_uk = new Model_Usulan();

        $data = [
            'tb_uk'  => $tb_uk->find(session()->get('id_uk')),
            'status' => 'ttd',
        ];

        $tb_uk->update($this->request->getPost('id_uk'), $data);
        return redirect()->to('kerjasama');
    }

    public function kerjasamaVerifTolak()
    {
        $tb_uk = new Model_Usulan();

        $data = [
            'tb_uk'  => $tb_uk->find(session()->get('id_uk')),
            'status' => 'tolak',
        ];

        $tb_uk->update($this->request->getPost('id_uk'), $data);
        return redirect()->to('kerjasama');
    }

    public function kerjasamaVerifRevisi()
    {
        $tb_uk = new Model_Usulan();

        $data = [
            'tb_uk'  => $tb_uk->find(session()->get('id_uk')),
            'status' => 'revisi',
        ];

        $tb_uk->update($this->request->getPost('id_uk'), $data);
        return redirect()->to('kerjasama');
    }
    
}
