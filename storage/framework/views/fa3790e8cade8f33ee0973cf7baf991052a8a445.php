<?php $__env->startSection('title', $book->title); ?>
<?php $__env->startSection('page_title', 'Detail Buku'); ?>

<?php $__env->startSection('content'); ?>
<article class="card">
    <div class="book-detail">
        <img class="book-detail-cover" src="<?php echo e(route('books.cover', $book)); ?>" alt="Sampul <?php echo e($book->title); ?>">
        <div>
            <div class="book-head">
                <div>
                    <p class="eyebrow"><?php echo e($book->category ?: 'Umum'); ?></p>
                    <h2><?php echo e($book->title); ?></h2>
                    <p class="muted">Oleh <?php echo e($book->author); ?> <?php echo e($book->year ? '('.$book->year.')' : ''); ?></p>
                </div>
                <span class="badge">Stok <?php echo e($book->stock); ?></span>
            </div>
            <p><?php echo e($book->description ?: 'Belum ada deskripsi.'); ?></p>
            <p class="muted">Penerbit: <?php echo e($book->publisher ?: '-'); ?> | ISBN: <?php echo e($book->isbn ?: '-'); ?></p>
            <div class="rating-summary">
                <strong><?php echo e($averageRating ?: '-'); ?></strong>
                <span class="star-display">
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <span class="<?php echo e($averageRating >= $i ? 'active' : ''); ?>">&#9733;</span>
                    <?php endfor; ?>
                </span>
                <small><?php echo e($book->reviews->count()); ?> ulasan</small>
            </div>
            <div class="table-actions">
                <?php if(! auth()->user()->isStaff()): ?>
                    <form action="<?php echo e(route('books.borrow', $book)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <button class="btn" type="submit" <?php echo e($book->stock < 1 ? 'disabled' : ''); ?>>Ajukan Pinjam</button>
                    </form>
                <?php endif; ?>
                <a class="btn secondary" href="<?php echo e(route('books.index')); ?>">Kembali</a>
            </div>
        </div>
    </div>
</article>

<section class="review-layout single">
    <article class="card review-list-card">
        <div class="section-head">
            <div>
                <p class="eyebrow">Dari Pembaca</p>
                <h2>Ulasan Terbaru</h2>
            </div>
        </div>
        <div class="review-list">
            <?php $__empty_1 = true; $__currentLoopData = $book->reviews->sortByDesc('created_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="review-item">
                    <div>
                        <strong><?php echo e($review->user->name); ?></strong>
                        <span class="star-display">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <span class="<?php echo e($review->rating >= $i ? 'active' : ''); ?>">&#9733;</span>
                            <?php endfor; ?>
                        </span>
                    </div>
                    <p><?php echo e($review->comment ?: 'Tidak ada komentar.'); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="empty-state">
                    <strong>Belum ada ulasan.</strong>
                    <p class="muted">Jadilah pembaca pertama yang memberi rating.</p>
                </div>
            <?php endif; ?>
        </div>
    </article>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\mpiiittt\perpustakaan-laravel\resources\views/books/show.blade.php ENDPATH**/ ?>