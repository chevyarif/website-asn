<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table            = 'gallery';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'judul',
        'kategori',
        'gambar',
        'keterangan',
        'urutan',
        'status',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $validationRules  = [
        'judul'    => 'required|min_length[2]|max_length[180]',
        'kategori' => 'required|max_length[100]',
        'gambar'   => 'required|max_length[255]',
        'urutan'   => 'permit_empty|integer',
        'status'   => 'required|in_list[aktif,nonaktif]',
    ];
}