<?php

namespace App\Controllers;

use App\Models\Model_Auth;
use App\Models\Model_Usulan;



class Usulan extends BaseController
{
    public function index()
    {
        $user       = new Model_Auth();
        $tb_uk = new Model_Usulan();

        if (session()->get('roles') == 'admin') {
            $data = [
                'user'  => $user->find(session()->get('id_users')),
                'tb_uks' => $tb_uk->where('status','verif')->findAll(),
                
            ];
            return view('user/usulan_kerjasama', $data);
        } else {
            $data = [
                'user'  => $user->find(session()->get('id_users')),
                'tb_uks' => $tb_uk->where('id_users', session()->get('id_users'))->find(),
                'status' => $tb_uk->where('status', 'proses')->find(),

            ];
            return view('user/usulan_kerjasama', $data);
        }

    }

    public function update()
    {
        $tb_uk  = new Model_Usulan();

        $data = $tb_uk->find($this->request->getVar('id_uk'));

        $thumbnail = $this->request->getFile('filePDF');
        if ($thumbnail == '') {
            $fileName = $data['file_input_pk'];
        } else {
            $fileName = $thumbnail->getRandomName();
            $thumbnail->move('pdf', $fileName);
            unlink('pdf/' . $data['file_input_pk']);
        }

        $thumbnail = $this->request->getFile('filePDF2');
        if ($thumbnail == '') {
            $fileName1 = $data['file_input_dk'];
        } else {
            $fileName1 = $thumbnail->getRandomName();
            $thumbnail->move('pdf', $fileName1);
            unlink('pdf/' . $data['file_input_dk']);
        }
        $tb_uk->replace([
            'id_uk' => $this->request->getPost('id_uk'),
            'perihal_ks' => $this->request->getPost('perihal_ks'),
            'awal_ks' => $this->request->getVar('awal_ks'),
            'akhir_ks' => $this->request->getVar('akhir_ks'),
            'bentuk_kegiatan' => $this->request->getVar('bentuk_kegiatan'),
            'unit_p_ks' => $this->request->getVar('unit_p_ks'),
            'deskripsi_ks' => $this->request->getVar('deskripsi_ks'),
            'jenis_dokumen' => $this->request->getVar('jenis_dokumen'),
            'rancangan_ik' => $this->request->getVar('rancangan_ik'),
            'file_input_pk' => $fileName,
            'file_input_dk' => $fileName1,
            'status' => 'proses',
            'id_users' => session()->get('id_users'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diedit');
        return redirect()->to('usulan');
    }

    public function lihat()
    {
        $tb_uk  = new Model_Usulan();
        $tb_uk->replace([
            'id_uk' => $this->request->getPost('id_uk'),
            'perihal_ks' => $this->request->getPost('perihal_ks'),
            'awal_ks' => $this->request->getVar('awal_ks'),
            'akhir_ks' => $this->request->getVar('akhir_ks'),
            'bentuk_kegiatan' => $this->request->getVar('bentuk_kegiatan'),
            'unit_p_ks' => $this->request->getVar('unit_p_ks'),
            'deskripsi_ks' => $this->request->getVar('deskripsi_ks'),
            'jenis_dokumen' => $this->request->getVar('jenis_dokumen'),
            'rancangan_ik' => $this->request->getVar('rancangan_ik'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diedit');
        return redirect()->to('usulan');
    }



    public function usulanVerif()
    {
        $tb_uk = new Model_Usulan();

        $data = [
            'tb_uk'  => $tb_uk->find(session()->get('id_uk')),
            'status' => 'proses',
        ];

        $tb_uk->update($this->request->getPost('id_uk'), $data);
        return redirect()->to('usulan');
    }
}
