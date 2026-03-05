<?php $__env->startSection('title', 'Notifications - Admin'); ?>
<?php $__env->startSection('page-title', 'Notifications'); ?>

<?php $__env->startSection('content-admin'); ?>
<?php ($isAdmin = auth()->user()->role === 'admin'); ?>
<div class="row mb-4">
    <div class="col-md-8">
        <h5>All Notifications from Borrowers</h5>
    </div>
    <div class="col-md-4 text-end">
        <?php if($isAdmin && \App\Models\Notification::count() > 0): ?>
            <form action="<?php echo e(route('admin.notifications.clear')); ?>" method="POST" style="display: inline-block;">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Clear all notifications?')">
                    <i class="bi bi-trash"></i> Clear All
                </button>
            </form>
        <?php endif; ?>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>From</th>
                    <th>Type</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="<?php if(!$notif->isRead()): ?> table-light <?php endif; ?>">
                        <td>
                            <strong><?php echo e($notif->user->name); ?></strong><br>
                            <small class="text-muted"><?php echo e($notif->user->email); ?></small>
                        </td>
                        <td>
                            <span class="badge <?php if($notif->type === 'loan_request'): ?> bg-info
                                                 <?php elseif($notif->type === 'loan_approved'): ?> bg-success
                                                 <?php elseif($notif->type === 'loan_rejected'): ?> bg-danger
                                                 <?php else: ?> bg-secondary <?php endif; ?>">
                                <?php echo e(str_replace('_', ' ', ucfirst($notif->type))); ?>

                            </span>
                        </td>
                        <td><strong><?php echo e($notif->title); ?></strong></td>
                        <td><?php echo e(Str::limit($notif->message, 50)); ?></td>
                        <td><?php echo e($notif->created_at->format('d M Y H:i')); ?></td>
                        <td>
                            <?php if($notif->isRead()): ?>
                                <span class="badge bg-success">Read</span>
                            <?php else: ?>
                                <span class="badge bg-warning">Unread</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('admin.notifications.show', $notif)); ?>" class="btn btn-sm btn-info">
                                <i class="bi bi-eye"></i>
                            </a>
                            <?php if($isAdmin): ?>
                                <form action="<?php echo e(route('admin.notifications.delete', $notif)); ?>" method="POST" style="display: inline-block;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <p class="text-muted mb-0">No notifications yet</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    <?php echo e($notifications->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\htdocs\app_laravel1\resources\views/admin/notifications/index.blade.php ENDPATH**/ ?>