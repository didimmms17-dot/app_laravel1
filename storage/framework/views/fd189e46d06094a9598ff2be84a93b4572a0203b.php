<?php $__env->startSection('title', 'Notifikasi Saya'); ?>

<?php $__env->startSection('content'); ?>
<div style="max-width: 900px; margin: 2rem auto; padding: 0 1rem;">
    <div style="display:flex;justify-content:space-between;align-items:center;gap:1rem;flex-wrap:wrap;margin-bottom:1rem;">
        <h1 style="margin:0;color:#1e3a8a;">Notifikasi</h1>
        <?php if($notifications->whereNull('read_at')->count() > 0): ?>
            <form method="POST" action="<?php echo e(route('notifications.read-all')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" style="padding:0.55rem 0.9rem;border:none;border-radius:8px;background:#2563eb;color:#fff;font-weight:700;cursor:pointer;">
                    Tandai Semua Dibaca
                </button>
            </form>
        <?php endif; ?>
    </div>

    <?php if(session('status')): ?>
        <div style="margin-bottom:1rem;padding:0.75rem 1rem;border-radius:8px;background:#dcfce7;color:#166534;">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div style="background:#fff;border:1px solid #dbeafe;border-left:5px solid <?php echo e($notification->read_at ? '#93c5fd' : '#2563eb'); ?>;border-radius:10px;padding:1rem;margin-bottom:0.75rem;">
            <div style="display:flex;justify-content:space-between;gap:1rem;align-items:flex-start;flex-wrap:wrap;">
                <div>
                    <h3 style="margin:0 0 0.25rem 0;color:#1e3a8a;"><?php echo e($notification->title); ?></h3>
                    <p style="margin:0 0 0.35rem 0;color:#334155;"><?php echo e($notification->message); ?></p>
                    <small style="color:#64748b;"><?php echo e($notification->created_at->format('d M Y H:i')); ?></small>
                </div>
                <?php if(!$notification->read_at): ?>
                    <form method="POST" action="<?php echo e(route('notifications.read', $notification)); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" style="padding:0.45rem 0.75rem;border:none;border-radius:8px;background:#0ea5e9;color:#fff;font-weight:600;cursor:pointer;">
                            Tandai Dibaca
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div style="padding:1rem;border-radius:10px;background:#eff6ff;color:#1e40af;">
            Belum ada notifikasi peminjaman.
        </div>
    <?php endif; ?>

    <div style="margin-top:1rem;">
        <?php echo e($notifications->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\htdocs\app_laravel1\resources\views/notifications/index.blade.php ENDPATH**/ ?>