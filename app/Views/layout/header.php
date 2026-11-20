<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
<header class="site-header"><div class="container header-inner">
<a class="brand" href="index.php"><span class="brand-mark">CP</span><span><strong>NAMA PERUSAHAAN</strong><small>COMPANY PROFILE</small></span></a>
<nav class="desktop-nav">
<a class="<?= $currentPage==='index.php'?'active':'' ?>" href="index.php">Home</a>
<a class="<?= $currentPage==='tentang-kami.php'?'active':'' ?>" href="tentang-kami.php">Tentang Kami</a>
<a class="<?= $currentPage==='produk-layanan.php'?'active':'' ?>" href="produk-layanan.php">Produk &amp; Layanan</a>
<a class="<?= $currentPage==='gallery.php'?'active':'' ?>" href="gallery.php">Gallery</a>
<a class="<?= $currentPage==='kontak.php'?'active':'' ?>" href="kontak.php">Kontak</a></nav>
<details class="mobile-nav"><summary aria-label="Buka menu"><i></i><i></i><i></i></summary><nav>
<a href="index.php">Home</a><a href="tentang-kami.php">Tentang Kami</a><a href="produk-layanan.php">Produk &amp; Layanan</a><a href="gallery.php">Gallery</a><a href="kontak.php">Kontak</a>
</nav></details></div></header>