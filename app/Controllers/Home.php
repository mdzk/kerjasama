<?php

namespace App\Controllers;

use App\Models\Model_Auth;
use App\Models\Model_Usulan;



class Home extends BaseController
{
    public function index()
    {
        $user       = new Model_Auth();
        $tb_uk       = new Model_Usulan();
        // var_dump(session()->get('id_users' ));

        $data = [
            'user'  => $user->find(session()->get('id_users')),
            'tb_uks' => $tb_uk->where('id_users', session()->get('id_users'))->countAllResults(),
            'tb_ttd' => $tb_uk->where('status', 'ttd')->where('id_users', session()->get('id_users'))->countAllResults(),
            'tb_proses' => $tb_uk->where('status', 'proses')->where('id_users', session()->get('id_users'))->countAllResults(),
            'tb_tolak' => $tb_uk->where('status', 'tolak')->where('id_users', session()->get('id_users'))->countAllResults(),
            ///semua
            'tb_uksall' => $tb_uk->countAllResults(),
            'tb_ttdall' => $tb_uk->where('status', 'ttd')->countAllResults(),
            'tb_prosesall' => $tb_uk->where('status', 'proses')->countAllResults(),
            'tb_tolakall' => $tb_uk->where('status', 'tolak')->countAllResults(),

        ];
        return view('home', $data);
    }

    public function kerjasama()
    {
        function bulan($a)
        {
            $usulan = new Model_Usulan();
            $bulan = $usulan->where('MONTH(akhir_ks)', $a)
                ->where('YEAR(akhir_ks)', date('Y'))
                ->where('status', 'ttd')
                ->countAllResults();
            return $bulan;
        };
        $month = array(bulan(1), bulan(2), bulan(3), bulan(4), bulan(5), bulan(6), bulan(7), bulan(8), bulan(9), bulan(10), bulan(11), bulan(12));
        return print_r(json_encode(array_values($month)));
    }
}
