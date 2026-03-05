<?php $__env->startSection('title', 'Laporan'); ?>
<?php $__env->startSection('page-title', 'Laporan Peminjaman & Pengembalian'); ?>

<?php $__env->startSection('content-admin'); ?>
<div class="card" style="margin-bottom:16px;">
    <div class="card-body" style="padding:16px;">
        <form method="GET" action="<?php echo e(route('admin.reports.index')); ?>" style="display:flex;gap:12px;flex-wrap:wrap;align-items:flex-end;">
            <div>
                <label class="form-label" for="from">Dari Tanggal</label>
                <input type="date" id="from" name="from" class="form-control" value="<?php echo e($from); ?>">
            </div>
            <div>
                <label class="form-label" for="to">Sampai Tanggal</label>
                <input type="date" id="to" name="to" class="form-control" value="<?php echo e($to); ?>">
            </div>
            <div style="display:flex;gap:8px;">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="<?php echo e(route('admin.reports.index')); ?>" class="btn btn-secondary">Reset</a>
            </div>
        </form>
    </div>
</div>

<div class="stat-grid">
    <div class="stat-card">
        <i class="bi bi-journal-check" style="font-size: 1.6rem; color: #2563EB;"></i>
        <div class="number"><?php echo e($totalBorrowed); ?></div>
        <div class="label">Total Laporan Peminjaman</div>
    </div>
    <div class="stat-card">
        <i class="bi bi-arrow-return-left" style="font-size: 1.6rem; color: #16a34a;"></i>
        <div class="number"><?php echo e($totalReturned); ?></div>
        <div class="label">Total Laporan Pengembalian</div>
    </div>
</div>

<div class="card" style="margin-bottom:16px;">
    <div class="card-header">
        <h5 class="mb-0">Laporan Peminjaman Buku</h5>
    </div>
    <div class="card-body" style="padding:0;">
        <div class="table-responsive" style="padding:12px;">
            <table class="table table-striped table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Tiket</th>
                        <th>Nama Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Jatuh Tempo</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $borrowReports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e(($borrowReports->currentPage() - 1) * $borrowReports->perPage() + $loop->iteration); ?></td>
                            <td><code><?php echo e($loan->ticket_code ?? '-'); ?></code></td>
                            <td><?php echo e($loan->user->name ?? '-'); ?></td>
                            <td><?php echo e($loan->book->title ?? '-'); ?></td>
                            <td><?php echo e($loan->loan_date ? \Carbon\Carbon::parse($loan->loan_date)->format('d M Y') : '-'); ?></td>
                            <td><?php echo e($loan->due_date ? \Carbon\Carbon::parse($loan->due_date)->format('d M Y') : '-'); ?></td>
                            <td>
                                <span class="badge <?php if($loan->status === 'approved'): ?> bg-info <?php elseif($loan->status === 'returned'): ?> bg-success <?php elseif($loan->status === 'rejected'): ?> bg-danger <?php else: ?> bg-warning text-dark <?php endif; ?>">
                                    <?php echo e(ucfirst($loan->status)); ?>

                                </span>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data peminjaman.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center" style="padding:0 0 12px;">
            <?php echo e($borrowReports->links()); ?>

        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Laporan Pengembalian Buku</h5>
    </div>
    <div class="card-body" style="padding:0;">
        <div class="table-responsive" style="padding:12px;">
            <table class="table table-striped table-hover mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Tiket</th>
                        <th>Nama Peminjam</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $returnReports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e(($returnReports->currentPage() - 1) * $returnReports->perPage() + $loop->iteration); ?></td>
                            <td><code><?php echo e($loan->ticket_code ?? '-'); ?></code></td>
                            <td><?php echo e($loan->user->name ?? '-'); ?></td>
                            <td><?php echo e($loan->book->title ?? '-'); ?></td>
                            <td><?php echo e($loan->return_date ? \Carbon\Carbon::parse($loan->return_date)->format('d M Y') : '-'); ?></td>
                            <td><span class="badge bg-success">Returned</span></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data pengembalian.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center" style="padding:0 0 12px;">
            <?php echo e($returnReports->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\htdocs\app_laravel1\resources\views/admin/reports/index.blade.php ENDPATH**/ ?>