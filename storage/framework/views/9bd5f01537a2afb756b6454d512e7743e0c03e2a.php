

<?php $__env->startSection('content'); ?>
<style>
    .history-container {
        background: linear-gradient(135deg, #E8F1F8 0%, #D4E4F7 100%);
        min-height: 100vh;
        padding: 3rem 2rem;
    }

    .history-content {
        max-width: 1000px;
        margin: 0 auto;
    }

    .history-header {
        background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%);
        color: white;
        padding: 2.5rem;
        border-radius: 16px;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(37, 99, 235, 0.2);
    }

    .history-header h1 {
        font-size: 2rem;
        font-weight: 900;
        margin: 0 0 0.5rem 0;
    }

    .history-header p {
        font-size: 1rem;
        opacity: 0.95;
        margin: 0;
    }

    .stats-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        border-left: 4px solid #2563EB;
        text-align: center;
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 900;
        color: #2563EB;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        color: #64748B;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .loans-table {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .table-header {
        background: #F8F9FA;
        padding: 1.5rem;
        border-bottom: 2px solid #E0E7FF;
    }

    .table-header h2 {
        font-size: 1.3rem;
        font-weight: 700;
        color: #1E3A8A;
        margin: 0;
    }

    .loans-list {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .loan-item {
        padding: 1.5rem;
        border-bottom: 1px solid #E0E7FF;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 1.5rem;
        align-items: center;
        transition: all 0.3s ease;
    }

    .loan-item:hover {
        background: #F8F9FA;
    }

    .loan-item:last-child {
        border-bottom: none;
    }

    .loan-book-info {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .loan-book-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #2563EB, #3B82F6);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .loan-book-details h3 {
        font-size: 1rem;
        font-weight: 700;
        color: #1E3A8A;
        margin: 0 0 0.25rem 0;
    }

    .loan-book-details p {
        font-size: 0.85rem;
        color: #64748B;
        margin: 0;
    }

    .loan-dates {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .loan-date {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
        color: #475569;
    }

    .loan-date strong {
        color: #1E3A8A;
        min-width: 80px;
    }

    .loan-status {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        align-items: flex-end;
    }

    .status-badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        text-align: center;
        min-width: 110px;
    }

    .status-pending {
        background: #FEF3C7;
        color: #92400E;
    }

    .status-approved {
        background: #DBEAFE;
        color: #0C4A6E;
    }

    .status-returned {
        background: #DCFCE7;
        color: #166534;
    }

    .status-rejected {
        background: #FEE2E2;
        color: #991B1B;
    }

    .ticket-link {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        font-size: 0.82rem;
        text-decoration: none;
        background: #eff6ff;
        color: #1d4ed8;
        border: 1px solid #bfdbfe;
        padding: 0.35rem 0.7rem;
        border-radius: 999px;
        font-weight: 700;
    }

    .ticket-link:hover {
        background: #dbeafe;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: white;
        border-radius: 12px;
    }

    .empty-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .empty-state h3 {
        color: #1E3A8A;
        font-size: 1.3rem;
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: #64748B;
        margin-bottom: 1.5rem;
    }

    .btn-explore {
        display: inline-block;
        padding: 0.75rem 2rem;
        background: #2563EB;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-explore:hover {
        background: #1D4ED8;
        transform: translateY(-2px);
    }

    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }

    @media (max-width: 768px) {
        .loan-item {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .loan-status {
            align-items: flex-start;
        }

        .history-header h1 {
            font-size: 1.5rem;
        }

        .stats-cards {
            grid-template-columns: 1fr 1fr;
        }
    }
</style>

<div class="history-container">
    <div class="history-content">
        <!-- Header -->
        <div class="history-header">
            <h1><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'book','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'book','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Riwayat Peminjaman</h1>
            <p>Kelola dan pantau semua buku yang pernah Anda pinjam</p>
        </div>

        <!-- Stats Cards -->
        <div class="stats-cards">
            <div class="stat-card">
                <div class="stat-number"><?php echo e(count($loans->items()) + (($loans->currentPage() - 1) * $loans->perPage())); ?></div>
                <div class="stat-label">Total Peminjaman</div>
            </div>
            <?php
                $sedang_berlangsung = 0;
                $sudah_dikembalikan = 0;
                foreach($loans as $loan) {
                    if(in_array($loan->status, ['pending', 'approved'])) {
                        $sedang_berlangsung++;
                    } elseif($loan->status == 'returned') {
                        $sudah_dikembalikan++;
                    }
                }
            ?>
            <div class="stat-card">
                <div class="stat-number"><?php echo e($sedang_berlangsung); ?></div>
                <div class="stat-label">Sedang Berlangsung</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo e($sudah_dikembalikan); ?></div>
                <div class="stat-label">Sudah Dikembalikan</div>
            </div>
        </div>

        <!-- Loans List -->
        <div class="loans-table">
            <div class="table-header">
                <h2><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'book-open','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'book-open','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Daftar Peminjaman</h2>
            </div>

            <?php $__empty_1 = true; $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="loan-item">
                <!-- Book Info -->
                <div class="loan-book-info">
                    <div class="loan-book-icon"><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'book-open']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'book-open']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?></div>
                    <div class="loan-book-details">
                        <h3><?php echo e($loan->book->title ?? 'Buku Tidak Ditemukan'); ?></h3>
                        <p><?php echo e($loan->book->author ?? '-'); ?></p>
                    </div>
                </div>

                <!-- Dates -->
                <div class="loan-dates">
                    <div class="loan-date">
                        <strong><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'calendar','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'calendar','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Dipinjam:</strong>
                        <?php echo e($loan->loan_date ? \Carbon\Carbon::parse($loan->loan_date)->format('d M Y') : 'Belum'); ?>

                    </div>
                    <div class="loan-date">
                        <strong><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'rotate-cw','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'rotate-cw','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Kembali:</strong>
                        <?php if($loan->return_date): ?>
                            <?php echo e(\Carbon\Carbon::parse($loan->return_date)->format('d M Y')); ?>

                        <?php elseif($loan->due_date): ?>
                            <?php echo e(\Carbon\Carbon::parse($loan->due_date)->format('d M Y')); ?>

                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Status -->
                <div class="loan-status">
                    <span class="status-badge status-<?php echo e($loan->status); ?>">
                        <?php switch($loan->status):
                            case ('pending'): ?>
                                ⏳ Menunggu
                                <?php break; ?>
                            <?php case ('approved'): ?>
                                ✓ Disetujui
                                <?php break; ?>
                            <?php case ('returned'): ?>
                                ✓ Dikembalikan
                                <?php break; ?>
                            <?php case ('rejected'): ?>
                                ✗ Ditolak
                                <?php break; ?>
                            <?php default: ?>
                                <?php echo e(ucfirst($loan->status)); ?>

                        <?php endswitch; ?>
                    </span>
                    <small style="color: #64748B; font-size: 0.8rem;">
                        <?php echo e($loan->created_at->format('d M Y H:i')); ?>

                    </small>
                    <?php if(in_array($loan->status, ['approved', 'returned'])): ?>
                        <a href="<?php echo e(route('loans.ticket', $loan)); ?>" class="ticket-link">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'book-open','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'book-open','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Tiket
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="empty-state">
                <div class="empty-icon"><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'inbox']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'inbox']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?></div>
                <h3>Belum Ada Riwayat Peminjaman</h3>
                <p>Anda belum pernah meminjam buku. Mulai jelajahi koleksi buku kami sekarang!</p>
                <a href="<?php echo e(route('books.index')); ?>" class="btn-explore">Jelajahi Koleksi Buku</a>
            </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <?php if($loans->hasPages()): ?>
        <div class="pagination-wrapper">
            <?php echo e($loans->links()); ?>

        </div>
        <?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\htdocs\app_laravel1\resources\views/loans/history.blade.php ENDPATH**/ ?>