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
        $dataBerhasil = $kerjasama->where('status', 'ttd')
            ->where('akhir_ks <=', date('Y-m-d'))
            ->where('MONTH(awal_ks)', $this->request->getVar('bulan'))
            ->where('YEAR(awal_ks)', $this->request->getVar('tahun'))
            ->findAll();

        if (!$dataBerhasil) {
            session()->setFlashdata('not-found', 'Data tidak ditemukan');
            return redirect()->back();
        }

        $filename = date('y-m-d-H-i-s') . '-kerjasama';
        $dompdf = new Dompdf();
        $data = [
            'bulan' => $this->request->getVar('bulan'),
            'tahun' => $this->request->getVar('tahun'),
            'kerjasama'  => $dataBerhasil,
        ];

        $dompdf->loadHtml(view('/export/pdf_kerjasama', $data));

        $dompdf->setPaper(array(0, 0, 609.4488, 935.433), 'landscape');
        $dompdf->render();
        $dompdf->stream($filename);
        exit();
    }
}
