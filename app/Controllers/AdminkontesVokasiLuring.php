<?php

namespace App\Controllers;

use App\Models\Admin\PtModel;
use App\Models\Admin\CabangLombaModel;
use App\Models\Admin\KntsDaringLuringModel;
use App\Models\Admin\KntsLuringModel;
use App\Models\Admin\VideoModel;
use App\Models\Admin\PesertaModel;
use App\Models\Admin\LuringTimModel;
use Ramsey\Uuid\Uuid;

class AdminkontesVokasiLuring extends BaseController
{
    protected $KntsDaringLuring;
    protected $KntsLuring;
    protected $videoModel;
    protected $ptModel;
    protected $cabanglombaModel;
    protected $pesertaModel;
    protected $session;
    protected $luringTim;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->ptModel = new PtModel();
        $this->pesertaModel = new PesertaModel();
        $this->cabanglombaModel = new CabangLombaModel();
        $this->KntsLuring = new KntsLuringModel();
        $this->luringTim = new LuringTimModel();
    }

    public function KontesVokasiLuring()
    {
        $data = [

            'kntsluring' => $this->KntsLuring->kntsdaringluringbyPt(),

        ];
        echo view('konten/admin/kontesVokasi/luring/index', $data);
    }
    public function addKontesVokasiLuring()
    {
        $data = [
            'kntsluring' => $this->KntsLuring->getAllPendaftaran(),
            'peserta' => $this->pesertaModel->getAllpeserta(),
            // 003 sesuai kode lomba
            'cabang_perlombaan' => $this->cabanglombaModel->getLombabyKode(003),
            'pt' => $this->ptModel->getAllPt(),
        ];
        return view('konten/admin/kontesVokasi/luring/add', $data);
    }

    public function addKontesVokasiLuringPost()
    {
        // Load the KntsLuringModel
        $KntsLuring = new KntsLuringModel(); // Ensure the correct model is loaded

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

        $pt_id = $this->request->getPost('pt_id');
        $cabang_perlombaan_id = $this->request->getPost('cabang_perlombaan_id');

        // Check if this PT has already registered two participants for this category
        if (in_array($cabang_perlombaan_id, [1, 582])) {
            $existingRegistrations = $KntsLuring->where('pt_id', $pt_id)
                ->where('cabang_perlombaan_id', $cabang_perlombaan_id)
                ->countAllResults();

            if ($existingRegistrations >= 2) {
                return redirect()->back()->withInput()->with('error', 'Maaf, Anda telah Memenuhi Kuota Maksimal pada Cabang Perlombaan ini.');
            }
        }

        // Proceed with registration if validation passes and limit is not exceeded
        $data = [
            'pt_id' => $pt_id,
            'cabang_perlombaan_id' => $cabang_perlombaan_id,
            'keterangan' => 2, // Default status or description
            'peserta_id' => $this->request->getPost('peserta_id')
        ];

        if ($KntsLuring->insertData($data)) {
            return redirect()->to('/admin/pendaftaran/kontesVokasi/luring/individu')->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data!');
        }
    }

    public function editKontesVokasiLuring($id)
    {
        $KntsLuring = new KntsLuringModel();
        $data = [
            'luring' => $KntsLuring->find($id),
            'peserta' => $this->pesertaModel->getAllpeserta(),
            'cabang_perlombaan' => $this->cabanglombaModel->getLombabyKode(003),
            'pt' => $this->ptModel->getAllPt(),
        ];

        if (empty($data['luring'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Proposal not found');
        }

        return view('konten/admin/kontesVokasi/luring/edit', $data);
    }


    public function editKontesVokasiLuringPost($id)
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

        $KntsLuring = new KntsLuringModel();
        $data = [
            'pt_id' => $this->request->getPost('pt_id'),
            'cabang_perlombaan_id' => $this->request->getPost('cabang_perlombaan_id'),
            'keterangan' => 2,
            'peserta_id' => $this->request->getPost('peserta_id') // Convert array to comma-separated string
        ];

        if ($KntsLuring->update($id, $data)) {
            return redirect()->to('/admin/pendaftaran/kontesVokasi/luring/individu')->with('success', 'Data berhasil disimpan!');
        } else {
        }
    }

    public function updateStatusLuring($keterangan, $id)
    {
        $data = [
            'keterangan' => $keterangan
        ];

        if ($this->KntsLuring->update($id, $data)) {
            $user = $this->KntsLuring->find($id);
            $userEmail = $user['id'];

            $KntsLuring = $this->KntsLuring->where('id', $userEmail)->first();

            if ($KntsLuring) {
                $KntsLuringData = ['keterangan' => $keterangan];
                $this->KntsLuring->update($KntsLuring['id'], $KntsLuringData);
            }

            if ($keterangan == 1) {
                $this->session->setFlashdata('success', 'Pengguna berhasil diaktifkan.');
            } else {
                $this->session->setFlashdata('success', 'Pengguna berhasil dinonaktifkan.');
            }
        } else {
            $this->session->setFlashdata('error', 'Gagal memperbarui keterangan pengguna.');
        }

        return redirect()->to('/admin/pendaftaran/kontesVokasi/luring/individu');
    }
    public function deleteKontesVokasiLuring($id)
    {
        // Check if the record exists
        $KntsLuring = $this->KntsLuring->find($id);
        if ($KntsLuring) {
            // Delete the record
            $this->KntsLuring->deleteById($id);
            return redirect()->to('/admin/pendaftaran/kontesVokasi/luring/individu')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/admin/pendaftaran/kontesVokasi/luring/individu')->with('status', 'Record not found');
        }
    }
    public function KontesVokasiLuringTim()
    {
       
        // dd($ptId); // Periksa apakah nilai pt_id sesuai

        $lurings = $this->luringTim->LuringTimbyPt(); // Data proposal sudah terfilter berdasarkan PT
        $pesertaModel = new \App\Models\Admin\PesertaModel();
        $allPeserta = $pesertaModel->findAll();

        // Atur peserta ke dalam array untuk pencarian cepat
        $pesertaArray = [];
        foreach ($allPeserta as $peserta) {
            $pesertaArray[$peserta['id']] = $peserta['nama_peserta'];
        }

        // Tambahkan nama peserta ke setiap proposal
        foreach ($lurings as &$luringtim) {
            $pesertaIds = explode(',', $luringtim['peserta_id']);
            $luringtim['peserta_names'] = array_map(function ($id) use ($pesertaArray) {
                return $pesertaArray[$id] ?? 'Unknown'; // Ganti 'Unknown' jika ID tidak ditemukan
            }, $pesertaIds);
        }

        // Kirim data ke view
        $data['luringtim'] = $lurings;
        // dd($data);
        echo view('konten/admin/kontesVokasi/luringtim/index', $data);
    }

    public function addKontesVokasiLuringTim()
    {
       

        $data = [
            'luring_tim' => $this->luringTim->getAllPendaftaran(),
            'peserta' => $this->pesertaModel->getAllpeserta(),
            'pesertaOptions' => $this->pesertaModel->find(),
            'cabang_perlombaan' => $this->cabanglombaModel->getLombabyKode(005),
            'pt' => $this->ptModel->getAllPt(),
        ];
        return view('konten/admin/kontesVokasi/luringtim/add', $data);
    }

    public function addKontesVokasiLuringTimPost()
    {
        // Define validation rules
        $validationRules = [
            'pt_id' => 'required|is_not_unique[pt.id]',
            'cabang_perlombaan_id' => 'required|is_not_unique[cabang_perlombaan.id]',
            'nama_team' => 'required|min_length[3]|max_length[255]',
          
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
          
            'peserta_id' => [
                'required' => 'Peserta harus dipilih.',
            ],
        ];

        // Validate input
        if (!$this->validate($validationRules, $validationMessages)) {
            // Validation failed, redirect back with input and validation errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $luringTimModel = new LuringTimModel();
        $data = [
            'pt_id' => $this->request->getPost('pt_id'),
            'cabang_perlombaan_id' => $this->request->getPost('cabang_perlombaan_id'),
            'nama_team' => $this->request->getPost('nama_team'),
            'peserta_id' => implode(',', $this->request->getPost('peserta_id')) // Convert array to comma-separated string
        ];

        if ($luringTimModel->insertData($data)) {
            return redirect()->to('/admin/pendaftaran/kontesVokasi/luring/tim')->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data!');
        }
    }


    public function editKontesVokasiLuringTim($id)
    {
        
        $luringTimModel = new LuringTimModel();
        $luring = $luringTimModel->find($id);

        $data = [
            'luringtim' => $luring,
            'selected_peserta_ids' => explode(',', $luring['peserta_id']), // Assuming peserta_id contains comma-separated IDs
            'peserta' => $this->pesertaModel->getAllpeserta(),
            'pesertaOptions' => $this->pesertaModel->findAll(),
            'cabang_perlombaan' => $this->cabanglombaModel->getLombabyKode(005),
            'pt' => $this->ptModel->getAllPt(),
        ];

        if (empty($data['luringtim'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Proposal not found');
        }

        return view('konten/admin/kontesVokasi/luringtim/edit', $data);
    }


    public function editKontesVokasiLuringTimPost($id)
    {
        $validationRules = [
            'pt_id' => 'required|is_not_unique[pt.id]',
            'cabang_perlombaan_id' => 'required|is_not_unique[cabang_perlombaan.id]',
            'nama_team' => 'required|min_length[3]|max_length[255]',
           
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
            
            'peserta_id' => [
                'required' => 'Peserta harus dipilih.',
            ],
        ];

        // Validate input
        if (!$this->validate($validationRules, $validationMessages)) {
            // Validation failed, redirect back with input and validation errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $proposalModel = new LuringTimModel();
        $data = [
            'pt_id' => $this->request->getPost('pt_id'),
            'cabang_perlombaan_id' => $this->request->getPost('cabang_perlombaan_id'),
            'nama_team' => $this->request->getPost('nama_team'),
            'peserta_id' => implode(',', $this->request->getPost('peserta_id')) // Convert array to comma-separated string
        ];

        if ($proposalModel->update($id, $data)) {
            return redirect()->to('/admin/pendaftaran/kontesVokasi/luring/tim')->with('success', 'Data berhasil diperbarui!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data!');
        }
    }

    // public function updateStatus($keterangan, $id)
    // {
    //     $data = [
    //         'keterangan' => $keterangan
    //     ];

    //     if ($this->proposalModel->update($id, $data)) {
    //         $user = $this->proposalModel->find($id);
    //         $userEmail = $user['proposal'];

    //         $proposalModel = $this->proposalModel->where('proposal', $userEmail)->first();

    //         if ($proposalModel) {
    //             $proposalModelData = ['keterangan' => $keterangan];
    //             $this->proposalModel->update($proposalModel['id'], $proposalModelData);
    //         }

    //         if ($keterangan == 1) {
    //             $this->session->setFlashdata('success', 'Pengguna berhasil diaktifkan.');
    //         } else {
    //             $this->session->setFlashdata('success', 'Pengguna berhasil dinonaktifkan.');
    //         }
    //     } else {
    //         $this->session->setFlashdata('error', 'Gagal memperbarui keterangan pengguna.');
    //     }

    //     return redirect()->to('/admin/pendaftaran/kontesVokasi/luring/tim');
    // }
    public function deleteKontesVokasiLuringTim($id)
    {
        // Check if the record exists
        $proposal = $this->luringTim->find($id);
        if ($proposal) {
            // Delete the record
            $this->luringTim->deleteById($id);
            return redirect()->to('/admin/pendaftaran/kontesVokasi/luring/tim')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/admin/pendaftaran/kontesVokasi/luring/tim')->with('status', 'Record not found');
        }
    }
}
