<?php $__env->startSection('title', 'About Us'); ?>
<?php $__env->startSection('page_title', 'About Us'); ?>

<?php $__env->startSection('content'); ?>
<section class="info-hero">
    <div>
        <p class="eyebrow">Tentang Kami</p>
        <h2>Perpustakaan MPIT</h2>
        <p>Website ini dibuat untuk memudahkan anggota mencari buku, mengajukan peminjaman, serta membantu petugas mengelola koleksi dan transaksi perpustakaan secara rapi.</p>
    </div>
</section>

<section class="info-grid">
    <article class="card info-card">
        <strong>Visi</strong>
        <p class="muted">Menjadi ruang baca digital yang nyaman, mudah digunakan, dan mendukung budaya literasi.</p>
    </article>
    <article class="card info-card">
        <strong>Misi</strong>
        <p class="muted">Menyediakan katalog buku yang rapi, proses peminjaman yang jelas, dan layanan perpustakaan yang ramah.</p>
    </article>
    <article class="card info-card">
        <strong>Layanan</strong>
        <p class="muted">Katalog buku, peminjaman, pengembalian, pengelolaan koleksi, dan monitoring transaksi oleh petugas.</p>
    </article>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\mpiiittt\perpustakaan-laravel\resources\views/pages/about.blade.php ENDPATH**/ ?>