<?php $__env->startSection('title', 'Detail Peminjaman'); ?>
<?php $__env->startSection('page-title', 'Detail Peminjaman Buku'); ?>

<?php $__env->startSection('content-admin'); ?>
<?php ($isAdmin = auth()->user()->role === 'admin'); ?>
<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Informasi Peminjaman</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Nama Peminjam:</strong> <?php echo e($loan->user->name); ?><br>
                        <small class="text-muted"><?php echo e($loan->user->email); ?></small>
                    </div>
                    <div class="col-md-6">
                        <strong>Judul Buku:</strong> <?php echo e($loan->book->title); ?><br>
                        <small class="text-muted">Oleh <?php echo e($loan->book->author); ?></small>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Tanggal Peminjaman:</strong> <?php echo e($loan->loan_date ? \Carbon\Carbon::parse($loan->loan_date)->format('d M Y H:i') : '-'); ?><br>
                    </div>
                    <div class="col-md-6">
                        <strong>Tanggal Jatuh Tempo:</strong> <?php echo e($loan->due_date ? \Carbon\Carbon::parse($loan->due_date)->format('d M Y') : '-'); ?>

                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <strong>Tanggal Pengembalian:</strong> <?php echo e($loan->return_date ? \Carbon\Carbon::parse($loan->return_date)->format('d M Y H:i') : 'Belum dikembalikan'); ?><br>
                    </div>
                    <div class="col-md-6">
                        <strong>Status:</strong> 
                        <span class="badge <?php if($loan->status === 'pending'): ?> bg-warning text-dark
                                              <?php elseif($loan->status === 'approved'): ?> bg-info
                                              <?php elseif($loan->status === 'returned'): ?> bg-success
                                              <?php elseif($loan->status === 'rejected'): ?> bg-danger
                                              <?php endif; ?>">
                            <?php echo e(ucfirst($loan->status)); ?>

                        </span>
                    </div>
                </div>

                <hr>

                <?php if($loan->status === 'pending'): ?>
                    <div class="alert alert-warning">
                        <strong>Perlu Tindakan!</strong> Permintaan peminjaman ini menunggu persetujuan.
                    </div>

                    <?php if($isAdmin): ?>
                        <div class="d-flex gap-2">
                            <form action="<?php echo e(route('admin.loans.approve', $loan)); ?>" method="POST" style="display: inline-block;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-check-circle"></i> Setujui Peminjaman
                                </button>
                            </form>

                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">
                                <i class="bi bi-x-circle"></i> Tolak Peminjaman
                            </button>
                        </div>
                    <?php endif; ?>
                <?php elseif($loan->status === 'approved'): ?>
                    <div class="alert alert-info">
                        <strong>Peminjaman Disetujui.</strong> Menunggu buku dikembalikan.
                    </div>

                    <?php if($isAdmin): ?>
                        <form action="<?php echo e(route('admin.loans.return', $loan)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-arrow-return-left"></i> Catat Pengembalian
                            </button>
                        </form>
                    <?php endif; ?>
                <?php elseif($loan->status === 'returned'): ?>
                    <div class="alert alert-success">
                        <strong>Buku Dikembalikan!</strong> Peminjaman ini telah selesai.
                    </div>
                <?php elseif($loan->status === 'rejected'): ?>
                    <div class="alert alert-danger">
                        <strong>Peminjaman Ditolak.</strong> Permintaan ini telah ditolak oleh admin.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Data Peminjam</h5>
            </div>
            <div class="card-body">
                <p><strong>Nama:</strong> <?php echo e($loan->user->name); ?></p>
                <p><strong>Email:</strong> <?php echo e($loan->user->email); ?></p>
                <p><strong>Role:</strong> <span class="badge bg-info"><?php echo e(ucfirst($loan->user->role)); ?></span></p>
                <p><strong>Alamat:</strong> <?php echo e($loan->user->address ?? '-'); ?></p>
                <p><strong>Tergabung:</strong> <?php echo e($loan->user->created_at->format('d M Y')); ?></p>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Data Buku</h5>
            </div>
            <div class="card-body">
                <p><strong>Judul:</strong> <?php echo e($loan->book->title); ?></p>
                <p><strong>Pengarang:</strong> <?php echo e($loan->book->author); ?></p>
                <p><strong>ISBN:</strong> <code><?php echo e($loan->book->isbn); ?></code></p>
                <?php if($loan->book->category): ?>
                    <p><strong>Kategori:</strong> <?php echo e($loan->book->category->name); ?></p>
                <?php endif; ?>
                <p><strong>Stok Tersedia:</strong> <?php echo e($loan->book->copies); ?></p>
            </div>
        </div>
    </div>
</div>

<?php if($isAdmin): ?>
<div class="modal fade" id="rejectModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tolak Permintaan Peminjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?php echo e(route('admin.loans.reject', $loan)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="reason" class="form-label">Alasan Penolakan <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="reason" name="reason" rows="3" required placeholder="Jelaskan alasan penolakan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Tolak Peminjaman</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>

<a href="<?php echo e(route('admin.loans.index')); ?>" class="btn btn-secondary mt-4">
    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Peminjaman
</a>

<style>
    .btn { padding: 8px 16px; border-radius: 6px; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; cursor: pointer; border: none; font-weight: 500; }
    .btn-success { background: #28a745; color: white; }
    .btn-success:hover { background: #218838; }
    .btn-danger { background: #dc3545; color: white; }
    .btn-danger:hover { background: #c82333; }
    .btn-secondary { background: #6c757d; color: white; }
    .btn-secondary:hover { background: #5a6268; }
    .card { border: none; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 8px; margin-bottom: 24px; }
    .card-header { background: white; border-bottom: 1px solid #ddd; padding: 16px; }
    .card-body { padding: 20px; }
    .badge { padding: 4px 8px; border-radius: 4px; font-size: 12px; }
    .badge.bg-warning { background: #ffc107 !important; }
    .badge.bg-info { background: #17a2b8 !important; color: white; }
    .badge.bg-success { background: #28a745 !important; color: white; }
    .badge.bg-danger { background: #dc3545 !important; color: white; }
    .text-dark { color: #333; }
    .text-danger { color: #dc3545; }
    .text-muted { color: #6c757d; }
    .alert { padding: 12px 16px; border-radius: 6px; margin-bottom: 16px; }
    .alert-warning { background: #fff3cd; color: #856404; border: 1px solid #ffeaa7; }
    .alert-info { background: #d1ecf1; color: #0c5460; border: 1px solid #bee5eb; }
    .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    .alert-danger { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    .row { margin-left: -12px; margin-right: -12px; }
    .row > div { padding-left: 12px; padding-right: 12px; }
    .mb-3 { margin-bottom: 20px; }
    .mb-4 { margin-bottom: 24px; }
    .mt-4 { margin-top: 24px; }
    .d-flex { display: flex; }
    .gap-2 { gap: 8px; }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\htdocs\app_laravel1\resources\views/admin/loans/show.blade.php ENDPATH**/ ?>