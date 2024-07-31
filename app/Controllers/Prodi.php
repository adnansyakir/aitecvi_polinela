<?php

namespace App\Controllers;

class Prodi extends BaseController
{
    public function index(): string
    {
        return view('konten/admin/prodi/index');
    }
}
