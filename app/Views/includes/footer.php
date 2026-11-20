<footer class="site-footer">
    <div class="container footer-inner">
        <div>
            <strong><?= esc($profil['nama_perusahaan'] ?? 'NAMA PERUSAHAAN') ?></strong>
            <p><?= esc($profil['deskripsi_singkat'] ?? 'Membangun masa depan melalui inovasi dan kolaborasi.') ?></p>
        </div>

        <nav class="footer-nav">
            <a href="<?= base_url() ?>">Home</a>
            <a href="<?= base_url('tentang-kami') ?>">Tentang Kami</a>
            <a href="<?= base_url('produk-layanan') ?>">Produk Layanan</a>
            <a href="<?= base_url('gallery') ?>">Gallery</a>
            <a href="<?= base_url('kontak') ?>">Kontak</a>
        </nav>

        <div class="footer-copy">
            <small>&copy; <?= date('Y') ?> <?= esc($profil['nama_perusahaan'] ?? 'Nama Perusahaan') ?>. All rights reserved.</small>
        </div>
    </div>
</footer>