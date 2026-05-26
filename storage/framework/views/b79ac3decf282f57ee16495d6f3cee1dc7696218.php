<?php $__env->startSection('title', 'Katalog Buku'); ?>
<?php $__env->startSection('page_title', 'Katalog Buku'); ?>

<?php $__env->startSection('content'); ?>
<div class="catalog-highlights">
    <section class="highlight-panel">
        <div class="section-head">
            <div>
                <p class="eyebrow">Pilihan Pembaca</p>
                <h2>Buku Favorit</h2>
            </div>
        </div>
        <div class="mini-book-row">
            <?php $__empty_1 = true; $__currentLoopData = $favoriteBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a class="mini-book" href="<?php echo e(route('books.show', $book)); ?>">
                    <img src="<?php echo e(route('books.cover', $book)); ?>" alt="Sampul <?php echo e($book->title); ?>">
                    <span><?php echo e($book->title); ?></span>
                    <small><?php echo e($book->category); ?></small>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="muted">Belum ada buku favorit.</p>
            <?php endif; ?>
        </div>
    </section>

    <section class="highlight-panel">
        <div class="section-head">
            <div>
                <p class="eyebrow">Aktivitas</p>
                <h2>Paling Sering Dipinjam</h2>
            </div>
        </div>
        <div class="borrow-list">
            <?php $__empty_1 = true; $__currentLoopData = $mostBorrowedBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="<?php echo e(route('books.show', $book)); ?>">
                    <span><?php echo e($loop->iteration); ?></span>
                    <div>
                        <strong><?php echo e($book->title); ?></strong>
                        <small><?php echo e($book->loans_count); ?> kali dipinjam</small>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="muted">Belum ada data peminjaman.</p>
            <?php endif; ?>
        </div>
    </section>
</div>

<div class="collection-heading">
    <div>
        <p class="eyebrow">Rak Koleksi</p>
        <h2>Semua Buku</h2>
    </div>
</div>

<div class="page-actions catalog-tools">
    <form class="search" action="<?php echo e(route('books.index')); ?>" method="get">
        <input type="search" name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari judul, penulis, kategori, ISBN">
        <button class="btn secondary" type="submit">Cari</button>
    </form>
    <?php if(auth()->user()->isStaff()): ?>
        <a class="btn" href="<?php echo e(route('books.create')); ?>">Tambah Buku</a>
    <?php endif; ?>
</div>

<div class="book-grid">
    <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <article class="book-card">
            <a href="<?php echo e(route('books.show', $book)); ?>">
                <img class="book-cover" src="<?php echo e(route('books.cover', $book)); ?>" alt="Sampul <?php echo e($book->title); ?>">
            </a>
            <div class="book-card-body">
                <span class="badge"><?php echo e($book->category ?: 'Umum'); ?></span>
                <h2><?php echo e($book->title); ?></h2>
                <p class="muted"><?php echo e($book->author); ?></p>
                <p>Stok: <strong><?php echo e($book->stock); ?></strong></p>
                <div class="table-actions">
                    <a class="btn secondary" href="<?php echo e(route('books.show', $book)); ?>">Detail</a>
                    <?php if(auth()->user()->isStaff()): ?>
                        <a class="btn secondary" href="<?php echo e(route('books.edit', $book)); ?>">Edit</a>
                        <form action="<?php echo e(route('books.destroy', $book)); ?>" method="post" onsubmit="return confirm('Hapus buku ini?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button class="btn danger" type="submit">Hapus</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </article>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="card">Buku belum tersedia.</div>
    <?php endif; ?>
</div>
<div class="pagination"><?php echo e($books->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\mpiiittt\perpustakaan-laravel\resources\views/books/index.blade.php ENDPATH**/ ?>