<?php
namespace App\Controllers;

use App\Models\Admin\UsersModel;

class AdminProfil extends BaseController
{
    protected $user;
    protected $session;
    protected $validation;
    protected $db;

    public function __construct()
    {
        $this->cekPeran(['Admin']);
        $this->user = new UsersModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $userId = $this->session->get('data')->id; // Assuming user_id is stored in session data
        $user = $this->user->find($userId);

        $data = [
            'user' => $user,
        ];
        echo view('konten/admin/profil/index', $data);
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

        $userId = $this->session->get('data')->user_id;
        $affectedRows = $this->user->change($userId, $password);

        if ($affectedRows > 0) {
            $this->session->setFlashdata('success', 'Password berhasil diubah.');
        } else {
            $this->session->setFlashdata('error', 'Gagal mengubah password.');
        }

        return redirect()->to('/admin/profil');
    }
}

