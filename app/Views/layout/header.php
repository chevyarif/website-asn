<?php
$currentUri = trim(uri_string(), '/');
?>
<header class="site-header">
    <div class="container header-inner">
        <a class="brand" href="<?= base_url() ?>">
            <span class="brand-mark">CP</span>
            <span>
                <strong><?= esc($profil['nama_perusahaan'] ?? 'NAMA PERUSAHAAN') ?></strong>
                <small>COMPANY PROFILE</small>
            </span>
        </a>

        <nav class="desktop-nav">
            <a class="<?= $currentUri === '' ? 'active' : '' ?>" href="<?= base_url() ?>">Home</a>
            <a class="<?= $currentUri === 'tentang-kami' ? 'active' : '' ?>" href="<?= base_url('tentang-kami') ?>">Tentang Kami</a>
            <a class="<?= $currentUri === 'produk-layanan' ? 'active' : '' ?>" href="<?= base_url('produk-layanan') ?>">Produk Layanan</a>
            <a class="<?= $currentUri === 'gallery' ? 'active' : '' ?>" href="<?= base_url('gallery') ?>">Gallery</a>
            <a class="<?= $currentUri === 'kontak' ? 'active' : '' ?>" href="<?= base_url('kontak') ?>">Kontak</a>
        </nav>

        <details class="mobile-nav">
            <summary aria-label="Buka menu"><i></i><i></i><i></i></summary>
            <nav>
                <a class="<?= $currentUri === '' ? 'active' : '' ?>" href="<?= base_url() ?>">Home</a>
                <a class="<?= $currentUri === 'tentang-kami' ? 'active' : '' ?>" href="<?= base_url('tentang-kami') ?>">Tentang Kami</a>
                <a class="<?= $currentUri === 'produk-layanan' ? 'active' : '' ?>" href="<?= base_url('produk-layanan') ?>">Produk &amp; Layanan</a>
                <a class="<?= $currentUri === 'gallery' ? 'active' : '' ?>" href="<?= base_url('gallery') ?>">Gallery</a>
                <a class="<?= $currentUri === 'kontak' ? 'active' : '' ?>" href="<?= base_url('kontak') ?>">Kontak</a>
            </nav>
        </details>
    </div>
</header>