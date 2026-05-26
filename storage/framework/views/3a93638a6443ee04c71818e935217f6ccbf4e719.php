<?php $__env->startSection('title', 'MPIT Library'); ?>
<?php $__env->startSection('body_class', 'landing-page'); ?>

<?php $__env->startSection('content'); ?>
<section class="landing-hero">
    <div class="landing-nav">
        <a class="landing-brand" href="<?php echo e(route('landing')); ?>">
            <span>MP</span>
            <strong>MPIT Library</strong>
        </a>
    </div>

    <div class="landing-content">
        <div>
            <p class="eyebrow">Perpustakaan Digital</p>
            <h1>Welcome to MPIT Digital Library</h1>
            <div class="hero-actions">
                <a class="btn landing-btn" href="<?php echo e(route('login')); ?>">Login</a>
                <a class="btn secondary landing-btn" href="<?php echo e(route('register')); ?>">Register User</a>
            </div>
        </div>
        <div class="holo-card">
            <span class="ribbon-shape"></span>
            <span class="flower-shape one"></span>
            <span class="flower-shape two"></span>
            <div class="book-stack">
                <i></i>
                <i></i>
                <i></i>
            </div>
            <strong>Digital Library</strong>
            <small>Katalog, peminjaman, pengembalian, dan bukti cetak.</small>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\mpiiittt\perpustakaan-laravel\resources\views/landing.blade.php ENDPATH**/ ?>