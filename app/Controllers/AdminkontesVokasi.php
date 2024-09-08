<?php

namespace App\Controllers;

use App\Models\Admin\PtModel;
use App\Models\Admin\CabangLombaModel;
use App\Models\Admin\ProposalModel;
use App\Models\Admin\VideoModel;
use App\Models\Admin\PesertaModel;
use Ramsey\Uuid\Uuid;

class AdminkontesVokasi extends BaseController
{protected $proposalModel;
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
        $this->proposalModel = new ProposalModel();
        $this->videoModel = new VideoModel();
    }
    public function KontesVokasiDaring()
    {
        $proposals = $this->proposalModel->proposalbyPt();
        $pesertaModel = new \App\Models\Admin\PesertaModel();
        $allPeserta = $pesertaModel->findAll();

        // Atur peserta ke dalam array untuk pencarian cepat
        $pesertaArray = [];
        foreach ($allPeserta as $peserta) {
            $pesertaArray[$peserta['id']] = $peserta['nama_peserta'];
        }

        // Tambahkan nama peserta ke setiap proposal
        foreach ($proposals as &$proposal) {
            $pesertaIds = explode(',', $proposal['peserta_id']);
            $proposal['peserta_names'] = array_map(function ($id) use ($pesertaArray) {
                return $pesertaArray[$id] ?? 'Unknown'; // Ganti 'Unknown' jika ID tidak ditemukan
            }, $pesertaIds);
        }

        // Kirim data ke view
        $data['proposal'] = $proposals;
        echo view('konten/admin/kontesVokasi/daring/index', $data);
    }
    public function addKontesVokasiDaring()
    {
        $data = [
            'proposal' => $this->proposalModel->getAllPendaftaran(),
            'peserta' => $this->pesertaModel->getAllpeserta(),
            'pesertaOptions' => $this->pesertaModel->findAll(),
            'cabang_perlombaan' => $this->cabanglombaModel->getAllLomba(),
            'pt' => $this->ptModel->getAllPt(),
        ];
        return view('konten/admin/kontesVokasi/daring/add', $data);
    }

    public function addKontesVokasiDaringPost()
    {
        // Define validation rules
        $validationRules = [
            'pt_id' => 'required|is_not_unique[pt.id]',
            'cabang_perlombaan_id' => 'required|is_not_unique[cabang_perlombaan.id]',
            'nama_team' => 'required|min_length[3]|max_length[255]',
            'proposal' => 'required',
            'peserta_id' => 'required|permit_empty',
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
            'nama_team' => [
                'required' => 'Nama tim harus diisi.',
                'min_length' => 'Nama tim harus terdiri dari minimal 3 karakter.',
                'max_length' => 'Nama tim tidak boleh lebih dari 255 karakter.',
            ],
            'proposal' => [
                'required' => 'Proposal harus diisi.',
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
    
        $proposalModel = new ProposalModel();
        $data = [
            'pt_id' => $this->request->getPost('pt_id'),
            'cabang_perlombaan_id' => $this->request->getPost('cabang_perlombaan_id'),
            'nama_team' => $this->request->getPost('nama_team'),
            'proposal' => $this->request->getPost('proposal'),
            'keterangan' => 2,
            'peserta_id' => implode(',', $this->request->getPost('peserta_id')) // Convert array to comma-separated string
        ];
    
        if ($proposalModel->insertData($data)) {
            return redirect()->to('/admin/pendaftaran/kontesVokasi/daring')->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data!');
        }
    }
    

    public function editKontesVokasiDaring($id)
    {
        $proposalModel = new ProposalModel();
    $data = [
        'proposal' => $proposalModel->find($id),
        'peserta' => $this->pesertaModel->getAllpeserta(),
        'pesertaOptions' => $this->pesertaModel->findAll(),
        'cabang_perlombaan' => $this->cabanglombaModel->getAllLomba(),
        'pt' => $this->ptModel->getAllPt(),
    ];

    if (empty($data['proposal'])) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Proposal not found');
    }

    return view('konten/admin/kontesVokasi/daring/edit', $data);
        
    }


    public function editKontesVokasiDaringPost($id)
    {
        $validationRules = [
            'pt_id' => 'required|is_not_unique[pt.id]',
            'cabang_perlombaan_id' => 'required|is_not_unique[cabang_perlombaan.id]',
            'nama_team' => 'required|min_length[3]|max_length[255]',
            'proposal' => 'required',
            'peserta_id' => 'required|permit_empty',
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
            'nama_team' => [
                'required' => 'Nama tim harus diisi.',
                'min_length' => 'Nama tim harus terdiri dari minimal 3 karakter.',
                'max_length' => 'Nama tim tidak boleh lebih dari 255 karakter.',
            ],
            'proposal' => [
                'required' => 'Proposal harus diisi.',
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
    
        $proposalModel = new ProposalModel();
        $data = [
            'pt_id' => $this->request->getPost('pt_id'),
            'cabang_perlombaan_id' => $this->request->getPost('cabang_perlombaan_id'),
            'nama_team' => $this->request->getPost('nama_team'),
            'proposal' => $this->request->getPost('proposal'),
            'keterangan' => 2,
            'peserta_id' => implode(',', $this->request->getPost('peserta_id')) // Convert array to comma-separated string
        ];
    
        if ($proposalModel->update($id, $data)) {
            return redirect()->to('/admin/pendaftaran/kontesVokasi/daring')->with('success', 'Data berhasil diperbarui!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data!');
        }
    }
    
    public function updateStatus($keterangan, $id)
    {
        $data = [
            'keterangan' => $keterangan
        ];

        if ($this->proposalModel->update($id, $data)) {
            $user = $this->proposalModel->find($id);
            $userEmail = $user['proposal'];

            $proposalModel = $this->proposalModel->where('proposal', $userEmail)->first();

            if ($proposalModel) {
                $proposalModelData = ['keterangan' => $keterangan];
                $this->proposalModel->update($proposalModel['id'], $proposalModelData);
            }

            if ($keterangan == 1) {
                $this->session->setFlashdata('success', 'Pengguna berhasil diaktifkan.');
            } else {
                $this->session->setFlashdata('success', 'Pengguna berhasil dinonaktifkan.');
            }
        } else {
            $this->session->setFlashdata('error', 'Gagal memperbarui keterangan pengguna.');
        }

        return redirect()->to('/admin/pendaftaran/kontesVokasi/daring');
    }
    public function deleteKontesVokasiDaring($id)
    {
        // Check if the record exists
        $proposal = $this->proposalModel->find($id);
        if ($proposal) {
            // Delete the record
            $this->proposalModel->deleteById($id);
            return redirect()->to('/admin/pendaftaran/kontesVokasi/daring')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/admin/pendaftaran/kontesVokasi/daring')->with('status', 'Record not found');
        }
    }
}
