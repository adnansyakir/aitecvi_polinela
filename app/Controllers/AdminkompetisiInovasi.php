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
        // Get the posted data
        $data = $this->request->getPost();

        // Validation rules
        $rules = [
            'pt_id' => 'required|integer',
            'cabang_perlombaan_id' => 'required|integer',
            'nama_team' => 'required|string',
            'proposal' => 'required|valid_url',
            'peserta_id' => 'required'
        ];

        // Custom validation messages
        $messages = [
            'peserta_id' => [
                'required' => 'Peserta harus dipilih.',
               
            ]
        ];

        // Validate the input data
        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Prepare data for insertion
        $insertData = [
            'pt_id' => $data['pt_id'],
            'cabang_perlombaan_id' => $data['cabang_perlombaan_id'],
            'nama_team' => $data['nama_team'],
            'proposal' => $data['proposal'],
            'peserta_id' => isset($data['peserta_id']) ? implode(',', $data['peserta_id']) : '' // Convert array to comma-separated string
        ];

        // Insert the proposal into the database
        if ($this->proposalModel->insert($insertData)) {
            return redirect()->to('/admin/pendaftaran/kompetisiInovasi/proposal')->with('message', 'Proposal added successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to add proposal');
        }
    }

    public function editkompetisiInovasiProposal($id)
    {
        $proposal = $this->proposalModel->find($id);

        // Pecah string peserta_id menjadi array
        $proposalPesertaIds = explode(',', $proposal['peserta_id']);

        $data = [
            'proposal' => $proposal,
            'pt' => $this->ptModel->findAll(),
            'cabang_perlombaan' => $this->cabanglombaModel->findAll(),
            'pesertaOptions' => $this->pesertaModel->findAll(), // semua peserta
            'proposalPesertaIds' => $proposalPesertaIds, // array of peserta_id
            'errors' => session()->getFlashdata('errors')
        ];

        return view('konten/admin/kompetisiInovasi/proposal/edit', $data);
    }


    public function editkompetisiInovasiProposalPost($id)
    {
        // Get the posted data
        $data = $this->request->getPost();

        // Validation rules
        $rules = [
            'pt_id' => 'required|integer',
            'cabang_perlombaan_id' => 'required|integer',
            'nama_team' => 'required|string',
            'proposal' => 'required|valid_url',
            'peserta_id' => 'required'
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
            'proposal' => $data['proposal'],
            'peserta_id' => implode(',', $data['peserta_id']) // Convert array to comma-separated string
        ];

        // Update the proposal in the database
        if ($this->proposalModel->update($id, $updateData)) {
            return redirect()->to('/admin/pendaftaran/kompetisiInovasi/proposal')->with('primary', 'Proposal updated successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update proposal');
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

        $videos = $this->videoModel->videobyPt();
        $pesertaModel = new \App\Models\Admin\PesertaModel();
        $allPeserta = $pesertaModel->findAll();

        // Atur peserta ke dalam array untuk pencarian cepat
        $pesertaArray = [];
        foreach ($allPeserta as $peserta) {
            $pesertaArray[$peserta['id']] = $peserta['nama_peserta'];
        }

        // Tambahkan nama peserta ke setiap video
        foreach ($videos as &$video) {
            $pesertaIds = explode(',', $video['peserta_id']);
            $video['peserta_names'] = array_map(function ($id) use ($pesertaArray) {
                return $pesertaArray[$id] ?? 'Unknown'; // Ganti 'Unknown' jika ID tidak ditemukan
            }, $pesertaIds);
        }

        // Kirim data ke view
        $data['video'] = $videos;


        // dd($data);
        echo view('konten/admin/kompetisiInovasi/video/index', $data);
    }
    public function addkompetisiInovasiVideo()
    {
        $data = [
            'video' => $this->videoModel->getAllPendaftaran(),
            'peserta' => $this->pesertaModel->getAllpeserta(),
            'pesertaOptions' => $this->pesertaModel->findAll(),
            'cabang_perlombaan' => $this->cabanglombaModel->getAllLomba(),
            'pt' => $this->ptModel->getAllPt(),
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
            'peserta_id' => 'required'
        ];

        // Custom validation messages
        $messages = [
            'peserta_id' => [
                'required' => 'Peserta harus dipilih.',
               
            ]
        ];

        // Validate the input data
        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Prepare data for insertion
        $insertData = [
            'pt_id' => $data['pt_id'],
            'cabang_perlombaan_id' => $data['cabang_perlombaan_id'],
            'nama_team' => $data['nama_team'],
            'video' => $data['video'],
            'peserta_id' => isset($data['peserta_id']) ? implode(',', $data['peserta_id']) : '' // Convert array to comma-separated string
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

        // Pecah string peserta_id menjadi array
        $videoPesertaIds = explode(',', $video['peserta_id']);

        $data = [
            'video' => $video,
            'pt' => $this->ptModel->findAll(),
            'cabang_perlombaan' => $this->cabanglombaModel->findAll(),
            'pesertaOptions' => $this->pesertaModel->findAll(), // semua peserta
            'videoPesertaIds' => $videoPesertaIds, // array of peserta_id
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
            'proposal' => 'required|valid_url',
            'peserta_id' => 'required'
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
            'proposal' => $data['proposal'],
            'peserta_id' => implode(',', $data['peserta_id']) // Convert array to comma-separated string
        ];

        // Update the proposal in the database
        if ($this->proposalModel->update($id, $updateData)) {
            return redirect()->to('/admin/pendaftaran/kompetisiInovasi/proposal')->with('primary', 'Proposal updated successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update proposal');
        }
    }
    public function deletekompetisiInovasiVideo($id)
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

}
