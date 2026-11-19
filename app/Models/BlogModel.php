<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table            = 'blog';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul',
        'slug',
        'ringkasan',
        'konten',
        'gambar',
        'status',
        'penulis_id',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'judul'  => 'required|min_length[3]|max_length[255]',
        'slug'   => 'required|min_length[3]|max_length[255]',
        'konten' => 'required',
        'status' => 'permit_empty|in_list[draft,published]',
    ];

    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}