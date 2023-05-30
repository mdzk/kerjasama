<?php

namespace App\Controllers;

use App\Models\Model_Auth;
use App\Models\Model_Usulan;


class Akhir extends BaseController
{
    public function index()
    {
        $user       = new Model_Auth();
        $tb_uk = new Model_Usulan();
        
        $data = [
            'user'  => $user->find(session()->get('id_users')),
            'tb_uks' => $tb_uk->where('status','ttd')->findAll(),
        ];
        return view('user/akhir-kerjasama', $data);
    }
    
}
