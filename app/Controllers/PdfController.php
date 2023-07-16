<?php

namespace App\Controllers;

use App\Models\JurnalModel;
use App\Models\Model_Usulan;
use App\Models\PegawaiModel;
use App\Models\UsersModel;
use Dompdf\Dompdf;

class PdfController extends BaseController
{
    public function kerjasama()
    {
        $kerjasama = new Model_Usulan();
        $id = $this->request->getVar('tanggal');
        $dataBerhasil = $kerjasama->where('status', 'ttd')->where('akhir_ks <=', date('Y-m-d'))->findAll();
        if (!$dataBerhasil) {
            session()->setFlashdata('not-found', 'Data tidak ditemukan');
            return redirect()->back();
        }
        $dataKerjasama = $kerjasama->where('status', 'ttd')->where('tanggal', $id)->findAll();
        if (!$dataKerjasama) {
            session()->setFlashdata('not-found', 'Data tidak ditemukan');
            return redirect()->back();
        } else {
            $filename = date('y-m-d-H-i-s') . '-kerjasama';
            $dompdf = new Dompdf();
            $data = [
                'tanggal' => $id,
                'kerjasama'  => $dataKerjasama,
            ];

            $dompdf->loadHtml(view('/export/pdf_kerjasama', $data));

            $dompdf->setPaper(array(0, 0, 609.4488, 935.433), 'portrait');
            $dompdf->render();
            $dompdf->stream($filename);
            exit();
        }
    }

    public function jurnal_bulan()
    {
        $jurnal = new JurnalModel();
        $data_jurnal_bulan = $jurnal->where('status', 'terverifikasi')->where('id_users', session('id_users'))->where('MONTH(tanggal)', $this->request->getVar('bulan'))->where('YEAR(tanggal)', $this->request->getVar('tahun'))->findAll();
        if (!$data_jurnal_bulan) {
            session()->setFlashdata('not-found', 'Data tidak ditemukan');
            return redirect()->back();
        } else {
            $filename = date('y-m-d-H-i-s') . '-jurnal';
            $dompdf = new Dompdf();
            $user = new UsersModel();
            $data = [
                'bulan' => $this->request->getVar('bulan'),
                'tahun' => $this->request->getVar('tahun'),
                'user' => $user->join('golongan', 'golongan.id_golongan = users.golongan')->find(session('id_users')),
                'jurnal'  => $data_jurnal_bulan,
            ];

            $dompdf->loadHtml(view('/export/pdf_jurnal_bulan', $data));
            $dompdf->setPaper(array(0, 0, 609.4488, 935.433), 'portrait');
            $dompdf->render();
            $dompdf->stream($filename);
            exit();
        }
    }
}
