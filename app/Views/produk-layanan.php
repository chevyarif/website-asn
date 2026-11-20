<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produk & Layanan | Nama Perusahaan</title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
</head>

<body>
<?php include __DIR__ . '/includes/header.php'; ?>
<main>
    <section class="page-banner">
        <div class="container">
            <span class="eyebrow light">SOLUSI KAMI</span>
            <h1>Produk &amp; Layanan</h1>
            <p>Temukan pilihan produk dan layanan untuk mendukung kebutuhan Anda.</p>
        </div>
    </section>
    <section class="container section">
        <div class="cards three products">
            <article>
                <img src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&w=900&q=80" alt="Konsultasi">
                <h2>Konsultasi &amp; Perencanaan</h2>
                <p>Pendampingan untuk memahami kebutuhan dan menentukan langkah yang tepat.</p>
                <a class="link" href="<?= base_url('kontak') ?>">Tanyakan layanan &rarr;</a>
            </article>
            <article>
                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=900&q=80" alt="Solusi bisnis">
                <h2>Solusi Profesional</h2>
                <p>Solusi yang disesuaikan dengan kebutuhan operasional dan tujuan bisnis.</p>
                <a class="link" href="<?= base_url('kontak') ?>">Tanyakan layanan &rarr;</a>
            </article>
            <article>
                <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=900&q=80" alt="Kemitraan">
                <h2>Dukungan &amp; Kemitraan</h2>
                <p>Membangun kolaborasi yang kuat untuk hasil berkelanjutan.</p>
                <a class="link" href="<?= base_url('kontak') ?>">Tanyakan layanan &rarr;</a>
            </article>
        </div>
    </section>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
</body>

</html>