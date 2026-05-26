<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Perpustakaan'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/library.css')); ?>">
</head>
<body class="<?php echo $__env->yieldContent('body_class'); ?>">
    <div class="app-shell">
        <?php if(auth()->guard()->check()): ?>
            <aside class="sidebar">
                <div class="brand">
                    <span class="brand-mark">MP</span>
                    <div>
                        <strong>MPIT Library</strong>
                        <small><?php echo e(ucfirst(auth()->user()->role)); ?></small>
                    </div>
                </div>
                <div class="sidebar-card">
                        <p>Perpustakaan MPIT</p>
                        <strong>Sistem katalog, peminjaman, dan pengembalian buku.</strong>
                    </div>
                    <nav class="nav">
                        <a href="<?php echo e(route('dashboard')); ?>" class="<?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>"><span>01</span>Dashboard</a>
                        <a href="<?php echo e(route('books.index')); ?>" class="<?php echo e(request()->routeIs('books.*') ? 'active' : ''); ?>"><span>02</span>Katalog Buku</a>
                        <a href="<?php echo e(route('loans.index')); ?>" class="<?php echo e(request()->routeIs('loans.*') ? 'active' : ''); ?>"><span>03</span><?php echo e(auth()->user()->isStaff() ? 'Peminjaman' : 'Riwayat Pinjam'); ?></a>
                        <a href="<?php echo e(route('returns.index')); ?>" class="<?php echo e(request()->routeIs('returns.*') ? 'active' : ''); ?>"><span>04</span>Pengembalian</a>
                        <?php if(auth()->user()->isAdmin()): ?>
                            <a href="<?php echo e(route('users.index')); ?>" class="<?php echo e(request()->routeIs('users.*') ? 'active' : ''); ?>"><span>05</span>Pengguna</a>
                            <a href="<?php echo e(route('categories.index')); ?>" class="<?php echo e(request()->routeIs('categories.*') ? 'active' : ''); ?>"><span>06</span>Kategori</a>
                            <a href="<?php echo e(route('admin.reviews.index')); ?>" class="<?php echo e(request()->routeIs('admin.reviews.*') ? 'active' : ''); ?>"><span>07</span>Kelola Ulasan</a>
                            <a href="<?php echo e(route('admin.reports.index')); ?>" class="<?php echo e(request()->routeIs('admin.reports.*') ? 'active' : ''); ?>"><span>08</span>Laporan PDF</a>
                        <?php endif; ?>
                        <a href="<?php echo e(route('reviews.index')); ?>" class="<?php echo e(request()->routeIs('reviews.*') ? 'active' : ''); ?>"><span>09</span>Ulasan Saya</a>
                        <a href="<?php echo e(route('pages.about')); ?>" class="<?php echo e(request()->routeIs('pages.about') ? 'active' : ''); ?>"><span>i</span>About Us</a>
                        <a href="<?php echo e(route('pages.contact')); ?>" class="<?php echo e(request()->routeIs('pages.contact') ? 'active' : ''); ?>"><span>@</span>Contact Us</a>
                        <a href="<?php echo e(route('pages.location')); ?>" class="<?php echo e(request()->routeIs('pages.location') ? 'active' : ''); ?>"><span>+</span>Lokasi</a>
                        <form action="<?php echo e(route('logout')); ?>" method="post" class="nav-logout-form">
                            <?php echo csrf_field(); ?>
                            <button class="nav-logout" type="submit"><span>x</span>Logout</button>
                        </form>
                    </nav>
                    <div class="shelf-meter">
                        <div>
                            <span>Mode akses</span>
                            <strong><?php echo e(ucfirst(auth()->user()->role)); ?></strong>
                        </div>
                        <i></i>
                    </div>
                    <div class="sidebar-note">
                        <span><?php echo e(now()->format('d M Y')); ?></span>
                        <strong><?php echo e(auth()->user()->name); ?></strong>
                    </div>
                </aside>
            <?php endif; ?>

            <main class="main">
                <?php if(auth()->guard()->check()): ?>
                    <header class="topbar">
                        <div>
                            <p class="eyebrow">Digital Library</p>
                            <h1><?php echo $__env->yieldContent('page_title', 'Perpustakaan'); ?></h1>
                        </div>
                        <div class="top-actions">
                            <div class="user-pill"><?php echo e(auth()->user()->name); ?></div>
                            <form action="<?php echo e(route('logout')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <button class="btn secondary" type="submit">Logout</button>
                            </form>
                        </div>
                    </header>
                <?php endif; ?>

                <?php if(session('success')): ?>
                    <div class="alert success"><?php echo e(session('success')); ?></div>
                <?php endif; ?>
                <?php if(session('error')): ?>
                    <div class="alert error"><?php echo e(session('error')); ?></div>
                <?php endif; ?>
                <?php if($errors->any()): ?>
                    <div class="alert error"><?php echo e($errors->first()); ?></div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </body>
    </html>
<?php /**PATH C:\mpiiittt\perpustakaan-laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>