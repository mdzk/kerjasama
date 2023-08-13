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
        $tb_uk = new Model_Usulan();
        $data = $tb_uk->find($this->request->getVar('id_uk'));
        $data = [
            'status' => 'revisi',
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

    public function kerjasamaVerifAcc()
    {
        $tb_uk = new Model_Usulan();

        $data = [
            'tb_uk'  => $tb_uk->find(session()->get('id_uk')),
            'status' => 'ttd',
        ];

        $tb_uk->update($this->request->getPost('id_uk'), $data);

        $data = $tb_uk->find($this->request->getVar('id_uk'));
        $email = \Config\Services::email();
        $userModel = new Model_Auth();
        $dataUser = $userModel->where('id_users', $data['id_users'])->first();
        $message = view('email-status', $data);

        $email->clear();
        $email->setTo($dataUser['email']);
        $email->setSubject('Kerjasama ' . $data['perihal_ks'] . ' telah di Acc oleh Pimpinan!');
        $email->setMessage($message);
        $email->send();

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

        $data = $tb_uk->find($this->request->getVar('id_uk'));
        $email = \Config\Services::email();
        $userModel = new Model_Auth();
        $dataUser = $userModel->where('id_users', $data['id_users'])->first();
        $message = view('email-status', $data);

        $email->clear();
        $email->setTo($dataUser['email']);
        $email->setSubject('Kerjasama ' . $data['perihal_ks'] . ' telah ditolak oleh Pimpinan!');
        $email->setMessage($message);
        $email->send();

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

    public function delete()
    {
        $kerjasama = new Model_Usulan();
        $data = $kerjasama->find($this->request->getVar('id_uk'));
        unlink('pdf/' . $data['file_input_pk']);
        unlink('pdf/' . $data['file_input_dk']);
        $kerjasama->delete($this->request->getVar('id_uk'));
        session()->setFlashdata('pesan', 'Kerjasama berhasil dihapus');
        return redirect()->to('kerjasama');
    }
}
