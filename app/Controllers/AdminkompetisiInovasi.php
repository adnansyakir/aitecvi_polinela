<?php

namespace App\Controllers;

use App\Models\Admin\PtModel;
use App\Models\Admin\CabangLombaModel;
use App\Models\Admin\ProposalModel;
use App\Models\Admin\VideoModel;
use App\Models\Admin\PesertaModel;
use Ramsey\Uuid\Uuid;

class AdminkompetisiInovasi extends BaseController
{
    protected $proposalModel;
    protected $videoModel;
    protected $ptModel;
    protected $cabanglombaModel;
    protected $pesertaModel;
    public function __construct()
    {
        $this->ptModel = new PtModel();
        $this->pesertaModel = new PesertaModel();
        $this->cabanglombaModel = new CabangLombaModel();
        $this->proposalModel = new ProposalModel();
        $this->videoModel = new VideoModel();
    }
    public function kompetisiInovasiProposal()
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
        echo view('konten/admin/kompetisiInovasi/proposal/index', $data);
    }
    public function addkompetisiInovasiProposal()
    {
        $data = [
            'proposal' => $this->proposalModel->getAllPendaftaran(),
            'peserta' => $this->pesertaModel->getAllpeserta(),
            'pesertaOptions' => $this->pesertaModel->findAll(),
            'cabang_perlombaan' => $this->cabanglombaModel->getAllLomba(),
            'pt' => $this->ptModel->getAllPt(),
        ];
        return view('konten/admin/kompetisiInovasi/proposal/add', $data);
    }

    public function addkompetisiInovasiProposalPost()
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
            return redirect()->to('/admin/pendaftaran/kompetisiInovasi/proposal')->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data!');
        }
    }
    

    public function editkompetisiInovasiProposal($id)
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

    return view('konten/admin/kompetisiInovasi/proposal/edit', $data);
        
    }


    public function editkompetisiInovasiProposalPost($id)
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
            return redirect()->to('/admin/pendaftaran/kompetisiInovasi/proposal')->with('success', 'Data berhasil diperbarui!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data!');
        }
    }
    

    public function deletekompetisiInovasiProposal($id)
    {
        // Check if the record exists
        $proposal = $this->proposalModel->find($id);
        if ($proposal) {
            // Delete the record
            $this->proposalModel->deleteById($id);
            return redirect()->to('/admin/pendaftaran/kompetisiInovasi/proposal')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/admin/pendaftaran/kompetisiInovasi/proposal')->with('status', 'Record not found');
        }
    }

    // Video
    public function kompetisiInovasiVideo()
    {

        $data = [

            'video' => $this->videoModel->videobyPt(),

        ];
        // dd($data);
        echo view('konten/admin/kompetisiInovasi/video/index', $data);
    }
    public function addkompetisiInovasiVideo()
    {
        $data = [
            'video' => $this->videoModel->getAllPendaftaran(),
            'peserta' => $this->pesertaModel->getAllpeserta(),
            'cabang_perlombaan' => $this->cabanglombaModel->getAllLomba(),
            'pt' => $this->ptModel->getAllPt(),
            'proposal' => $this->proposalModel->getProposalWithKeterangan(1), // Filter berdasarkan keterangan = 1
        ];
        return view('konten/admin/kompetisiInovasi/video/add', $data);
    }


    public function addkompetisiInovasiVideoPost()
    {
        // Get the posted data
        $data = $this->request->getPost();

        // Validation rules
        $rules = [
            'pt_id' => 'required|integer',
            'cabang_perlombaan_id' => 'required|integer',
            'nama_team' => 'required|string',
            'video' => 'required|valid_url',

        ];



        // Prepare data for insertion
        $insertData = [
            'pt_id' => $data['pt_id'],
            'cabang_perlombaan_id' => $data['cabang_perlombaan_id'],
            'nama_team' => $data['nama_team'],
            'video' => $data['video'],
        ];

        // Insert the video into the database
        if ($this->videoModel->insert($insertData)) {
            return redirect()->to('/admin/pendaftaran/kompetisiInovasi/video')->with('message', 'video added successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to add video');
        }
    }

    public function editkompetisiInovasiVideo($id)
    {
        $video = $this->videoModel->find($id);


        $data = [
            'video' => $video,
            'pt' => $this->ptModel->findAll(),
            'cabang_perlombaan' => $this->cabanglombaModel->findAll(),


            'errors' => session()->getFlashdata('errors')
        ];

        return view('konten/admin/kompetisiInovasi/video/edit', $data);
    }


    public function editkompetisiInovasiVideoPost($id)
    {
        // Get the posted data
        $data = $this->request->getPost();

        // Validation rules
        $rules = [
            'pt_id' => 'required|integer',
            'cabang_perlombaan_id' => 'required|integer',
            'nama_team' => 'required|string',
            'video' => 'required|valid_url',

        ];

        // Validate the input data
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Prepare data for updating
        $updateData = [
            'pt_id' => $data['pt_id'],
            'cabang_perlombaan_id' => $data['cabang_perlombaan_id'],
            'nama_team' => $data['nama_team'],
            'video' => $data['video'],

        ];

        // Update the video in the database
        if ($this->videoModel->update($id, $updateData)) {
            return redirect()->to('/admin/pendaftaran/kompetisiInovasi/video')->with('primary', 'video updated successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update video');
        }
    }
    public function deletekompetisiInovasiVideo($id)
    {
        // Check if the record exists
        $video = $this->videoModel->find($id);
        if ($video) {
            // Delete the record
            $this->videoModel->deleteById($id);
            return redirect()->to('/admin/pendaftaran/kompetisiInovasi/video')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/admin/pendaftaran/kompetisiInovasi/video')->with('status', 'Record not found');
        }
    }
}
