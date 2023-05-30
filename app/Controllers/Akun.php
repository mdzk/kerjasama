<?php

namespace App\Controllers;

use App\Models\Model_Auth;

class Akun extends BaseController
{
    public function index()
    {
        $user       = new Model_Auth();
        $data = [
            'user'  => $user->find(session()->get('id_users')),
            'users' => $user->where('status', 0)->findAll(),
        ];
        return view('user/akun', $data);
    }

    public function add()
    {
        $session  = session();
        $user = new Model_Auth();
        $dataBerkas = $this->request->getFile('foto');
        $fileName = $dataBerkas->getRandomName();

        if ($this->validate([
            'nik' => [
                'label' => 'Nik',
                'rules' => 'required|is_unique[users.nik]',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!! ',
                    'is_unique' => 'NIK sudah digunakan. Mohon masukkan NIK yang berbeda.',

                ]
            ],
            'nm_instansi' => [
                'label' => 'Nama Instansi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!! '
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!! '
                ]
            ],
            'no_hp' => [
                'label' => 'No Handphone',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!! '
                ]
            ],
            'provinsi' => [
                'label' => 'Provinsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!! '
                ]
            ],
            'kota' => [
                'label' => 'Kota',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!! '
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!! '
                ]
            ],
            'repassword' => [
                'label' => 'Retype Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!! ',
                    'matches' => '{field} Tidak Sama !!!'

                ]
            ],
            'foto' => [
                'label' => 'foto',
                'rules' => 'uploaded[foto]', 'max_size[foto,100]', 'mime_in[foto,image/png,image/jpg,image/gif]', 'ext_in[foto,png,jpg,gif]', 'max_dims[foto,200,200]',
                'errors' => [
                    'uploaded' => '{field} Wajib diisi!',
                    'mime_in' => 'Format {field} wajib jpg/png',
                ]
            ],

        ])) {
            $user->save([
                'nik' => $this->request->getVar('nik'),
                'foto' => $fileName,
                'nm_instansi' => $this->request->getVar('nm_instansi'),
                'email' => $this->request->getVar('email'),
                'no_hp' => $this->request->getVar('no_hp'),
                'provinsi' => $this->request->getVar('provinsi'),
                'kota' => $this->request->getVar('kota'),
                'roles' => $this->request->getVar('roles'),
                'status' => 2,
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ]);

            $dataBerkas->move('img/', $fileName);

            session()->setFlashdata('pesan', 'Akun berhasil ditambahkan');
            return redirect()->to('akun/verif');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('akun'));
        }
    }

    public function delete()
    {
        $user = new Model_Auth();
        $user->delete($this->request->getVar('id_users'));
        session()->setFlashdata('pesan', 'Akun berhasil dihapus');
        return redirect()->to('akun');
    }

    public function verif()
    {
        $user = new Model_Auth();
        $data = [
            'user'  => $user->find(session()->get('id_users')),
            'users' => $user->where('status', 2)->find(),
        ];
        echo view('user/verif-akun', $data);
    }

    public function akunVerif()
    {
        $user = new Model_Auth();

        $data = [
            'user'  => $user->find(session()->get('id_users')),
            'status' => 0,
        ];

        $user->update($this->request->getPost('id_users'), $data);
        return redirect()->to('akun');
    }


    public function update()
    {
        $user = new Model_Auth();
        $data = $user->find($this->request->getVar('id_users'));

        $thumbnail = $this->request->getFile('foto');
        if ($thumbnail == '') {
            $thumbnailName = $data['foto'];
        } else {
            $thumbnailName = $thumbnail->getRandomName();
            $thumbnail->move('img', $thumbnailName);
        }

        $user->replace([
            'id_users' => $this->request->getVar('id_users'),
            'foto' => $thumbnailName,
            'nik' => $this->request->getVar('nik') ? $this->request->getVar('nik') : $data['nik'],
            'nm_instansi' => $this->request->getVar('nm_instansi') ? $this->request->getVar('nm_instansi') : $data['nm_instansi'],
            'email' => $this->request->getVar('email') ? $this->request->getVar('email') : $data['email'],
            'no_hp' => $this->request->getVar('no_hp') ? $this->request->getVar('no_hp') : $data['no_hp'],
            'provinsi' => $this->request->getVar('provinsi') ? $this->request->getVar('provinsi') : $data['provinsi'],
            'kota' => $this->request->getVar('kota') ? $this->request->getVar('kota') : $data['kota'],
            'roles' => $this->request->getVar('roles') ? $this->request->getVar('roles') : $data['roles'],
            'password' => empty($this->request->getVar('password')) ? $data['password'] : password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diedit');
        return redirect()->to('akun');
    }
}
