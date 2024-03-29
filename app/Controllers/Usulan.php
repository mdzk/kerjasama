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
                'tb_uks' => $tb_uk->where('status', 'verif')->findAll(),

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

        if ($data['status'] == 'revisiadmin') {
            $status = 'verif';
        }

        if ($data['status'] == 'revisi') {
            $status = 'proses';
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
            'status' => $status,
            'keterangan' => NULL,
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

        $data = $tb_uk->find($this->request->getVar('id_uk'));
        $email = \Config\Services::email();
        $userModel = new Model_Auth();
        $dataUser = $userModel->where('id_users', $data['id_users'])->first();
        $message = view('email-status', $data);

        $email->clear();
        $email->setTo($dataUser['email']);
        $email->setSubject('Kerjasama ' . $data['perihal_ks'] . ' telah diverifikasi oleh Admin!');
        $email->setMessage($message);
        $email->send();

        return redirect()->to('usulan');
    }

    public function usulanRevisi()
    {
        $tb_uk = new Model_Usulan();
        $data = [
            'status' => 'revisiadmin',
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        $tb_uk->set($data)
            ->where('id_uk', $this->request->getVar('id_uk'))
            ->update();

        $data = $tb_uk->find($this->request->getVar('id_uk'));
        $email = \Config\Services::email();
        $userModel = new Model_Auth();
        $dataUser = $userModel->where('id_users', $data['id_users'])->first();
        $message = view('email-revisi', $data);

        $email->clear();
        $email->setTo($dataUser['email']);
        $email->setSubject('Kerjasama ' . $data['perihal_ks'] . ' Harap di Revisi!');
        $email->setMessage($message);
        $email->send();

        session()->setFlashdata('pesan', 'Usulan Kerja Sama Telah Diajukan Revisi');
        return redirect()->back();
    }
}
