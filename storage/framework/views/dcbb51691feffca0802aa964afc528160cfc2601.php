

<?php $__env->startSection('title', 'Kelola Peminjaman'); ?>
<?php $__env->startSection('page-title', 'Kelola Peminjaman Buku'); ?>

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

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Daftar Peminjaman Buku (<?php echo e($loans->total()); ?> peminjaman)</h5>
    </div>
    <div class="card-body">
        <?php if($loans->isEmpty()): ?>
            <div class="alert alert-info text-center">
                Belum ada data peminjaman
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Peminjam</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Jatuh Tempo</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(($loans->currentPage() - 1) * $loans->perPage() + $loop->iteration); ?></td>
                                <td><strong><?php echo e($loan->user->name); ?></strong></td>
                                <td><?php echo e($loan->book->title); ?></td>
                                <td><?php echo e($loan->loan_date ? \Carbon\Carbon::parse($loan->loan_date)->format('d M Y') : '-'); ?></td>
                                <td><?php echo e($loan->due_date ? \Carbon\Carbon::parse($loan->due_date)->format('d M Y') : '-'); ?></td>
                                <td>
                                    <span class="badge <?php if($loan->status === 'pending'): ?> bg-warning text-dark
                                                      <?php elseif($loan->status === 'approved'): ?> bg-info
                                                      <?php elseif($loan->status === 'returned'): ?> bg-success
                                                      <?php elseif($loan->status === 'rejected'): ?> bg-danger
                                                      <?php endif; ?>">
                                        <?php echo e(ucfirst($loan->status)); ?>

                                    </span>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.loans.show', $loan)); ?>" class="btn btn-sm btn-info">
                                        <i class="bi bi-eye"></i> Lihat
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <?php echo e($loans->links()); ?>

            </div>
        <?php endif; ?>
    </div>
</div>

<style>
    .btn { padding: 6px 12px; font-size: 13px; border-radius: 6px; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; cursor: pointer; border: none; }
    .btn-info { background: #17a2b8; color: white; }
    .btn-info:hover { background: #0c5460; }
    .btn-sm { padding: 4px 8px; font-size: 12px; }
    .badge { padding: 4px 8px; border-radius: 4px; font-size: 12px; }
    .badge.bg-warning { background: #ffc107 !important; }
    .badge.bg-info { background: #17a2b8 !important; color: white; }
    .badge.bg-success { background: #28a745 !important; color: white; }
    .badge.bg-danger { background: #dc3545 !important; color: white; }
    .text-dark { color: #333; }
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
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\htdocs\app_laravel1\resources\views/admin/loans/index.blade.php ENDPATH**/ ?>