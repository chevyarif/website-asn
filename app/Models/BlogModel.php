<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table            = 'artikel';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $useTimestamps    = true;

    protected $allowedFields = [
        'kategori_id',
        'judul',
        'slug',
        'ringkasan',
        'isi',
        'gambar',
        'penulis',
        'status',
        'published_at',
    ];

    protected $validationRules = [
        'kategori_id' => 'required|integer',
        'judul'       => 'required|min_length[3]|max_length[200]',
        'isi'         => 'required',
        'status'      => 'permit_empty|in_list[draft,published]',
    ];
}