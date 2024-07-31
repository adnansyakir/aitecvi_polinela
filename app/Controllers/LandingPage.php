<?php

namespace App\Controllers;

use App\Models\Admin\PtModel; // Corrected namespace
use App\Models\Admin\CabangLombaModel;
use App\Models\Admin\ProdiModel;
use App\Models\Admin\PesertaModel;
use App\Models\Admin\KelompokModel;
use Ramsey\Uuid\Uuid;

class LandingPage extends BaseController
{
    protected $ptModel;
    protected $cabanglombaModel;
    protected $prodiModel;
    protected $pesertaModel;
    protected $kelompokModel;


    public function __construct()
    {
        // Initialize Model
        $this->ptModel = new PtModel();

        $this->cabanglombaModel = new CabangLombaModel();
        $this->prodiModel = new ProdiModel();
        $this->pesertaModel = new PesertaModel();
        $this->kelompokModel = new KelompokModel();
    }

    // Index view PT
    public function index()
    {
        $data = [
            'pt' => $this->ptModel->getAllPt()
        ];

        echo view('konten/home/index', $data);
    }
}
