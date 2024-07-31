<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Ramsey\Uuid\Uuid;
use App\Models\Admin\UsersModel;
use App\Models\Admin\RoleModel;


class AdminUsers extends BaseController
{

    protected $users;
    protected $role;

    protected $session;
    protected $validation;
    protected $db;

    public function __construct()
    {
        $this->cekPeran(['Admin']);
        // Inisialisasi model tahun akademik
        $this->users = new UsersModel();
        $this->role = new RoleModel();


        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->db = \Config\Database::connect();
    }



    public function users()
    {
        $data = [
            'users' => $this->users->getAllUsers(),
           
            
        ];
        echo view('konten/admin/users/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Users',
            'menu' => 'Users',
            'link_menu' => '/admin/users',
            'detail' => 'Add Users',
            'deskripsi' => 'Halaman Add Users',
            'role' => $this->role->getAllData(),
            'validation' => \Config\Services::validation(),
        ];
        return view('konten/admin/users/users-add', $data);
    }


    public function save()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'username' => 'required',
            'email' => 'required|valid_email',
            'role_id' => 'required',
        ], [
            'username' => [
                'required' => 'Kolom username harus diisi.'
            ],
            'email' => [
                'required' => 'Kolom email harus diisi.',
                'valid_email' => 'Masukkan alamat email yang valid.'
            ],
            'role_id' => [
                'required' => 'Kolom role harus dipilih.'
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $password = hash('sha256', sha1($this->request->getPost('password')));
        if (empty($password)) {
            $password = hash('sha256', sha1('123456'));
        }

        $data = [
            'id' => Uuid::uuid4()->toString(),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'role_id' => $this->request->getPost('role_id'),
            'password' => $password,
        ];

        $this->users->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to('/admin/master/users')->with('success', 'Data berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data.');
        }

        return redirect()->to('/admin/master/users');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Users',
            'menu' => 'Users',
            'link_menu' => '/admin/master/users',
            'detail' => 'Edit Users',
            'deskripsi' => 'Halaman Edit Users',
            'role' => $this->role->getAllData(),
            'validation' => \Config\Services::validation(),
            'user' => $this->users->find($id)
        ];
        return view('konten/admin/users/users-edit', $data);
    }

    public function update()
    {
        // die();
        $validation = \Config\Services::validation();

        $validation->setRules([
            'username' => 'required',
            'email' => 'required',

        ], [
            'username' => [
                'required' => 'Kolom username harus diisi.'
            ],
            'email' => [
                'required' => 'Kolom email harus diisi.',

            ],

        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            dd('asas');
        }

        $id = $this->request->getPost('id');
        $email = $this->request->getPost('email');

        $password = $this->request->getPost('password');
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $email,
            'role_id' => $this->request->getPost('role_id'),
        ];

        if (!empty($password)) {
            $hashedPassword = hash('sha256', sha1($password));
            $data['password'] = $hashedPassword;
        }

        // Temukan pengguna yang akan diperbarui
        $user = $this->users->find($id);

        if ($user) {
            // Perbarui email pengguna
            if ($this->users->update($id, $data)) {
                // Temukan users terkait dengan email pengguna
                $users = $this->users->where('email', $user['email'])->first();
                if ($users) {
                    // Perbarui email users terkait
                    $this->users->update($users['id'], ['email' => $email]);
                }
                // Redirect dengan pesan sukses
                $this->session->setFlashdata('success', 'Berhasil mengupdate.');
                return redirect()->to('/admin/master/users');
            } else {
                // Redirect dengan pesan error jika gagal memperbarui pengguna
                $this->session->setFlashdata('error', 'Gagal mengupdate');
                return redirect()->to('/admin/master/users');
                // ->with('error', 'Gagal melakukan update.');
            }
        } else {
            // Redirect dengan pesan error jika pengguna tidak ditemukan
            $this->session->setFlashdata('success', 'Pengguna tidak ditemukan');
            return redirect()->to('/admin/master/users');
        }
    }





    public function updateStatus($status, $id)
    {
        $data = [
            'status' => $status
        ];

        if ($this->users->update($id, $data)) {
            $user = $this->users->find($id);
            $userEmail = $user['email'];

            $users = $this->users->where('email', $userEmail)->first();

            if ($users) {
                $usersData = ['status' => $status];
                $this->users->update($users['id'], $usersData);
            }

            if ($status == 1) {
                $this->session->setFlashdata('success', 'Pengguna berhasil diaktifkan.');
            } else {
                $this->session->setFlashdata('success', 'Pengguna berhasil dinonaktifkan.');
            }
        } else {
            $this->session->setFlashdata('error', 'Gagal memperbarui status pengguna.');
        }

        return redirect()->to('/admin/master/users');
    }
}
