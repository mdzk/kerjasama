<?php

namespace App\Controllers;

use App\Models\Model_Auth;
use App\Models\Model_Usulan;


class Dokumen extends BaseController
{
    public function index()
    {
        $user       = new Model_Auth();
        $tb_uk = new Model_Usulan();
        $data = [
            'user'  => $user->find(session()->get('id_users')),
            'tb_uks' => $tb_uk->findAll(),
        ];
        return view('user/dokumen', $data);
    }

    public function search()
    {
        $searchTerm = $this->request->getVar('search');
        $model      = new Model_Usulan();
        $user       = new Model_Auth();

        $data = [
            'results' => $model->like('perihal_ks', $searchTerm)->findAll(),
            'user'  => $user->find(session()->get('id_users')),
        ];
        return view('user/dokumen-search', $data);
    }
}
