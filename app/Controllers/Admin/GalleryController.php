<?php

namespace App\Controllers\Admin;

use App\Models\GalleryModel;
use CodeIgniter\RESTful\ResourceController;

class GalleryController extends ResourceController
{
    protected $modelName = GalleryModel::class;
    protected $format    = 'json';

    public function index()
    {
        $kategori = trim((string) $this->request->getGet('kategori'));
        $q        = trim((string) $this->request->getGet('q'));

        $builder = $this->model;

        if ($kategori !== '') {
            $builder = $builder->where('kategori', $kategori);
        }

        if ($q !== '') {
            $builder = $builder->groupStart()
                ->like('judul', $q)
                ->orLike('deskripsi', $q)
                ->groupEnd();
        }

        $data = $builder->orderBy('urutan', 'ASC')->orderBy('id', 'DESC')->findAll();

        return $this->respond([
            'status' => 'success',
            'total'  => count($data),
            'data'   => $data,
        ]);
    }

    public function show($id = null)
    {
        $item = $this->model->find($id);
        if (! $item) {
            return $this->failNotFound('Item gallery tidak ditemukan.');
        }

        return $this->respond(['status' => 'success', 'data' => $item]);
    }

    public function create()
    {
        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $data    = [
            'judul'       => $payload['judul'] ?? '',
            'deskripsi'   => $payload['deskripsi'] ?? ($payload['keterangan'] ?? null),
            'path_gambar' => $payload['path_gambar'] ?? ($payload['gambar'] ?? ''),
            'kategori'    => $payload['kategori'] ?? 'Umum',
            'urutan'      => (int) ($payload['urutan'] ?? 0),
        ];

        if (! $this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        $id = $this->model->getInsertID();

        return $this->respondCreated([
            'status'  => 'success',
            'message' => 'Item gallery berhasil ditambahkan.',
            'data'    => $this->model->find($id),
        ]);
    }

    public function update($id = null)
    {
        $existing = $this->model->find($id);
        if (! $existing) {
            return $this->failNotFound('Item gallery tidak ditemukan.');
        }

        $payload = $this->request->getJSON(true) ?? $this->request->getRawInput();

        if (isset($payload['gambar']) && ! isset($payload['path_gambar'])) {
            $payload['path_gambar'] = $payload['gambar'];
        }
        if (isset($payload['keterangan']) && ! isset($payload['deskripsi'])) {
            $payload['deskripsi'] = $payload['keterangan'];
        }

        if (! $this->model->update($id, $payload)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respond([
            'status'  => 'success',
            'message' => 'Item gallery berhasil diperbarui.',
            'data'    => $this->model->find($id),
        ]);
    }

    public function delete($id = null)
    {
        $existing = $this->model->find($id);
        if (! $existing) {
            return $this->failNotFound('Item gallery tidak ditemukan.');
        }

        $this->model->delete($id);

        return $this->respondDeleted([
            'status'  => 'success',
            'message' => 'Item gallery berhasil dihapus.',
        ]);
    }
}