<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table            = 'galeri';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'judul',
        'deskripsi',
        'path_gambar',
        'kategori',
        'urutan',
    ];

    protected $validationRules = [
        'judul'       => 'required|min_length[2]|max_length[200]',
        'path_gambar' => 'required|max_length[255]',
        'urutan'      => 'permit_empty|integer',
    ];
}