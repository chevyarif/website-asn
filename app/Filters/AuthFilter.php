<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if (! $session->get('isLoggedIn')) {
            return service('response')
                ->setStatusCode(401)
                ->setJSON([
                    'status'  => 'error',
                    'message' => 'Silakan login terlebih dahulu.',
                ]);
        }

        if (! empty($arguments) && ! in_array($session->get('role'), $arguments, true)) {
            return service('response')
                ->setStatusCode(403)
                ->setJSON([
                    'status'  => 'error',
                    'message' => 'Akses ditolak. Khusus role admin.',
                ]);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}