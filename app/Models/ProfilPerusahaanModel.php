<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilPerusahaanModel extends Model
{
    protected $table            = 'pengaturan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'kunci',
        'nilai',
    ];
}