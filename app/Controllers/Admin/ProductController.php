<?php

namespace App\Controllers\Admin;

use App\Models\ProdukModel;
use CodeIgniter\RESTful\ResourceController;

class ProductController extends ResourceController
{
    protected $modelName = ProdukModel::class;
    protected $format    = 'json';

    public function index()
    {
        $kategori = trim((string) $this->request->getGet('kategori'));
        $status   = trim((string) $this->request->getGet('status'));
        $q        = trim((string) $this->request->getGet('q'));

        $builder = $this->model;

        if ($kategori !== '') {
            $builder = $builder->where('kategori', $kategori);
        }

        if (in_array($status, ['aktif', 'nonaktif'], true)) {
            $builder = $builder->where('status', $status);
        }

        if ($q !== '') {
            $builder = $builder->groupStart()
                ->like('nama_produk', $q)
                ->orLike('deskripsi', $q)
                ->groupEnd();
        }

        $data = $builder->orderBy('id', 'DESC')->findAll();

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
            return $this->failNotFound('Produk atau layanan tidak ditemukan.');
        }

        return $this->respond([
            'status' => 'success',
            'data'   => $item,
        ]);
    }

    public function create()
    {
        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $status  = $payload['status'] ?? 'aktif';

        if (! in_array($status, ['aktif', 'nonaktif'], true)) {
            $status = 'aktif';
        }

        $data = [
            'nama_produk' => trim((string) ($payload['nama_produk'] ?? ($payload['nama'] ?? ''))),
            'deskripsi'   => $payload['deskripsi'] ?? null,
            'harga'       => (float) ($payload['harga'] ?? 0),
            'kategori'    => $payload['kategori'] ?? 'Layanan',
            'gambar'      => $payload['gambar'] ?? null,
            'status'      => $status,
        ];

        if (! $this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        $id = $this->model->getInsertID();

        return $this->respondCreated([
            'status'  => 'success',
            'message' => 'Produk / layanan berhasil ditambahkan.',
            'data'    => $this->model->find($id),
        ]);
    }

    public function update($id = null)
    {
        $existing = $this->model->find($id);
        if (! $existing) {
            return $this->failNotFound('Produk atau layanan tidak ditemukan.');
        }

        $payload = $this->request->getJSON(true) ?? $this->request->getRawInput();

        if (isset($payload['nama']) && ! isset($payload['nama_produk'])) {
            $payload['nama_produk'] = $payload['nama'];
        }

        if (isset($payload['status']) && ! in_array($payload['status'], ['aktif', 'nonaktif'], true)) {
            return $this->failValidationErrors(['status' => 'Status harus aktif atau nonaktif.']);
        }

        if (! $this->model->update($id, $payload)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respond([
            'status'  => 'success',
            'message' => 'Produk / layanan berhasil diperbarui.',
            'data'    => $this->model->find($id),
        ]);
    }

    public function delete($id = null)
    {
        $existing = $this->model->find($id);
        if (! $existing) {
            return $this->failNotFound('Produk atau layanan tidak ditemukan.');
        }

        $this->model->delete($id);

        return $this->respondDeleted([
            'status'  => 'success',
            'message' => 'Produk / layanan berhasil dihapus.',
        ]);
    }
}