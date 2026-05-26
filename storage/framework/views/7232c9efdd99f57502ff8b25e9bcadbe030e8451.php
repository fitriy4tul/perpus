<?php $__env->startSection('title', 'Login Perpustakaan'); ?>

<?php $__env->startSection('content'); ?>
<div class="auth-page">
    <div class="card auth-card">
        <div class="auth-logo">MP</div>
        <?php if(empty($role)): ?>
            <p class="eyebrow">Perpustakaan Digital</p>
            <h1>Masuk ke MPIT Library</h1>
            <p class="muted">Pilih jenis akun untuk membuka dashboard perpustakaan.</p>
            <div class="role-login-grid">
                <a class="role-login-card" href="<?php echo e(route('login.role', 'user')); ?>">
                    <strong>Login User</strong>
                    <span>Cari buku dan ajukan peminjaman.</span>
                </a>
                <a class="role-login-card" href="<?php echo e(route('login.role', 'admin')); ?>">
                    <strong>Login Admin</strong>
                    <span>Kelola pengguna, buku, dan transaksi.</span>
                </a>
                <a class="role-login-card" href="<?php echo e(route('login.role', 'petugas')); ?>">
                    <strong>Login Petugas</strong>
                    <span>Validasi peminjaman dan pengembalian.</span>
                </a>
            </div>
            <p class="muted">Belum punya akun? <a href="<?php echo e(route('register')); ?>">Daftar anggota</a></p>
        <?php else: ?>
            <p class="eyebrow">Login <?php echo e(ucfirst($role)); ?></p>
            <h1>Selamat datang kembali</h1>
            <p class="muted">Gunakan akun dengan role <?php echo e($role); ?>.</p>
            <form class="form" action="<?php echo e(route('login.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="role" value="<?php echo e($role); ?>">
                <label>Email
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                </label>
                <label>Password
                    <input type="password" name="password" required>
                </label>
                <label>
                    <span><input type="checkbox" name="remember" value="1"> Ingat saya</span>
                </label>
                <button class="btn" type="submit">Masuk</button>
            </form>
            <p class="muted"><a href="<?php echo e(route('login')); ?>">Pilih jenis login lain</a></p>
            <?php if($role === 'user'): ?>
                <p class="muted">Belum punya akun? <a href="<?php echo e(route('register')); ?>">Daftar anggota</a></p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\mpiiittt\perpustakaan-laravel\resources\views/auth/login.blade.php ENDPATH**/ ?>