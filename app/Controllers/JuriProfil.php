<?php
namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Ramsey\Uuid\Uuid;
use App\Models\Juri\UsersModel;


class JuriProfil extends BaseController
{
    protected $user;
    protected $session;
    protected $validation;
    protected $db;

    public function __construct()
    {
        $this->cekPeran(['Juri']);
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
// dd($data);
        echo view('konten/juri/user/index', $data);
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
