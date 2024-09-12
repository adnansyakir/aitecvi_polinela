<?php

namespace App\Controllers;

use App\Models\Pendamping\PendampingModel;
use App\Models\Pendamping\PesertaModel;
use App\Models\Admin\CabangLombaModel;
use App\Models\Admin\PtModel;


class PendampingDashboard extends BaseController
{
    public function index(): string
    {
        $ptId = session()->get('pt_id');
        $pendampingModel = new PendampingModel();
        $pesertaModel = new PesertaModel();
        $cabangLombaModel = new CabangLombaModel();
        $ptModel = new PtModel();

        $jumlahCabangKompetisi = count($cabangLombaModel->findAll());
        $jumlahPendamping = count($pendampingModel->pendampingbyPt($ptId));
        $jumlahPeserta = count($pesertaModel->pesertabyjoinsemua($ptId));
        $pt = count($ptModel->findAll());

        $data = [
            'jumlahCabangKompetisi' => $jumlahCabangKompetisi,
            'jumlahPendamping' => $jumlahPendamping,
            'jumlahPeserta' => $jumlahPeserta,
            'pt' => $pt,
        ];

        return view('konten/pendamping/dashboard/index', $data);
    }
}
