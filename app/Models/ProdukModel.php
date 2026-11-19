<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table            = 'produk';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'nama_produk',
        'kategori',
        'deskripsi',
        'harga',
        'gambar',
        'status',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $validationRules  = [
        'nama_produk' => 'required|min_length[2]|max_length[180]',
        'kategori'    => 'required|max_length[100]',
        'harga'       => 'required|numeric',
        'status'      => 'required|in_list[aktif,nonaktif]',
    ];
}