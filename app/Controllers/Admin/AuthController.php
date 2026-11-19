<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class AuthController extends ResourceController
{
    protected $format = 'json';

    public function login()
    {
        $input    = $this->request->getJSON(true) ?? $this->request->getPost();
        $email    = trim((string) ($input['email'] ?? ''));
        $password = (string) ($input['password'] ?? '');

        if ($email === '' || $password === '') {
            return $this->failValidationErrors('Email dan password wajib diisi.');
        }

        $userModel = new UserModel();
        $user      = $userModel->where('email', $email)->first();

        if (! $user || ! password_verify($password, $user['password'])) {
            return $this->failUnauthorized('Email atau password salah.');
        }

        session()->set([
            'isLoggedIn' => true,
            'user_id'    => $user['id'],
            'nama'       => $user['nama'],
            'email'      => $user['email'],
            'role'       => $user['role'],
        ]);

        return $this->respond([
            'status'  => 'success',
            'message' => 'Login berhasil.',
            'data'    => [
                'id'    => $user['id'],
                'nama'  => $user['nama'],
                'email' => $user['email'],
                'role'  => $user['role'],
            ],
        ]);
    }

    public function me()
    {
        $session = session();

        return $this->respond([
            'status' => 'success',
            'data'   => [
                'user_id' => $session->get('user_id'),
                'nama'    => $session->get('nama'),
                'email'   => $session->get('email'),
                'role'    => $session->get('role'),
            ],
        ]);
    }

    public function logout()
    {
        session()->destroy();

        return $this->respond([
            'status'  => 'success',
            'message' => 'Logout berhasil.',
        ]);
    }
}