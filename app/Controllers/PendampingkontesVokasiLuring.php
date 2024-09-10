<?php

namespace App\Controllers;

use App\Models\Admin\PtModel;
use App\Models\Admin\CabangLombaModel;
use App\Models\Pendamping\KntsLuringModel;
use App\Models\Pendamping\PesertaModel;
use Ramsey\Uuid\Uuid;

class PendampingkontesVokasiLuring extends BaseController
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
        $pt_id = session()->get('pt_id');

        $data = [

            'kntsluring' => $this->KntsLuring->kntsdaringluringbyPt($pt_id),

        ];
        echo view('konten/pendamping/kontesVokasi/luring/index', $data);
    }
    public function addKontesVokasiLuring()
    {
        $pt_id = session()->get('pt_id');
        $data = [
            'kntsluring' => $this->KntsLuring->getAllPendaftaran(),
            'peserta' => $this->pesertaModel->getPesertaWithdPt($pt_id),
            // 003 sesuai kode lomba
            'cabang_perlombaan' => $this->cabanglombaModel->getLombabyKode(003),
            'pt' => $this->ptModel->getAllPt(),
        ];
        return view('konten/pendamping/kontesVokasi/luring/add', $data);
    }

    public function addKontesVokasiLuringPost()
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
            // 2 ngatur nilai keterangan (sedang penilaian)
            'keterangan' => 2,
            'peserta_id' => $this->request->getPost('peserta_id') // Convert array to comma-separated string
        ];

        if ($KntsLuring->insertData($data)) {
            return redirect()->to('/pendamping/pendaftaran/kontesVokasi/luring')->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data!');
        }
    }


    public function editKontesVokasiLuring($id)
    {
        $pt_id = session()->get('pt_id');

        $KntsLuring = new KntsLuringModel();
        $data = [
            'luring' => $KntsLuring->find($id),
            'peserta' => $this->pesertaModel->getPesertaWithdPt($pt_id),
            'cabang_perlombaan' => $this->cabanglombaModel->getLombabyKode(003),
            'pt' => $this->ptModel->getAllPt(),
        ];

        if (empty($data['luring'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Proposal not found');
        }

        return view('konten/pendamping/kontesVokasi/luring/edit', $data);
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
            return redirect()->to('/pendamping/pendaftaran/kontesVokasi/luring')->with('success', 'Data berhasil disimpan!');
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

        return redirect()->to('/pendamping/pendaftaran/kontesVokasi/luring');
    }
    public function deleteKontesVokasiLuring($id)
    {
        // Check if the record exists
        $KntsLuring = $this->KntsLuring->find($id);
        if ($KntsLuring) {
            // Delete the record
            $this->KntsLuring->deleteById($id);
            return redirect()->to('/pendamping/pendaftaran/kontesVokasi/luring')->with('danger', 'deleted successfully');
        } else {
            return redirect()->to('/pendamping/pendaftaran/kontesVokasi/luring')->with('status', 'Record not found');
        }
    }
}
