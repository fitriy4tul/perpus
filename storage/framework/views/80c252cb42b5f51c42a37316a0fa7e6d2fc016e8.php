<?php $__env->startSection('title', 'Pengguna'); ?>
<?php $__env->startSection('page_title', 'Manajemen Pengguna'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-actions">
    <p class="muted">Kelola akun admin, petugas, dan anggota.</p>
    <a class="btn" href="<?php echo e(route('users.create')); ?>">Tambah Pengguna</a>
</div>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><span class="badge"><?php echo e(ucfirst($user->role)); ?></span></td>
                    <td class="table-actions">
                        <a class="btn secondary" href="<?php echo e(route('users.edit', $user)); ?>">Edit</a>
                        <form action="<?php echo e(route('users.destroy', $user)); ?>" method="post" onsubmit="return confirm('Hapus akun ini?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button class="btn danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<div class="pagination"><?php echo e($users->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\mpiiittt\perpustakaan-laravel\resources\views/users/index.blade.php ENDPATH**/ ?>