<?php

namespace App\Controllers;

use App\Models\Admin\PtModel;
use App\Models\Admin\SertifikatModel;
use App\Models\Admin\ProdiModel;
use Ramsey\Uuid\Uuid;
use App\Models\Admin\PesertaModel;
use App\Models\Admin\CabangLombaModel;

class PendampingSertifikat extends BaseController
{
    protected $ptModel;
    protected $prodiModel;
    protected $pesertaModel;
    protected $sertifikatModel;
    protected $cabanglombaModel;
    public function __construct()
    {
        $this->ptModel = new PtModel();
        $this->sertifikatModel = new SertifikatModel();
        $this->prodiModel = new ProdiModel();
        $this->pesertaModel = new PesertaModel();
        $this->cabanglombaModel = new CabangLombaModel();
    }
    public function Sertifikat()
    {
        $data = [
            'sertifikat' => $this->sertifikatModel->sertifikat()
        ];
        // dd($data);
        echo view('konten/pendamping/sertifikat/index', $data);
    }

    
}
