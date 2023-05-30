<?php

namespace App\Controllers;

use App\Models\Model_Auth;

class Profile extends BaseController
{
    public function index()
    {
        $user       = new Model_Auth();
        $data = [
            'user'  => $user->find(session()->get('id_users')),
            'users'  => $user->findAll(),
        ];
        return view('profile', $data);
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
            unlink('img/'. $data['foto']);
        }

        $user->replace([
            'id_users' => $this->request->getVar('id_users'),
            'nik' => $this->request->getVar('nik') ? $this->request->getVar('nik') : $data['nik'],
            'foto' => $thumbnailName,
            'nm_instansi' => $this->request->getVar('nm_instansi') ? $this->request->getVar('nm_instansi') : $data['nm_instansi'],
            'email' => $this->request->getVar('email') ? $this->request->getVar('email') : $data['email'],
            'no_hp' => $this->request->getVar('no_hp') ? $this->request->getVar('no_hp') : $data['no_hp'],
            'provinsi' => $this->request->getVar('provinsi') ? $this->request->getVar('provinsi') : $data['provinsi'],
            'kota' => $this->request->getVar('kota') ? $this->request->getVar('kota') : $data['kota'],
            'roles' => $this->request->getVar('roles') ? $this->request->getVar('roles') : $data['roles'],
            'password' => empty($this->request->getVar('password')) ? $data['password'] : password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diedit');
        return redirect()->to('profile');
    }

}
