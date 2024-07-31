<?php

namespace App\Controllers;

class Perguruantinggi extends BaseController
{
    public function index(): string
    {
        return view('konten/admin/perguruantinggi/index');
    }
}
