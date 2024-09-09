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

    // public function registerPost()
    // {
    //     $validation = \Config\Services::validation();

    //     $validation->setRules([
    //         'username' => 'required',
    //         'email' => 'required|valid_email|is_unique[users.email]',
    //         'password' => 'required|min_length[8]',
    //         'pt_id' => 'required',
    //     ]);

    //     if (!$validation->withRequest($this->request)->run()) {
    //         return redirect()->to('/register')->withInput()->with('error', $validation->listErrors());
    //     }
    //     //    dd($validation);

    //     $userModel = new AuthModel();

    //     // Hash the password securely using bcrypt
    //     $password = hash('sha256', sha1($this->request->getPost('password')));
    //     if (empty($password)) {
    //         $password = hash('sha256', sha1('123456'));
    //     }
    //     $userData = [
    //         'id' => Uuid::uuid4()->toString(),
    //         'username' => $this->request->getPost('username'),
    //         'email' => $this->request->getPost('email'),
    //         'password' => $password,
    //         'pt_id' => $this->request->getPost('pt_id'),
    //         'role_id' => '3',  // Assuming '1' is a valid role ID
    //         'status' => '0',  // Assuming '1' means the user is active
    //     ];

    //     $userModel->save($userData);
    //     // Save user to the database

    //     // Redirect to verification page with a custom message
    //     return redirect()->to('/verification_pending')->with('username', $this->request->getPost('username'));
    // }

    public function verification()
    {
        $username = session()->getFlashdata('username');
        return view('auth/verifikasi', ['username' => $username]);
    }


    public function checkAuth()
    {
        // Validate input fields
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
    
        // If validation fails, return with errors
        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }
    
        // Check user credentials
        $user = $this->Auth->checkUser($this->request->getPost('username'), $this->request->getPost('password'));
        $session = session();
    
        if ($user) {
            // Welcome message
            session()->setFlashdata('primary', 'Hello.... Selamat Datang');
    
            // Store session data, including pt_id
            $sessionData = [
                'data' => $user,   // Store the full user object or just the required fields
                'role' => $user->role,
                'pt_id' => $user->pt_id,  // Include pt_id in the session
                'logged_in' => TRUE
            ];
            
            $session->set($sessionData);
    
           
            switch ($user->role) {
                case 'Admin':
                    if ($user->status == 0) {
                        return redirect()->to('/loginn')->with('error', 'Akun Anda belum aktif.');
                    } else {
                        return redirect()->to('/admin/dashboard');
                    }
                    break;
                case 'Juri':
                    if ($user->status == 0) {
                        return redirect()->to('/loginn')->with('error', 'Akun Anda belum aktif.');
                    } else {
                        return redirect()->to('/juri/dashboard');
                    }
                    break;
                case 'Pendamping':
                    if ($user->status == 0) {
                        return redirect()->to('/loginn')->with('error', 'Akun Anda belum aktif.');
                    } else {
                        return redirect()->to('/pendamping/dashboard');
                    }
                    break;
                case 'Kampus':
                    if ($user->status == 0) {
                        return redirect()->to('/loginn')->with('error', 'Akun Anda belum aktif.');
                    } else {
                        return redirect()->to('/kampus/dashboard');
                    }
                    break;
                case 'Koordinator':
                    if ($user->status == 0) {
                        return redirect()->to('/loginn')->with('error', 'Akun Anda belum aktif.');
                    } else {
                        return redirect()->to('/koordinator/dashboard');
                    }
                    break;
                default:
                    return redirect()->to('/');
            }
        } else {
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
