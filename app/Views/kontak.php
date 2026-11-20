<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontak | Nama Perusahaan</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body><?php include __DIR__ . '/includes/header.php'; ?><main>
        <section class="page-banner">
            <div class="container"><span class="eyebrow light">TERHUBUNG DENGAN KAMI</span>
                <h1>Kontak</h1>
                <p>Kami siap mendengar kebutuhan, pertanyaan, maupun peluang kerja sama.</p>
            </div>
        </section>
        <section class="container section contact">
            <div><span class="eyebrow">INFORMASI KONTAK</span>
                <h2>Mari Terhubung</h2>
                <p>Email: info@namaperusahaan.co.id</p>
                <p>Telepon / WhatsApp: +62 812-3456-7890</p>
                <p>Alamat: Jl. Nama Jalan No. 123, Kota, Indonesia</p>
                <p>Jam Operasional: Senin–Jumat, 08.00–17.00 WIB</p>
            </div>
            <div class="form-card">
                <h2>Kirim Pesan</h2>
                <p>Formulir ini perlu dihubungkan ke pemroses PHP agar pesan terkirim.</p>
                <form action="#" method="post"><label>Nama Lengkap<input name="nama" required></label><label>Email<input type="email" name="email" required></label><label>Subjek<input name="subjek"></label><label>Pesan<textarea name="pesan" rows="5" required></textarea></label><button class="btn" type="submit">Kirim Pesan</button></form>
            </div>
        </section>
    </main><?php include __DIR__ . '/includes/footer.php'; ?></body>

</html>