<?php

namespace App\Controllers;

use App\Models\Admin\PtModel;
use App\Models\Admin\CabangLombaModel;
use App\Models\Admin\KntsDaringLuringModel;
use App\Models\Admin\KntsLuringModel;
use App\Models\Admin\VideoModel;
use App\Models\Admin\PesertaModel;
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

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->ptModel = new PtModel();
        $this->pesertaModel = new PesertaModel();
        $this->cabanglombaModel = new CabangLombaModel();
        $this->KntsLuring = new KntsLuringModel();
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
        $cabang_perlombaan_name = $this->request->getPost('cabang_perlombaan_name');

        // Define the competition names with a limit
        $limitedCompetitions = [
            'Handling Ternak',
            'Desain Alat dan Mesin Pertanian dengan AutoCAD',
            'Teknik Pengambilan Sampel Darah Ayam',
            'Packing Benih Ikan',
            'Sortasi Biji Kopi',
            'Teknik Pembuatan Bakso Ikan',
            'Survey Pemetaan Lahan'
        ];

        // Get the `cabang_perlombaan_id` for the provided name
        $cabangPerlombaan = $this->cabanglombaModel->where('nama_perlombaan', $cabang_perlombaan_name)->first();
        if (!$cabangPerlombaan) {
            return redirect()->back()->withInput()->with('error', 'PT ini telah mendaftarkan maksimal 2 perwakilan untuk cabang perlombaan ini.');
        }

        $cabang_perlombaan_id = $cabangPerlombaan['id'];

        // Check if this PT has already registered two participants for this category
        if (in_array($cabang_perlombaan_name, $limitedCompetitions)) {
            $existingRegistrations = $KntsLuring->where('pt_id', $pt_id)
                ->where('cabang_perlombaan_id', $cabang_perlombaan_id)
                ->countAllResults();

            if ($existingRegistrations >= 2) {
                return redirect()->back()->withInput()->with('error', 'PT ini telah mendaftarkan maksimal 2 perwakilan untuk cabang perlombaan ini.');
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
            return redirect()->to('/admin/pendaftaran/kontesVokasi/luring')->with('success', 'Data berhasil disimpan!');
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
            return redirect()->to('/admin/pendaftaran/kontesVokasi/luring')->with('success', 'Data berhasil disimpan!');
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

        return redirect()->to('/admin/pendaftaran/kontesVokasi/luring');
    }
    public function deleteKontesVokasiLuring($id)
    {
        // Check if the record exists
        $KntsLuring = $this->KntsLuring->find($id);
        if ($KntsLuring) {
            // Delete the record
            $this->KntsLuring->deleteById($id);
            return redirect()->to('/admin/pendaftaran/kontesVokasi/luring')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/admin/pendaftaran/kontesVokasi/luring')->with('status', 'Record not found');
        }
    }
}
