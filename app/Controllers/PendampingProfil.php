<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Ramsey\Uuid\Uuid;
use App\Models\Pendamping\UsersModel;

class PendampingProfil extends BaseController
{
    protected $user;
    protected $session;
    protected $validation;
    protected $db;


    public function __construct()
    {
        $this->cekPeran(['Pendamping']);
        $this->user = new UsersModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $userId = $this->session->get('data')->id;

        // Temukan data user berdasarkan user_id
        $user = $this->user->find($userId);

        // Ambil nama PT berdasarkan pt_id yang ada di data user (akses sebagai array)
        $ptModel = new \App\Models\Admin\PtModel(); // Pastikan model ini sesuai dengan model yang Anda gunakan
        $pt = $ptModel->find($user['pt_id']); // Ubah ke notasi array

        // Tambahkan data PT ke data yang dikirim ke view
        $data = [
            'user' => $user,
            'pt' => $pt,
        ];

        // Tampilkan view dengan data yang sudah disiapkan
        echo view('konten/pendamping/user/index', $data);
    }

    public function changePassword()
    {
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirmPassword');

        if ($password !== $confirmPassword) {
            $this->session->setFlashdata('error', 'Password Tidak Sama.');
            return redirect()->back();
        }

        if (strlen($password) < 8) {
            $this->session->setFlashdata('error', 'Panjang Password Minimal 8 Karakter.');
            return redirect()->back();
        }

        $userId = session()->get('data')->user_id;
        $affectedRows = $this->user->change($userId, $password);

        if ($affectedRows > 0) {
            $this->session->setFlashdata('success', 'Password berhasil diubah.');
        } else {
            $this->session->setFlashdata('error', 'Gagal mengubah password.');
        }

        return redirect()->to('/guru/user');
    }
}
