<?php

namespace App\Controllers;

class Lomba extends BaseController
{
    public function index(): string
    {
        return view('konten/admin/lomba/index');
    }
}
