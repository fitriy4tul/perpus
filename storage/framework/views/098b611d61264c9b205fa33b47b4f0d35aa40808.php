<?php $__env->startSection('title', 'Peminjaman'); ?>
<?php $__env->startSection('page_title', auth()->user()->isStaff() ? 'Kelola Peminjaman' : 'Peminjaman Saya'); ?>

<?php $__env->startSection('content'); ?>
<form class="search" action="<?php echo e(route('loans.index')); ?>" method="get">
    <select name="status">
        <option value="">Semua status</option>
        <?php $__currentLoopData = ['menunggu', 'dipinjam', 'dikembalikan', 'ditolak']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($status); ?>" <?php echo e(request('status') === $status ? 'selected' : ''); ?>><?php echo e(ucfirst($status)); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <button class="btn secondary" type="submit">Filter</button>
</form>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>Anggota</th>
                <th>Buku</th>
                <th>Status</th>
                <th>Jatuh Tempo</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loan->user->name); ?></td>
                    <td><strong><?php echo e($loan->book->title); ?></strong><br><span class="muted"><?php echo e($loan->book->author); ?></span></td>
                    <td><span class="badge"><?php echo e(ucfirst($loan->status)); ?></span></td>
                    <td><?php echo e($loan->due_at ? $loan->due_at->format('d M Y') : '-'); ?></td>
                    <td class="table-actions">
                        <div class="loan-action-stack">
                            <?php if(auth()->user()->isStaff() && $loan->status === 'menunggu'): ?>
                                <div class="loan-action-group">
                                    <span>Validasi Admin</span>
                                    <div>
                                        <form action="<?php echo e(route('loans.approve', $loan)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('patch'); ?>
                                            <button class="btn" type="submit">Setujui</button>
                                        </form>
                                        <form action="<?php echo e(route('loans.reject', $loan)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('patch'); ?>
                                            <button class="btn danger" type="submit">Tolak</button>
                                        </form>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(auth()->user()->isStaff() && $loan->status === 'dipinjam'): ?>
                                <div class="loan-action-group">
                                    <span>Pengembalian</span>
                                    <div>
                                        <form action="<?php echo e(route('loans.return', $loan)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('patch'); ?>
                                            <button class="btn warning" type="submit">Kembalikan</button>
                                        </form>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(in_array($loan->status, ['menunggu', 'dipinjam', 'dikembalikan'])): ?>
                                <div class="loan-action-group">
                                    <span>Bukti Peminjaman</span>
                                    <div>
                                        <a class="btn secondary" href="<?php echo e(route('loans.borrow_receipt', $loan)); ?>" target="_blank">Cetak PDF</a>
                                        <a class="btn secondary" href="<?php echo e(route('loans.borrow_receipt.excel', $loan)); ?>">Excel</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($loan->status === 'dikembalikan'): ?>
                                <div class="loan-action-group">
                                    <span>Bukti Pengembalian</span>
                                    <div>
                                        <a class="btn secondary" href="<?php echo e(route('loans.return_receipt', $loan)); ?>" target="_blank">Cetak PDF</a>
                                        <a class="btn secondary" href="<?php echo e(route('loans.return_receipt.excel', $loan)); ?>">Excel</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if(! auth()->user()->isStaff()): ?>
                            <span class="muted"><?php echo e($loan->notes ?: '-'); ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="5">Belum ada data peminjaman.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<div class="pagination"><?php echo e($loans->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\mpiiittt\perpustakaan-laravel\resources\views/loans/index.blade.php ENDPATH**/ ?>