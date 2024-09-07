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
        $data = [
            'proposal' => $this->proposalModel->proposalbyPt()

        ];

        echo view('konten/admin/kompetisiInovasi/proposal/index', $data);
    }
    public function addkompetisiInovasiProposal()
    {
        $data = [
            'proposal' => $this->proposalModel->getAllPendaftaran(),
            'peserta' => $this->pesertaModel->getAllpeserta(),
            'cabang_perlombaan' => $this->cabanglombaModel->getAllLomba(),
            'pt' => $this->ptModel->getAllPt(),
        ];
        return view('konten/admin/kompetisiInovasi/proposal/add', $data);
    }

    public function addkompetisiInovasiProposalPost()
    {
        $validationRules = [

            'pt_id' => 'required',
            'cabang_perlombaan_id' => 'required',
            'nama_team' => 'required',
            'peserta_id' => 'required',
            'kode_peserta' => 'required',
            'keterangan' => 'required',
        ];

        $validationMessages = [

            'pt_id' => [
                'required' => 'Kolom Perguruan Tinggi harus diisi',
            ],
            'cabang_perlombaan_id' => [
                'required' => 'Kolom Nama Perlombaan harus diisi',
            ],
            'nama_team' => [
                'required' => 'Kolom Kode pendaftaran harus diisi',
            ],
            'peserta_id' => [
                'required' => 'Kolom Kode pendaftaran harus diisi',
            ],
            'kode_peserta' => [
                'required' => 'Kolom Nama pendaftaran harus diisi',
            ],
            'keterangan' => [
                'required' => 'Kolom Keterangan harus diisi',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id' => Uuid::uuid4()->toString(),
            'pt_id' => $this->request->getPost('pt_id'),
            'cabang_perlombaan_id' => $this->request->getPost('cabang_perlombaan_id'),
            'nama_team' => $this->request->getPost('nama_team'),
            'peserta_id' => $this->request->getPost('peserta_id'),
            'kode_peserta' => $this->request->getPost('kode_peserta'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $this->proposalModel->insert($data);
        session()->setFlashdata('primary', 'Data berhasil disimpan.');
        return redirect()->to('/admin/pendaftaran');
    }

    public function editPendaftaran($id)
    {
        $pendaftaran = $this->proposalModel->find($id);
        if (!$pendaftaran) {
            throw new \RuntimeException('Data pendaftaran tidak ditemukan');
        }

        $data = [
            'pendaftaran' => $pendaftaran,
            'peserta' => $this->pesertaModel->getAllpeserta(),
            'cabang_perlombaan' => $this->cabanglombaModel->getAllLomba(),
            'pt' => $this->ptModel->getAllPt(),
        ];

        return view('konten/admin/pendaftaran/edit', $data);
    }

    public function editkompetisiInovasiProposalPost($id)
    {
        $pendaftaran = $this->proposalModel->find($id);
        if (!$pendaftaran) {
            throw new \RuntimeException('Data pendaftaran tidak ditemukan');
        }

        $validationRules = [
            'pt_id' => 'required',
            'cabang_perlombaan_id' => 'required',
            'nama_team' => 'required',
            'peserta_id' => 'required',
            'kode_peserta' => 'required',
            'keterangan' => 'required',
        ];

        $validationMessages = [

            'pt_id' => [
                'required' => 'Kolom Perguruan Tinggi harus diisi',
            ],
            'cabang_perlombaan_id' => [
                'required' => 'Kolom Nama Perlombaan harus diisi',
            ],
            'nama_team' => [
                'required' => 'Kolom Kode pendaftaran harus diisi',
            ],
            'peserta_id' => [
                'required' => 'Kolom Kode pendaftaran harus diisi',
            ],
            'kode_peserta' => [
                'required' => 'Kolom Nama pendaftaran harus diisi',
            ],
            'keterangan' => [
                'required' => 'Kolom Keterangan harus diisi',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'id' => $id,
            'pt_id' => $this->request->getPost('pt_id'),
            'cabang_perlombaan_id' => $this->request->getPost('cabang_perlombaan_id'),
            'nama_team' => $this->request->getPost('nama_team'),
            'peserta_id' => $this->request->getPost('peserta_id'),
            'kode_peserta' => $this->request->getPost('kode_peserta'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $this->proposalModel->update($id, $data);
        session()->setFlashdata('primary', 'Data berhasil diupdate.');
        return redirect()->to('/admin/pendaftaran');
    }
    public function deletekompetisiInovasiProposal($id)
    {
        // Check if the record exists
        $pendaftaran = $this->proposalModel->find($id);
        if ($pendaftaran) {
            // Delete the record
            $this->proposalModel->deleteById($id);
            return redirect()->to('/admin/pendaftaran')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/admin/pendaftaran')->with('status', 'Record not found');
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
            'video' => $this->proposalModel->getAllPendaftaran(),
            'peserta' => $this->pesertaModel->getAllpeserta(),
            'cabang_perlombaan' => $this->cabanglombaModel->getAllLomba(),
            'pt' => $this->ptModel->getAllPt(),
        ];
        return view('konten/admin/kompetisiInovasi/video/add', $data);
    }
    public function addkompetisiInovasiVideoPost()
    {
        $validation = \Config\Services::validation();
        // dd($this->request->getPost());
        // Mengambil data dari request
        $pt_id = $this->request->getPost('pt_id');
        $video = $this->request->getPost('video');
        $nama_team = $this->request->getPost('nama_team');
        $cabang_perlombaan_id = $this->request->getPost('cabang_perlombaan_id');
        $peserta_ids = $this->request->getPost('peserta_id'); // Ini akan menjadi array jika benar


        // dd($pt_id, $video, $nama_team, $cabang_perlombaan_id, $peserta_ids);
        // Validasi form
        $validation->setRules(
            [
                'pt_id' => 'required',
                'video' => 'required',
                'nama_team' => 'required',
                'cabang_perlombaan_id' => 'required',
                'peserta_id' => 'required',
            ],
            [
                'pt_id' => [
                    'required' => 'Kolom perguruan tinggi harus diisi.'
                ],
                'video' => [
                    'required' => 'Kolom video harus diisi.'
                ],
                'nama_team' => [
                    'required' => 'Kolom nama team harus diisi.'
                ],
                'cabang_perlombaan_id' => [
                    'required' => 'Kolom cabang perlombaan harus diisi.'
                ],
                'peserta_id' => [
                    'required' => 'Kolom peserta harus diisi.'
                ],
            ]
        );

        // Jika validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Cek apakah peserta_ids adalah array
        if (is_array($peserta_ids)) {
            $peserta_ids = implode(',', $peserta_ids); // Gabungkan array menjadi string
        } else {
            $peserta_ids = ''; // Jika tidak ada peserta dipilih
        }

        // Ambil data dari form
        $data = [
            'pt_id' => $pt_id,
            'cabang_perlombaan_id' => $cabang_perlombaan_id,
            'nama_team' => $nama_team,
            'video' => $video,
            'peserta_id' => $peserta_ids, // Masukkan peserta yang sudah digabung
            'keterangan' => 0 // Default value
        ];

        $videoMod = new VideoModel();
        $videoMod->insert($data);

        // Redirect ke halaman sukses
        return redirect()->to('/admin/pendaftaran/kompetisiInovasi/video')->with('success', 'Data video berhasil disimpan.');
    }
}
