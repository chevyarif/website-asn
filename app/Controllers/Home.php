<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\GalleryModel;
use App\Models\ProdukModel;
use App\Models\ProfilPerusahaanModel;
use App\Models\TentangKamiModel;

class Home extends BaseController
{
    public function index()
    {
        $profilModel  = new ProfilPerusahaanModel();
        $produkModel  = new ProdukModel();
        $blogModel    = new BlogModel();
        $galleryModel = new GalleryModel();

        $data = [
            'title'   => 'Beranda',
            'profil'  => $profilModel->first(),
            'produk'  => $produkModel->findAll(),
            'artikel' => $blogModel->findAll(),
            'galeri'  => $galleryModel->findAll(),
        ];

        return view('index', $data);
    }

    public function about()
    {
        $tentangModel = new TentangKamiModel();
        $profilModel  = new ProfilPerusahaanModel();

        $data = [
            'title'        => 'Tentang Kami',
            'tentang_kami' => $tentangModel->first(),
            'profil'       => $profilModel->first(),
        ];

        return view('tentang-kami', $data);
    }

    public function products()
    {
        $produkModel = new ProdukModel();

        $data = [
            'title'  => 'Produk & Layanan',
            'produk' => $produkModel->findAll(),
        ];

        return view('produk-layanan', $data);
    }

    public function contact()
    {
        $profilModel = new ProfilPerusahaanModel();

        $data = [
            'title'  => 'Kontak',
            'profil' => $profilModel->first(),
        ];

        return view('kontak', $data);
    }

    public function gallery()
    {
        $galleryModel = new GalleryModel();

        $data = [
            'title'  => 'Galeri',
            'galeri' => $galleryModel->findAll(),
        ];

        return view('gallery', $data);
    }

    public function blogDetail()
    {
        $blogModel = new BlogModel();
        $id        = $this->request->getGet('id');

        $artikel = $id ? $blogModel->find($id) : $blogModel->first();

        $data = [
            'title'   => $artikel['judul'] ?? 'Detail Blog',
            'artikel' => $artikel,
        ];

        return view('blog-detail', $data);
    }
}