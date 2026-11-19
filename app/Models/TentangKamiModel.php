<?php

namespace App\Models;

use CodeIgniter\Model;

class TentangKamiModel extends Model
{
    protected $table            = 'tentang_kami';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'judul',
        'visi',
        'misi',
        'nilai_inti',
        'sejarah',
        'updated_at',
    ];
    protected $useTimestamps    = true;
    protected $createdField     = '';
    protected $updatedField     = 'updated_at';
    protected $validationRules  = [
        'judul' => 'required|min_length[2]|max_length[180]',
        'visi'  => 'required|min_length[3]',
        'misi'  => 'required|min_length[3]',
    ];
}