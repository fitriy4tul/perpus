<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('page_title', 'Dashboard Perpustakaan'); ?>

<?php $__env->startSection('content'); ?>
<section class="dashboard-hero">
    <div>
        <p class="eyebrow">Perpustakaan MPIT</p>
        <h2>Selamat datang, <?php echo e(auth()->user()->name); ?></h2>
        <p><?php echo e(auth()->user()->isStaff() ? 'Pantau koleksi, peminjaman, dan aktivitas perpustakaan dari satu tempat.' : 'Cari buku, ajukan peminjaman, dan pantau buku yang sedang kamu baca.'); ?></p>
    </div>
    <div class="hero-actions">
        <a class="btn" href="<?php echo e(route('books.index')); ?>">Buka Katalog</a>
        <?php if(auth()->user()->isStaff()): ?>
            <a class="btn secondary" href="<?php echo e(route('loans.index')); ?>">Kelola Pinjam</a>
        <?php else: ?>
            <a class="btn secondary" href="<?php echo e(route('returns.index')); ?>">Buku Saya</a>
        <?php endif; ?>
    </div>
</section>

<section class="grid stats">
    <div class="card stat-card"><span class="muted">Total Buku</span><p class="stat-number"><?php echo e($stats['books']); ?></p><small>Koleksi tercatat</small></div>
    <div class="card stat-card"><span class="muted">Stok Tersedia</span><p class="stat-number"><?php echo e($stats['available_books']); ?></p><small>Siap dipinjam</small></div>
    <div class="card stat-card"><span class="muted"><?php echo e(auth()->user()->isStaff() ? 'Dipinjam' : 'Buku Saya Pinjam'); ?></span><p class="stat-number"><?php echo e($stats['active_loans']); ?></p><small>Sedang aktif</small></div>
    <div class="card stat-card"><span class="muted"><?php echo e(auth()->user()->isStaff() ? 'Menunggu' : 'Pengajuan Saya'); ?></span><p class="stat-number"><?php echo e($stats['pending_loans']); ?></p><small>Perlu tindak lanjut</small></div>
    <?php if(auth()->user()->isStaff()): ?>
        <div class="card stat-card"><span class="muted">Pengguna</span><p class="stat-number"><?php echo e($stats['users']); ?></p><small>Akun terdaftar</small></div>
    <?php endif; ?>
</section>

<section class="dashboard-workspace">
    <div class="card activity-card">
        <div class="page-actions">
            <div>
                <h2><?php echo e(auth()->user()->isStaff() ? 'Transaksi Terbaru' : 'Aktivitas Saya'); ?></h2>
                <p class="muted">
                    <?php echo e(auth()->user()->isStaff() ? 'Aktivitas peminjaman paling baru di perpustakaan.' : 'Riwayat pengajuan dan peminjaman buku Anda.'); ?>

                </p>
            </div>
            <?php if(auth()->user()->isStaff()): ?>
                <a class="btn secondary" href="<?php echo e(route('loans.index')); ?>">Lihat Semua</a>
            <?php else: ?>
                <a class="btn secondary" href="<?php echo e(route('books.index')); ?>">Cari Buku</a>
            <?php endif; ?>
        </div>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Anggota</th>
                        <th>Buku</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $recentLoans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loan->user->name); ?></td>
                            <td><?php echo e($loan->book->title); ?></td>
                            <td><span class="badge"><?php echo e(ucfirst($loan->status)); ?></span></td>
                            <td><?php echo e($loan->created_at->format('d M Y')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="4">Belum ada transaksi.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <aside class="card quick-card">
        <div>
            <p class="eyebrow">Akses Cepat</p>
            <h2>Mulai dari sini</h2>
        </div>
        <a href="<?php echo e(route('books.index')); ?>"><span>01</span><strong>Katalog Buku</strong><small>Cari dan buka detail koleksi</small></a>
        <?php if(auth()->user()->isStaff()): ?>
            <a href="<?php echo e(route('books.create')); ?>"><span>02</span><strong>Tambah Buku</strong><small>Masukkan koleksi baru</small></a>
            <a href="<?php echo e(route('loans.index')); ?>"><span>03</span><strong>Validasi Pinjam</strong><small>Setujui atau tolak pengajuan</small></a>
        <?php else: ?>
            <a href="<?php echo e(route('returns.index')); ?>"><span>02</span><strong>Pengembalian</strong><small>Lihat buku yang sedang dipinjam</small></a>
            <a href="<?php echo e(route('pages.contact')); ?>"><span>03</span><strong>Bantuan</strong><small>Hubungi petugas perpustakaan</small></a>
        <?php endif; ?>
    </aside>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\mpiiittt\perpustakaan-laravel\resources\views/dashboard.blade.php ENDPATH**/ ?>