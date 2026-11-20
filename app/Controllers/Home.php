<?= $this->include('layout/header') ?>
<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }
}
<?= $this->include('layout/footer') ?>
