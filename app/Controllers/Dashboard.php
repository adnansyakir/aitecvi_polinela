<?php

namespace App\Controllers;

use App\Models\Admin\PendampingModel;
use App\Models\Admin\PesertaModel;
use App\Models\Admin\CabangLombaModel;

class Dashboard extends BaseController
{
    public function index(): string
    {
        $pendampingModel = new PendampingModel();
        $pesertaModel = new PesertaModel();
        $cabangLombaModel = new CabangLombaModel();

        $jumlahCabangKompetisi = count($cabangLombaModel->findAll());
        $jumlahPendamping = count($pendampingModel->findAll());
        $jumlahPeserta = count($pesertaModel->findAll());

        $data = [
            'jumlahCabangKompetisi' => $jumlahCabangKompetisi,
            'jumlahPendamping' => $jumlahPendamping,
            'jumlahPeserta' => $jumlahPeserta,
        ];

        return view('konten/admin/dashboard/index', $data);
    }
}
