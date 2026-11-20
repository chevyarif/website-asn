<?php
$currentUri = trim(uri_string(), '/');
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Home | Nama Perusahaan') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
</head>

<body>
<?php include __DIR__ . '/layout/header.php'; ?>
<main>
    <section class="hero">
        <div class="container hero-content">
            <span class="eyebrow light">PROFESIONAL • TERPERCAYA • BERKUALITAS</span>
            <h1>Membangun Masa Depan Melalui <em>Inovasi</em> dan Kolaborasi</h1>
            <p>Kami menghadirkan produk dan layanan berkualitas dengan komitmen, profesionalisme, serta solusi yang tepat untuk setiap kebutuhan.</p>
            <a class="btn" href="<?= base_url('tentang-kami') ?>">Kenali Kami</a>
            <a class="btn outline" href="<?= base_url('kontak') ?>">Hubungi Kami</a>
        </div>
    </section>
    <section class="container section split">
        <div>
            <span class="eyebrow">TENTANG PERUSAHAAN</span>
            <h2>Partner Terbaik untuk Pertumbuhan Anda</h2>
            <p>Nama Perusahaan hadir sebagai mitra yang mengutamakan kualitas, kepercayaan, dan keberlanjutan. Dengan tim yang kompeten, kami berupaya memberikan pengalaman dan hasil terbaik bagi setiap pelanggan.</p>
            <a class="link" href="<?= base_url('tentang-kami') ?>">Selengkapnya tentang kami &rarr;</a>
        </div>
        <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e76?auto=format&fit=crop&w=1200&q=85" alt="Ruang kantor modern yang terang dengan area kerja terbuka, dinding kaca, dan tanaman hias, menciptakan suasana profesional dan kolaboratif">
    </section>
    <section class="section soft">
        <div class="container">
            <div class="center">
                <span class="eyebrow">APA YANG KAMI TAWARKAN</span>
                <h2>Produk Layanan Unggulan</h2>
            </div>
            <div class="cards three">
                <article>
                    <b>01</b>
                    <h3>Produk Berkualitas</h3>
                    <p>Pilihan produk dengan standar mutu dan perhatian pada setiap detail.</p>
                </article>
                <article>
                    <b>02</b>
                    <h3>Layanan Profesional</h3>
                    <p>Dukungan tim berpengalaman untuk kebutuhan yang beragam.</p>
                </article>
                <article>
                    <b>03</b>
                    <h3>Solusi Terintegrasi</h3>
                    <p>Pendekatan kolaboratif untuk hasil yang efektif dan berkelanjutan.</p>
                </article>
            </div>
        </div>
    </section>
    <section class="container section">
        <div class="cta">
            <h2>Mari Mulai Kerja Sama</h2>
            <p>Diskusikan kebutuhan Anda bersama tim kami.</p>
            <a class="btn white" href="<?= base_url('kontak') ?>">Hubungi Kami</a>
        </div>
    </section>
</main>
<?php include __DIR__ . '/layout/footer.php'; ?>
</body>

</html>