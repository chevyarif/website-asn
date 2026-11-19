<?php

namespace App\Controllers\Admin;

use App\Models\BlogModel;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\RESTful\ResourceController;

class BlogController extends ResourceController
{
    protected $modelName = BlogModel::class;
    protected $format    = 'json';

    public function index()
    {
        $status = trim((string) $this->request->getGet('status'));
        $q      = trim((string) $this->request->getGet('q'));

        $builder = $this->model;

        if (in_array($status, ['draft', 'published'], true)) {
            $builder = $builder->where('status', $status);
        }

        if ($q !== '') {
            $builder = $builder->groupStart()
                ->like('judul', $q)
                ->orLike('ringkasan', $q)
                ->orLike('isi', $q)
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
            return $this->failNotFound('Artikel blog tidak ditemukan.');
        }

        return $this->respond(['status' => 'success', 'data' => $item]);
    }

    public function create()
    {
        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $judul   = trim((string) ($payload['judul'] ?? ''));
        $slug    = trim((string) ($payload['slug'] ?? ''));

        if ($slug === '' && $judul !== '') {
            $slug = url_title($judul, '-', true) . '-' . time();
        }

        $status      = $payload['status'] ?? 'draft';
        $publishedAt = $payload['published_at'] ?? ($status === 'published' ? date('Y-m-d H:i:s') : null);

        $data = [
            'kategori_id'  => (int) ($payload['kategori_id'] ?? 1),
            'judul'        => $judul,
            'slug'         => $slug,
            'ringkasan'    => $payload['ringkasan'] ?? null,
            'isi'          => $payload['isi'] ?? '',
            'gambar'       => $payload['gambar'] ?? null,
            'penulis'      => $payload['penulis'] ?? (session()->get('user_nama') ?? session()->get('nama') ?? 'Admin'),
            'status'       => $status,
            'published_at' => $publishedAt,
        ];

        try {
            if (! $this->model->insert($data)) {
                return $this->failValidationErrors($this->model->errors());
            }
        } catch (DatabaseException $e) {
            return $this->fail('Slug atau data sudah digunakan.', 409);
        }

        $id = $this->model->getInsertID();

        return $this->respondCreated([
            'status'  => 'success',
            'message' => 'Artikel blog berhasil dibuat.',
            'data'    => $this->model->find($id),
        ]);
    }

    public function update($id = null)
    {
        $existing = $this->model->find($id);
        if (! $existing) {
            return $this->failNotFound('Artikel blog tidak ditemukan.');
        }

        $payload       = $this->request->getJSON(true) ?? $this->request->getRawInput();
        $payload['id'] = $id;

        if (isset($payload['konten']) && ! isset($payload['isi'])) {
            $payload['isi'] = $payload['konten'];
        }

        try {
            if (! $this->model->update($id, $payload)) {
                return $this->failValidationErrors($this->model->errors());
            }
        } catch (DatabaseException $e) {
            return $this->fail('Slug atau data sudah digunakan.', 409);
        }

        return $this->respond([
            'status'  => 'success',
            'message' => 'Artikel blog berhasil diperbarui.',
            'data'    => $this->model->find($id),
        ]);
    }

    public function delete($id = null)
    {
        $existing = $this->model->find($id);
        if (! $existing) {
            return $this->failNotFound('Artikel blog tidak ditemukan.');
        }

        $this->model->delete($id);

        return $this->respondDeleted([
            'status'  => 'success',
            'message' => 'Artikel blog berhasil dihapus.',
        ]);
    }
}