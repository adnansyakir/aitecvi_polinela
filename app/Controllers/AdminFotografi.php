<?php

namespace App\Controllers;

use App\Models\Admin\PtModel;
use App\Models\Admin\CabangLombaModel;
use App\Models\Admin\FotografiModel;
use App\Models\Admin\VideoModel;
use App\Models\Admin\PesertaModel;
use Ramsey\Uuid\Uuid;

class AdminFotografi extends BaseController
{
    protected $Fotografi;
    protected $videoModel;
    protected $ptModel;
    protected $cabanglombaModel;
    protected $pesertaModel;
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->ptModel = new PtModel();
        $this->pesertaModel = new PesertaModel();
        $this->cabanglombaModel = new CabangLombaModel();
        $this->Fotografi = new FotografiModel();
        $this->videoModel = new VideoModel();
    }
    public function index()
    {
        $data = [

            'fotografi' => $this->Fotografi->FotobyPt(),
            'peserta' => $this->pesertaModel->getAllpeserta(),

        ];
        echo view('konten/admin/eksibisiFotografi/index', $data);
    }
    public function addfoto()
    {
        $data = [
            'fotografi' => $this->Fotografi->FotobyPt(),
            'peserta' => $this->pesertaModel->getAllpeserta(),
            // 001 sesuai kode lomba
            'cabang_perlombaan' => $this->cabanglombaModel->getLombabyKode(005),
            'pt' => $this->ptModel->getAllPt(),
        ];
        return view('konten/admin/eksibisiFotografi/add', $data);
    }

    public function addfotoPost()
    {
        // Define validation rules
        $validationRules = [
            'pt_id' => 'required|is_not_unique[pt.id]',
            'cabang_perlombaan_id' => 'required|is_not_unique[cabang_perlombaan.id]',
            'peserta_id' => 'required',
        ];

        $validationMessages = [
            'pt_id' => [
                'required' => 'PT harus dipilih.',
                'is_not_unique' => 'PT yang dipilih tidak valid.',
            ],
            'cabang_perlombaan_id' => [
                'required' => 'Cabang perlombaan harus dipilih.',
                'is_not_unique' => 'Cabang perlombaan yang dipilih tidak valid.',
            ],
            'peserta_id' => [
                'required' => 'Peserta harus dipilih.',
            ],
        ];

        // Validate input
        if (!$this->validate($validationRules, $validationMessages)) {
            // Validation failed, redirect back with input and validation errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $Fotografi = new FotografiModel();
        $data = [
            'pt_id' => $this->request->getPost('pt_id'),
            'cabang_perlombaan_id' => $this->request->getPost('cabang_perlombaan_id'),
            // 2 ngatur nilai keterangan (sedang penilaian)
            'keterangan' => 2,
            'peserta_id' => $this->request->getPost('peserta_id') // Convert array to comma-separated string
        ];

        if ($Fotografi->insertData($data)) {
            return redirect()->to('/admin/pendaftaran/eksibisiFotografi')->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data!');
        }
    }


    public function editFoto($id)
    {
        $Fotografi = new FotografiModel();
        $data = [
            'fotografi' => $Fotografi->find($id),
            'peserta' => $this->pesertaModel->getAllpeserta(),
            'cabang_perlombaan' => $this->cabanglombaModel->getAllLomba(),
            'pt' => $this->ptModel->getAllPt(),
        ];

        if (empty($data['fotografi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Proposal not found');
        }

        return view('konten/admin/eksibisiFotografi/edit', $data);
        
    }


    public function edifotoPost($id)
    {
        // Define validation rules
        $validationRules = [
            'pt_id' => 'required|is_not_unique[pt.id]',
            'cabang_perlombaan_id' => 'required|is_not_unique[cabang_perlombaan.id]',
            'peserta_id' => 'required',
        ];

        $validationMessages = [
            'pt_id' => [
                'required' => 'PT harus dipilih.',
                'is_not_unique' => 'PT yang dipilih tidak valid.',
            ],
            'cabang_perlombaan_id' => [
                'required' => 'Cabang perlombaan harus dipilih.',
                'is_not_unique' => 'Cabang perlombaan yang dipilih tidak valid.',
            ],
            'peserta_id' => [
                'required' => 'Peserta harus dipilih.',
            ],
        ];

        // Validate input
        if (!$this->validate($validationRules, $validationMessages)) {
            // Validation failed, redirect back with input and validation errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $Fotografi = new FotografiModel();
        $data = [
            'pt_id' => $this->request->getPost('pt_id'),
            'cabang_perlombaan_id' => $this->request->getPost('cabang_perlombaan_id'),
            'keterangan' => 2,
            'peserta_id' => $this->request->getPost('peserta_id') // Convert array to comma-separated string
        ];
        dd($data);

        if ($Fotografi->update($id, $data)) {
            return redirect()->to('/admin/pendaftaran/eksibisiFotografi')->with('success', 'Data berhasil disimpan!');
        } else {
            // Handle the failure case
        }
        
    }

    public function updateStatus($keterangan, $id)
    {
        $data = [
            'keterangan' => $keterangan
        ];

        if ($this->Fotografi->update($id, $data)) {
            $user = $this->Fotografi->find($id);
            $userEmail = $user['id'];

            $Fotografi = $this->Fotografi->where('id', $userEmail)->first();

            if ($Fotografi) {
                $FotografiData = ['keterangan' => $keterangan];
                $this->Fotografi->update($Fotografi['id'], $FotografiData);
            }

            if ($keterangan == 1) {
                $this->session->setFlashdata('success', 'Pengguna berhasil diaktifkan.');
            } else {
                $this->session->setFlashdata('success', 'Pengguna berhasil dinonaktifkan.');
            }
        } else {
            $this->session->setFlashdata('error', 'Gagal memperbarui keterangan pengguna.');
        }

        return redirect()->to('/admin/pendaftaran/eksibisiFotografi');
    }
    public function deletefoto($id)
    {
        // Check if the record exists
        $Fotografi = $this->Fotografi->find($id);
        if ($Fotografi) {
            // Delete the record
            $this->Fotografi->deleteById($id);
            return redirect()->to('/admin/pendaftaran/eksibisiFotografi')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/admin/pendaftaran/eksibisiFotografi')->with('status', 'Record not found');
        }
    }
}
