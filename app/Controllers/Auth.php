<?php

namespace App\Controllers;

use App\Models\Model_Auth;

class Auth extends BaseController
{
    public function index()
    {

        helper(['form']);
        echo view('login');
    }

    public function auth()
    {
        $session  = session();
        $model    = new Model_Auth();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $status = $this->request->getVar('status');
        $data = $model->where('email', $email)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($data['status'] == 0) {
                if ($verify_pass) {
                    $ses_data = [
                        'id_users'   => $data['id_users'],
                        'email'  => $data['email'],
                        'status' => 0,
                        'logged_in' => TRUE,
                        'roles' => $data['roles']
                    ];
                    $session->set($ses_data);
                    return redirect()->to('/');
                } else {
                    $session->setFlashdata('msg', 'Password Salah!');
                    return redirect()->to('/login');
                }
            } else {
                $session->setFlashdata('msg', 'User belum aktif!');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'email Tidak Ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }


    ///Register
    public function register()
    {

        echo view('register');
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
                'rules' => "required|is_unique[users.nik]|min_length[16]|max_length[16]",
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!! ',
                    'is_unique' => 'NIK sudah digunakan. Mohon masukkan NIK yang berbeda.',
                    'min_length' => 'Minimal {field} 16 Angka',
                    'max_length' => 'Maksimal {field} 16 Angka',
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
                'rules' => 'required|is_unique[users.email]',
                'errors' => [
                    'required' => '{field} Wajib Diisi Dan Tidak Boleh Kosong !!! ',
                    'is_unique' => '{field} sudah digunakan. Mohon masukkan {field} yang berbeda.',
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
                'roles' => 'user',
                'status' => 2,
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ]);
            $dataBerkas->move('img/', $fileName);

            session()->setFlashdata('pesan', 'User berhasil ditambahkan');
            return redirect()->to('/waiting');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('register'));
        }
    }

    ///Register
    public function waiting()
    {

        echo view('waiting');
    }
}
