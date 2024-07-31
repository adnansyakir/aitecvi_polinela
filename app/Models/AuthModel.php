<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    // protected $allowedFields = ['id', 'nip', 'nama',  'prodi_id', 'jurusan_id', 'email', 'ttd', 'status'];



    public function checkUser($username, $password)
    {
        // Hash password
        $hashedPassword = hash('sha256', sha1($password));
    
        // Query ke database untuk mencari user
        $query = $this->select('users.*, role.role')
            ->join('role', 'role.id = users.role_id', 'left')
            ->where('password', $hashedPassword)
            ->groupStart()
                ->where('users.email', $username)
                ->orWhere('users.username', $username)
            ->groupEnd();
    
        // Jalankan kueri dan ambil hasilnya
        $user = $query->get()->getRow();
    
        // Periksa apakah user ditemukan
        if ($user) {
            // Jika user ditemukan, kembalikan data user
            return $user;
        }
    
        // Jika user tidak ditemukan, kembalikan null
        return null;
    }
    
    

}
