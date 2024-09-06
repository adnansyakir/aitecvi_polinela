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

    public function __construct()
    {
        // Initialize models and services
        $this->Auth = new AuthModel();
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
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'pt_id' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/register')->withInput()->with('error', $validation->listErrors());
        }

        $userModel = new AuthModel();

        // Hash the password securely using bcrypt
        $password_hash = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);

        $userData = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $password_hash,
            'pt_id' => $this->request->getPost('pt_id'),
            'role_id' => '3',  // Assuming '1' is a valid role ID
            'status' => '0',  // Assuming '1' means the user is active
        ];

        $userModel->save($userData);
        // Save user to the database

        // Redirect to verification page with a custom message
        return redirect()->to('/verification_pending')->with('username', $this->request->getPost('username'));
    }

    public function verification()
    {
        $username = session()->getFlashdata('username');
        return view('auth/verifikasi', ['username' => $username]);
    }


    public function checkAuth()
    {
        // dd($this->request->getPost());
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
        // dd($validation);

        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();

            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $user = $this->Auth->checkUser($this->request->getPost('username'), $this->request->getPost('password'));
        $session = session();
        // dd($user);
        if ($user) {

            // hash('sha256', sha1('pw'))

            session()->setFlashdata('primary', 'Hello.... Selamat Datang');
            // dd($user);
            switch ($user->role) {
                case 'Admin':
                    if ($user->status == 0) {
                        return redirect()->to('/loginn')->with('error', 'Akun Anda belum aktif.');
                    } else {
                        $session->set('data', $user);
                        $session->set('role', $user->role);
                        $session->set([
                            'logged_in' => TRUE
                        ]);
                        return redirect()->to('/admin/dashboard');
                    }
                    break;
                case 'Juri':
                    if ($user->status == 0) {
                        return redirect()->to('/loginn')->with('error', 'Akun Anda belum aktif.');
                    } else {
                        $session->set('data', $user);
                        $session->set('role', $user->role);
                        $session->set([
                            'logged_in' => TRUE
                        ]);
                        return redirect()->to('/juri/dashboard');
                    }
                    break;
                case 'Pendamping':
                    if ($user->status == 0) {
                        return redirect()->to('/loginn')->with('error', 'Akun Anda belum aktif.');
                    } else {
                        $session->set('data', $user);
                        $session->set('role', $user->role);
                        $session->set([
                            'logged_in' => TRUE
                        ]);
                        return redirect()->to('/pendamping/dashboard');
                    }
                    break;
                case 'Kampus':
                    if ($user->status == 0) {
                        return redirect()->to('/loginn')->with('error', 'Akun Anda belum aktif.');
                    } else {
                        $session->set('data', $user);
                        $session->set('role', $user->role);
                        $session->set([
                            'logged_in' => TRUE
                        ]);
                        return redirect()->to('/kampus/dashboard');
                    }
                    break;
                case 'Koordinator':
                    if ($user->status == 0) {
                        return redirect()->to('/loginn')->with('error', 'Akun Anda belum aktif.');
                    } else {
                        $session->set('data', $user);
                        $session->set('role', $user->role);
                        $session->set([
                            'logged_in' => TRUE
                        ]);
                        return redirect()->to('/koordinator/dashboard');
                    }
                    break;
                default:
                    return redirect()->to('/');
            }
            // tambahkan ini
            return redirect()->to('/');
        } else {
            // Kasus jika username tidak ditemukan atau password salah
            session()->setFlashdata('error', 'Username atau Password salah.');
            return redirect()->to('/loginn');
        }
    }

    public function logOut()
    {
        $this->session->destroy();
        return redirect()->to('/loginn');
    }
}
