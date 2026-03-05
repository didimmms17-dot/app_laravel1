<?php $__env->startSection('title', 'Data User'); ?>
<?php $__env->startSection('page-title', 'Data User'); ?>

<?php $__env->startSection('content-admin'); ?>
<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo e(session('error')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0">Data User (<?php echo e($users->total()); ?> akun)</h5>
    </div>
    <div class="card-body">
        <?php if($users->isEmpty()): ?>
            <div class="alert alert-info text-center">
                Belum ada data user.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Alamat</th>
                            <th>Tergabung</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(($users->currentPage() - 1) * $users->perPage() + $loop->iteration); ?></td>
                                <td><strong><?php echo e($user->name); ?></strong></td>
                                <td><?php echo e($user->email); ?></td>
                                <td>
                                    <span class="badge bg-info">
                                        <?php echo e(ucfirst($user->role)); ?>

                                    </span>
                                </td>
                                <td><?php echo e(Str::limit($user->address ?? '-', 30)); ?></td>
                                <td><?php echo e($user->created_at->format('d M Y')); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <?php echo e($users->links()); ?>

            </div>
        <?php endif; ?>
    </div>
</div>

<style>
    .badge { padding: 4px 8px; border-radius: 4px; font-size: 12px; }
    .badge.bg-info { background: #17a2b8 !important; color: white; }
    .card { border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 8px; }
    .card-header { background: white; border-bottom: 1px solid #ddd; padding: 16px; }
    .card-body { padding: 0; }
    .table { width: 100%; border-collapse: collapse; margin-bottom: 0; }
    .table th { background: #f5f5f5; font-weight: 600; border-bottom: 2px solid #ddd; padding: 12px; text-align: left; }
    .table td { padding: 12px; border-bottom: 1px solid #ddd; }
    .table tr:hover { background: #f9f9f9; }
    .table-responsive { padding: 12px; }
    .alert { padding: 12px 16px; border-radius: 6px; margin-bottom: 16px; }
    .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    .alert-danger { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    .alert-info { background: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb; }
    .text-center { text-align: center; }
    .d-flex { display: flex; }
    .justify-content-center { justify-content: center; }
    .mt-4 { margin-top: 24px; }
    .mb-4 { margin-bottom: 24px; }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\htdocs\app_laravel1\resources\views/admin/users/index.blade.php ENDPATH**/ ?>