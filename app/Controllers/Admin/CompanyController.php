<?php

namespace App\Controllers\Admin;

use App\Models\ProfilPerusahaanModel;
use App\Models\TentangKamiModel;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\RESTful\ResourceController;

class CompanyController extends ResourceController
{
    protected $format = 'json';

    protected function aboutModel(): TentangKamiModel
    {
        return new TentangKamiModel();
    }

    protected function companyModel(): ProfilPerusahaanModel
    {
        return new ProfilPerusahaanModel();
    }

    protected function normalizeSettingPayload(array $payload, string $prefix, ?array $existing = null): array
    {
        $kunci = trim((string) ($payload['kunci'] ?? $payload['key'] ?? $existing['kunci'] ?? ''));

        if ($kunci === '') {
            $namaField = trim((string) ($payload['nama'] ?? $payload['judul'] ?? $prefix));
            $slugField = url_title($namaField, '_', true);
            $kunci     = str_starts_with($slugField, $prefix) ? $slugField : $prefix . $slugField;
        }

        if (array_key_exists('nilai', $payload)) {
            $nilai = is_array($payload['nilai']) ? json_encode($payload['nilai']) : (string) $payload['nilai'];
        } elseif (array_key_exists('value', $payload)) {
            $nilai = is_array($payload['value']) ? json_encode($payload['value']) : (string) $payload['value'];
        } else {
            $copy = $payload;
            unset($copy['kunci'], $copy['key'], $copy['id']);
            $nilai = count($copy) === 1
                ? (string) reset($copy)
                : json_encode($copy);
        }

        return [
            'kunci' => $kunci,
            'nilai' => $nilai,
        ];
    }

    // --- TENTANG KAMI ---

    public function aboutIndex()
    {
        $data = $this->aboutModel()
            ->like('kunci', 'tentang', 'after')
            ->orLike('kunci', 'about', 'after')
            ->orderBy('id', 'ASC')
            ->findAll();

        return $this->respond([
            'status' => 'success',
            'total'  => count($data),
            'data'   => $data,
        ]);
    }

    public function aboutShow($id = null)
    {
        $item = $this->aboutModel()->find($id);
        if (! $item) {
            return $this->failNotFound('Data tentang kami tidak ditemukan.');
        }

        return $this->respond(['status' => 'success', 'data' => $item]);
    }

    public function aboutCreate()
    {
        $payload = $this->request->getJSON(true) ?? $this->request->getPost() ?? [];
        $data    = $this->normalizeSettingPayload($payload, 'tentang_');

        try {
            $id = $this->aboutModel()->insert($data, true);
            if (! $id) {
                return $this->failValidationErrors($this->aboutModel()->errors());
            }
        } catch (DatabaseException $e) {
            return $this->fail('Kunci pengaturan tentang kami sudah digunakan.', 409);
        }

        return $this->respondCreated([
            'status'  => 'success',
            'message' => 'Data tentang kami berhasil disimpan.',
            'data'    => $this->aboutModel()->find($id),
        ]);
    }

    public function aboutUpdate($id = null)
    {
        $model    = $this->aboutModel();
        $existing = $model->find($id);
        if (! $existing) {
            return $this->failNotFound('Data tentang kami tidak ditemukan.');
        }

        $payload = $this->request->getJSON(true) ?? $this->request->getRawInput() ?? [];
        $data    = $this->normalizeSettingPayload($payload, 'tentang_', $existing);

        try {
            if (! $model->update($id, $data)) {
                return $this->failValidationErrors($model->errors());
            }
        } catch (DatabaseException $e) {
            return $this->fail('Kunci pengaturan tentang kami sudah digunakan.', 409);
        }

        return $this->respond([
            'status'  => 'success',
            'message' => 'Data tentang kami berhasil diperbarui.',
            'data'    => $model->find($id),
        ]);
    }

    public function aboutDelete($id = null)
    {
        $model    = $this->aboutModel();
        $existing = $model->find($id);
        if (! $existing) {
            return $this->failNotFound('Data tentang kami tidak ditemukan.');
        }

        $model->delete($id);

        return $this->respondDeleted([
            'status'  => 'success',
            'message' => 'Data tentang kami berhasil dihapus.',
        ]);
    }

    // --- PROFIL PERUSAHAAN ---

    public function profileIndex()
    {
        $data = $this->companyModel()
            ->like('kunci', 'profil', 'after')
            ->orLike('kunci', 'perusahaan', 'after')
            ->orLike('kunci', 'company', 'after')
            ->orderBy('id', 'ASC')
            ->findAll();

        return $this->respond([
            'status' => 'success',
            'total'  => count($data),
            'data'   => $data,
        ]);
    }

    public function profileShow($id = null)
    {
        $item = $this->companyModel()->find($id);
        if (! $item) {
            return $this->failNotFound('Data profil perusahaan tidak ditemukan.');
        }

        return $this->respond(['status' => 'success', 'data' => $item]);
    }

    public function profileCreate()
    {
        $payload = $this->request->getJSON(true) ?? $this->request->getPost() ?? [];
        $data    = $this->normalizeSettingPayload($payload, 'profil_');

        try {
            $id = $this->companyModel()->insert($data, true);
            if (! $id) {
                return $this->failValidationErrors($this->companyModel()->errors());
            }
        } catch (DatabaseException $e) {
            return $this->fail('Kunci pengaturan profil perusahaan sudah digunakan.', 409);
        }

        return $this->respondCreated([
            'status'  => 'success',
            'message' => 'Data profil perusahaan berhasil disimpan.',
            'data'    => $this->companyModel()->find($id),
        ]);
    }

    public function profileUpdate($id = null)
    {
        $model    = $this->companyModel();
        $existing = $model->find($id);
        if (! $existing) {
            return $this->failNotFound('Data profil perusahaan tidak ditemukan.');
        }

        $payload = $this->request->getJSON(true) ?? $this->request->getRawInput() ?? [];
        $data    = $this->normalizeSettingPayload($payload, 'profil_', $existing);

        try {
            if (! $model->update($id, $data)) {
                return $this->failValidationErrors($model->errors());
            }
        } catch (DatabaseException $e) {
            return $this->fail('Kunci pengaturan profil perusahaan sudah digunakan.', 409);
        }

        return $this->respond([
            'status'  => 'success',
            'message' => 'Data profil perusahaan berhasil diperbarui.',
            'data'    => $model->find($id),
        ]);
    }

    public function profileDelete($id = null)
    {
        $model    = $this->companyModel();
        $existing = $model->find($id);
        if (! $existing) {
            return $this->failNotFound('Data profil perusahaan tidak ditemukan.');
        }

        $model->delete($id);

        return $this->respondDeleted([
            'status'  => 'success',
            'message' => 'Data profil perusahaan berhasil dihapus.',
        ]);
    }
}