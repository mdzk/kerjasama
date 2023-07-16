<?php

namespace App\Controllers;

use App\Models\Model_Auth;
use App\Models\Model_Usulan;



class Ajukan extends BaseController
{
    public function index()
    {
        $user       = new Model_Auth();
        $data = [
            'user'  => $user->find(session()->get('id_users'))
        ];
        return view('user/ajukan_kerjasama', $data);
    }


    public function add()
    {
        $usulan = new Model_Usulan();
        $dataBerkas = $this->request->getFile('file_input_pk');
        $dataBerkas1 = $this->request->getFile('file_input_dk');
        $fileName = $dataBerkas->getRandomName();
        $fileName1 = $dataBerkas1->getRandomName();

        if ($this->validate([
            'perihal_ks' => [
                'label' => 'Perihal Kerjasama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!! '
                ]
            ],
            'awal_ks' => [
                'label' => 'Awal Kerjasama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!! '
                ]
            ],
            'akhir_ks' => [
                'label' => 'Akhir Kerjasama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!! '
                ]
            ],
            'bentuk_kegiatan' => [
                'label' => 'Bentuk Kegiatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!! '
                ]
            ],
            'unit_p_ks' => [
                'label' => 'Unit Pelaksanaan Kerjasama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!! '
                ]
            ],
            'deskripsi_ks' => [
                'label' => 'Deskripsi Kerjasama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!! '
                ]
            ],
            'jenis_dokumen' => [
                'label' => 'Jenis Dokumen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!! '
                ]
            ],
            'rancangan_ik' => [
                'label' => 'Rancangan Implementasi Kegiatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!! '
                ]
            ],
            'file_input_pk' => [
                'label' => 'File Penawaran kerjasama',
                'rules' => 'uploaded[file_input_pk]|mime_in[file_input_pk,application/pdf]',
                'errors' => [
                    'uploaded' => '{field} Wajib diisi!',
                    'mime_in' => 'Format {field} wajib pdf',
                ]
            ],
            'file_input_dk' => [
                'label' => 'File Draf Kerjasama',
                'rules' => 'uploaded[file_input_dk]|mime_in[file_input_dk,application/pdf]',
                'errors' => [
                    'uploaded' => '{field} Wajib diisi!',
                    'mime_in' => 'Format {field} wajib pdf',
                ]
            ],

        ])) {


            $cekKerjasamaVerif  = $usulan->where('perihal_ks', $this->request->getVar('perihal_ks'))
                ->where('id_users', session('id_users'))
                ->where('status', 'verif')
                ->first();
            $cekKerjasamaProses  = $usulan->where('perihal_ks', $this->request->getVar('perihal_ks'))
                ->where('id_users', session('id_users'))
                ->where('status', 'proses')
                ->first();
            $cekKerjasamaRevisi  = $usulan->where('perihal_ks', $this->request->getVar('perihal_ks'))
                ->where('id_users', session('id_users'))
                ->where('status', 'revisi')
                ->first();
            $cekKerjasamaRevisiAdmin  = $usulan->where('perihal_ks', $this->request->getVar('perihal_ks'))
                ->where('id_users', session('id_users'))
                ->where('status', 'revisiadmin')
                ->first();

            if ($cekKerjasamaVerif !== NULL || $cekKerjasamaProses !== NULL || $cekKerjasamaRevisi !== NULL || $cekKerjasamaRevisiAdmin) {
                Session()->setFlashdata('errors', ['perihal_ks' => 'Selesaikan Prihal Kerja Sama yang sudah diajukan']);
                return redirect()->back()->withInput();
            }

            $cekKerjasama  = $usulan->where('perihal_ks', $this->request->getVar('perihal_ks'))
                ->where('id_users', session('id_users'))->first();

            if (
                $cekKerjasama !== NULL
            ) {
                Session()->setFlashdata('errors', ['perihal_ks' => 'Prihal Kerja Sama sudah terdaftar, ganti Prihal Kerja Sama yang lain!']);
                return redirect()->back()->withInput();
            }

            $data = [
                'perihal_ks' => $this->request->getVar('perihal_ks'),
                'awal_ks' => $this->request->getVar('awal_ks'),
                'akhir_ks' => $this->request->getVar('akhir_ks'),
                'bentuk_kegiatan' => $this->request->getVar('bentuk_kegiatan'),
                'unit_p_ks' => $this->request->getVar('unit_p_ks'),
                'deskripsi_ks' => $this->request->getVar('deskripsi_ks'),
                'jenis_dokumen' => $this->request->getVar('jenis_dokumen'),
                'rancangan_ik' => $this->request->getVar('rancangan_ik'),
                'file_input_pk' => $fileName,
                'file_input_dk' => $fileName1,
                'status' => 'verif',
                'id_users' => session()->get('id_users')
            ];
            $usulan->save($data);

            $dataBerkas->move('pdf/', $fileName);
            $dataBerkas1->move('pdf/', $fileName1);

            $userModel = new Model_Auth();
            $dataUser = $userModel->find(session()->get('id_users'));

            $email = \Config\Services::email();
            $userModel = new Model_Auth();
            $adminEmails = $userModel->where('roles', 'admin')->findAll();
            $message = view('email-ajukan', $data);

            foreach ($adminEmails as $adminEmail) {
                $email->clear();
                $email->setTo($adminEmail['email']);
                $email->setSubject($dataUser['nm_instansi'] . ' Mengajukan Kerjasama Baru!');
                $email->setMessage($message);
                $email->send();
            }

            session()->setFlashdata('pesan', 'Data telah diajukan');
            return redirect()->to('usulan');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('ajukan'));
        }
    }
}
