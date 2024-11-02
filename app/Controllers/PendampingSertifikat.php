<?php

namespace App\Controllers;

use App\Models\Admin\PtModel;
use App\Models\Pendamping\SertifikatModel;

use Ramsey\Uuid\Uuid;
use App\Models\Admin\PesertaModel;
use App\Models\Admin\CabangLombaModel;

class PendampingSertifikat extends BaseController
{
    protected $ptModel;

    protected $pesertaModel;
    protected $sertifikatModel;
    protected $cabanglombaModel;
    public function __construct()
    {
        $this->ptModel = new PtModel();
        $this->sertifikatModel = new SertifikatModel();

        $this->pesertaModel = new PesertaModel();
        $this->cabanglombaModel = new CabangLombaModel();
    }
    public function Sertifikat()
    { $pt_id = session()->get('pt_id');
        $data = [
            'sertifikat' => $this->sertifikatModel->sertifikat($pt_id)
        ];
        // dd($data);
        echo view('konten/pendamping/sertifikat/index', $data);
    }
}
