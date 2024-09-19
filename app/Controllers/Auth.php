<?php

namespace App\Controllers;

use Ramsey\Uuid\Uuid;

use App\Models\AuthModel;
use App\Models\Admin\PtModel;
use App\Models\Admin\UsersModel;

class Auth extends BaseController
{
    protected $Auth;
    protected $db;
    protected $session;
    protected $ptModel;
    protected $User;


    public function __construct()
    {
        // Initialize models and services
        $this->Auth = new AuthModel();
        $this->User = new UsersModel();
        $this->ptModel = new PtModel();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        // Check if user is already logged in
        if (session()->get('logged_in')) {
            return redirect()->to(strtolower(session()->get('role')) . '/dashboard');
        } else {
            // Fetch all institutions
            $data['title'] = "Halaman Login - AITECVI-POLINELA";
            $data['errors'] = session('errors'); // Pass any errors to the view

            return view('auth/index', $data); // Render the login view
        }
    }
    public function register()
    {

        $data['pt_id'] = $this->ptModel->findAll(); // Fetch all institutions
        $data['errors'] = session('errors'); // Pass any errors to the view

        return view('auth/register', $data); // Render the login view

    }
    public function registerPost()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'username' => 'required',
            'email' => 'required|valid_email',
            'pt_id' => 'required',
        ], [
            'username' => [
                'required' => 'Kolom username harus diisi.'
            ],
            'email' => [
                'required' => 'Kolom email harus diisi.',
                'valid_email' => 'Masukkan alamat email yang valid.'
            ],

        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        // dd($validation);
        $password = hash('sha256', sha1($this->request->getPost('password')));
        if (empty($password)) {
            $password = hash('sha256', sha1('123456'));
        }

        $data = [
            'id' => Uuid::uuid4()->toString(),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'pt_id' => $this->request->getPost('pt_id'),

            'role_id' => 3,

            'password' => $password,
        ];

        $this->User->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to('/verification_pending')->with('username', $this->request->getPost('username'));
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data.');
        }

        return redirect()->to('/verification_pending');
    }



    public function verification()
    {
        $username = session()->getFlashdata('username');
        return view('auth/verifikasi', ['username' => $username]);
    }


    public function checkAuth()
    {
        // Validasi input fields
        $validation = $this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Username atau Email tidak boleh kosong'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Password tidak boleh kosong'
                ]
            ],
        ]);

        // Jika validasi gagal, kembalikan dengan error
        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // Periksa kredensial user
        $user = $this->Auth->checkUser($this->request->getPost('username'), $this->request->getPost('password'));
        $session = session();

        // Jika user ditemukan
        if ($user) {
            // Cek apakah akun aktif
            if ($user->status == 0) {
                return redirect()->to('/loginn')->with('error', 'Akun Anda belum aktif.');
            }

            // Jika akun aktif, simpan data sesi
            session()->setFlashdata('primary', 'Hello.... Selamat Datang');

            // Siapkan session data
            $sessionData = [
                'data' => $user,   // Simpan objek user lengkap atau field yang diperlukan
                'role' => $user->role,
                'logged_in' => TRUE
            ];

            // Hanya role selain Admin yang menyertakan pt_id
            if ($user->role !== 'Admin') {
                $sessionData['pt_id'] = $user->pt_id;
            }

            $session->set($sessionData);

            // Redirect berdasarkan role
            switch ($user->role) {
                case 'Admin':
                    return redirect()->to('/admin/dashboard');
                case 'Juri':
                    return redirect()->to('/juri/dashboard');
                case 'Pendamping':
                    return redirect()->to('/pendamping/dashboard');
                case 'Kampus':
                    return redirect()->to('/kampus/dashboard');
                case 'Koordinator':
                    return redirect()->to('/koordinator/dashboard');
                default:
                    return redirect()->to('/');
            }
        } else {
            // Jika kredensial salah
            session()->setFlashdata('error', 'Username atau Password salah.');
            return redirect()->to('/loginn');
        }
    }



    public function logOut()
    {
        $this->session->destroy();
        return redirect()->to('/loginn');
    }


    // public function forgot()
    // {
    //     $data = [
    //         "title" => "Halaman Lupa Password - Aplikasi AITeC VI"
    //     ];
    //     return view('auth/forgot', $data);
    // }

    // public function sendPassword()
    // {
    //     $email = $this->request->getPost('email');
    //     $userModel = new UsersModel();
    
    //     // Periksa apakah email terdaftar
    //     $user = $userModel->where('email', $email)->first();
    
    //     if ($user) {
    //         // Generate token reset password
    //         $token = bin2hex(random_bytes(50));
    
    //         // Update token reset password
    //         $updateData = ['reset_token' => $token];
    
    //         if (empty($updateData['reset_token'])) {
    //             log_message('error', 'Token kosong, tidak dapat memperbarui data.');
    //             return redirect()->to('/auth/forgot')->with('error', 'Gagal memperbarui token.');
    //         }
    
    //         $userModel->update($user['id'], $updateData);
    
    //         // URL reset password
    //         $resetLink = base_url("/auth/reset-password/$token");
    
    //         // Kirim email dengan link reset password
    //         $emailService = \Config\Services::email();
    //         $emailService->setTo($email);
    //         $emailService->setSubject('Reset Password');
    //         $emailService->setMessage("Klik link berikut untuk mereset password Anda: <a href='$resetLink'>Reset Password</a>");
    
    //         // Cek apakah email berhasil dikirim
    //         if ($emailService->send()) {
    //             return redirect()->to('/auth/forgot')->with('success', 'Link reset password telah dikirim ke email Anda.');
    //         } else {
    //             // Tampilkan pesan kesalahan
    //             $data = $emailService->printDebugger(['headers']);
    //             return redirect()->to('/auth/forgot')->with('error', 'Gagal mengirim email: ' . $data);
    //         }
    //     } else {
    //         return redirect()->to('/auth/forgot')->with('error', 'Email tidak terdaftar.');
    //     }
    // }
    


    // // Method untuk menampilkan form reset password
    // public function resetPassword($token)
    // {
    //     $data['token'] = $token;
    //     return view('auth/reset_password', $data);
    // }

    // // Method untuk menangani reset password
    // public function updatePassword()
    // {
    //     $token = $this->request->getPost('token');
    //     $password = $this->request->getPost('password');
    //     $userModel = new UsersModel();

    //     // Cari user berdasarkan token
    //     $user = $userModel->where('reset_token', $token)->first();
    //     // dd($validation);
    //     $password = hash('sha256', sha1($this->request->getPost('password')));
    //     if (empty($password)) {
    //         $password = hash('sha256', sha1('123456'));
    //     }

    //     if ($user) {
    //         // Update password
    //         $userModel->update($user['id'], [
    //             'password' => $password,
    //             'reset_token' => null
    //         ]);
    //         return redirect()->to('/loginn')->with('success', 'Password berhasil di ubah. Silahkan login.');
    //     } else {
    //         return redirect()->to('/auth/forgot')->with('error', 'Token tidak valid.');
    //     }
    // }
}
