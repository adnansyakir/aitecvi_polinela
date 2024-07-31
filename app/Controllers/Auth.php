<?php

namespace App\Controllers;

use App\Models\AuthModel;
use Ramsey\Uuid\Uuid;

class Auth extends BaseController
{

    protected $Auth;
    protected $db;
    protected $session;

    public function __construct()
    {
        // Inisialisasi model tahun akademik
        $this->Auth = new AuthModel();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        // var_dump(session()->get('logged_in'));die;
        if (session()->get('logged_in')) {
            // Jika ada session 'logged_id', redirect ke dashboard berdasarkan peran (role)
            return redirect()->to(strtolower(session()->get('role')) . '/dashboard');
        } else {
            // Jika tidak ada session 'logged_id', tampilkan halaman login
            $data = [
                "title" => "Halaman Login - AITECVI-POLINELA",
                'errors' => session('errors'), // Tambahkan validation ke data
            ];
            return view('auth/index', $data);
        }
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
                        $users = $this->db->table('users')->select('juri.*, juri.nama_juri as username, users.id as user_id')
                            ->join('juri', 'juri.kode_juri = users.username')
                            ->where('username', $user->username)
                            ->get()
                            ->getRow();
                        $session->set('data', $users);
                        // $session->set('data', $user);
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
                        $users = $this->db->table('users')->select('pendamping.*, pendamping.nama_pendamping as username, users.id as user_id')
                            ->join('pendamping', 'pendamping.kode_pendamping = users.username')
                            ->where('username', $user->username)
                            ->get()
                            ->getRow();
                        $session->set('data', $users);
                        // $session->set('data', $user);
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
