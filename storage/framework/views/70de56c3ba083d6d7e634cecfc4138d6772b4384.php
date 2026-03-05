<?php $__env->startSection('title', 'Kelola Kategori'); ?>
<?php $__env->startSection('page-title', 'Kelola Kategori Buku'); ?>

<?php $__env->startSection('content-admin'); ?>
<?php ($isAdmin = auth()->user()->role === 'admin'); ?>

<?php if($isAdmin): ?>
<div class="row mb-4">
    <div class="col-md-12">
        <a href="<?php echo e(route('admin.categories.create')); ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Kategori
        </a>
    </div>
</div>
<?php endif; ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

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

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Daftar Kategori</h5>
    </div>
    <div class="card-body">
        <?php if($categories->isEmpty()): ?>
            <div class="alert alert-info text-center">
                Belum ada kategori.<?php if($isAdmin): ?> <a href="<?php echo e(route('admin.categories.create')); ?>">Buat kategori baru</a><?php endif; ?>
            </div>
        <?php else: ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kategori</th>
                        <th>Slug</th>
                        <th>Jumlah Buku</th>
                        <th>Deskripsi</th>
                        <?php if($isAdmin): ?><th>Aksi</th><?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration); ?></td>
                            <td><strong><?php echo e($category->name); ?></strong></td>
                            <td><code><?php echo e($category->slug); ?></code></td>
                            <td>
                                <span class="badge bg-info"><?php echo e($category->books_count); ?></span>
                            </td>
                            <td><?php echo e(Str::limit($category->description ?? '-', 50)); ?></td>
                            <?php if($isAdmin): ?>
                            <td>
                                <a href="<?php echo e(route('admin.categories.edit', $category)); ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form method="POST" action="<?php echo e(route('admin.categories.destroy', $category)); ?>" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                <?php echo e($categories->links()); ?>

            </div>
        <?php endif; ?>
    </div>
</div>

<style>
    .btn { padding: 6px 12px; font-size: 13px; border-radius: 6px; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; cursor: pointer; border: none; }
    .btn-primary { background: #007bff; color: white; }
    .btn-primary:hover { background: #0056b3; }
    .btn-warning { background: #ffc107; color: black; }
    .btn-warning:hover { background: #ff9800; }
    .btn-danger { background: #dc3545; color: white; }
    .btn-danger:hover { background: #c82333; }
    .btn-sm { padding: 4px 8px; font-size: 12px; }
    .table { width: 100%; border-collapse: collapse; }
    .table th { background: #f5f5f5; font-weight: 600; border-bottom: 2px solid #ddd; padding: 12px; text-align: left; }
    .table td { padding: 12px; border-bottom: 1px solid #ddd; }
    .table tr:hover { background: #f9f9f9; }
    .card { border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 8px; }
    .card-header { background: white; border-bottom: 1px solid #ddd; padding: 16px; }
    .card-body { padding: 16px; }
    .badge { padding: 4px 8px; border-radius: 4px; font-size: 12px; }
    .badge.bg-info { background: #17a2b8 !important; }
    .alert { padding: 12px 16px; border-radius: 6px; margin-bottom: 16px; }
    .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    .alert-danger { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    .alert-info { background: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb; }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\htdocs\app_laravel1\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>