

<?php $__env->startSection('content'); ?>
<!-- Status Messages -->
<?php if($errors->any()): ?>
    <div style="position: fixed; top: 20px; right: 20px; background: #FEE2E2; border: 2px solid #EF4444; color: #991B1B; padding: 1rem; border-radius: 8px; z-index: 9999;">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'x-circle','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'x-circle','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>

<?php if(session('status')): ?>
    <div style="position: fixed; top: 20px; right: 20px; background: #DCFCE7; border: 2px solid #22C55E; color: #166534; padding: 1rem; border-radius: 8px; z-index: 9999;">
        <p><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'check-circle','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check-circle','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php echo e(session('status')); ?></p>
    </div>
<?php endif; ?>

<style>
    .book-detail-container {
        background: linear-gradient(135deg, #E8F1F8 0%, #D4E4F7 100%);
        min-height: 100vh;
        padding: 2rem;
    }

    .book-detail-wrapper {
        max-width: 1200px;
        margin: 0 auto;
    }

    .breadcrumb {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 2rem;
        font-size: 0.95rem;
    }

    .breadcrumb a {
        color: #2563EB;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .breadcrumb a:hover {
        color: #1D4ED8;
        text-decoration: underline;
    }

    .breadcrumb-separator {
        color: #94A3B8;
    }

    .book-detail-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(37, 99, 235, 0.1);
    }

    .book-detail-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        padding: 3rem;
    }

    .book-cover-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 2rem;
    }

    .book-cover-large {
        width: 100%;
        max-width: 350px;
        height: 480px;
        background: linear-gradient(135deg, #3B82F6 0%, #60A5FA 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 8rem;
        box-shadow: 0 20px 50px rgba(37, 99, 235, 0.25);
    }

    .book-cover-large img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .book-actions-detail {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        width: 100%;
        max-width: 350px;
    }

    .btn-large {
        padding: 0.9rem 1rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.95rem;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        min-height: 44px;
        width: 100%;
        white-space: nowrap;
    }

    .btn-borrow-large {
        background: #2563EB;
        color: white;
        border: 2px solid #2563EB;
    }

    .btn-borrow-large:hover {
        background: #1D4ED8;
        border-color: #1D4ED8;
        transform: translateY(-1px);
    }

    .btn-favorite-large {
        background: white;
        color: #2563EB;
        border: 2px solid #2563EB;
    }

    .btn-favorite-large:hover {
        background: #DBEAFE;
    }

    .btn-favorite-large.favorited {
        background: #EF4444;
        color: white;
        border-color: #EF4444;
    }

    .btn-disabled-large {
        background: #E2E8F0;
        color: #64748B;
        border: 2px solid #E2E8F0;
        cursor: not-allowed;
    }

    .book-info-section {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .book-title-detail {
        font-size: 2.5rem;
        font-weight: 900;
        color: #1E3A8A;
        line-height: 1.2;
    }

    .book-meta {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .meta-label {
        font-weight: 700;
        color: #2563EB;
        min-width: 100px;
    }

    .meta-value {
        color: #475569;
        font-size: 1.1rem;
    }

    .book-category-large {
        display: inline-block;
        background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%);
        color: white;
        padding: 0.6rem 1.5rem;
        border-radius: 25px;
        font-weight: 700;
        font-size: 0.95rem;
        width: fit-content;
    }

    .availability-badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.95rem;
    }

    .availability-badge.available {
        background: #DCFCE7;
        color: #166534;
    }

    .availability-badge.unavailable {
        background: #FEE2E2;
        color: #991B1B;
    }

    .divider {
        height: 2px;
        background: #E0E7FF;
        margin: 1rem 0;
    }

    .book-description {
        margin-top: 1rem;
    }

    .book-description h3 {
        color: #1E3A8A;
        font-size: 1.3rem;
        margin-bottom: 1rem;
        font-weight: 700;
    }

    .book-description p {
        color: #475569;
        line-height: 1.8;
        font-size: 1rem;
        text-align: justify;
    }

    .book-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
        margin-top: 2rem;
        padding: 2rem;
        background: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 100%);
        border-radius: 12px;
        border-left: 4px solid #2563EB;
    }

    .stat {
        text-align: center;
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 900;
        color: #2563EB;
    }

    .stat-label {
        color: #64748B;
        font-weight: 600;
        margin-top: 0.5rem;
    }

    .section-tabs {
        display: flex;
        gap: 1rem;
        border-bottom: 2px solid #E0E7FF;
        margin-top: 2rem;
        margin-bottom: 2rem;
    }

    .tab-btn {
        padding: 1rem;
        border: none;
        background: none;
        color: #64748B;
        font-weight: 700;
        cursor: pointer;
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
    }

    .tab-btn:hover,
    .tab-btn.active {
        color: #2563EB;
        border-bottom-color: #2563EB;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .reviews-list {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .review-item {
        background: #F8FAFC;
        border-radius: 12px;
        padding: 1.5rem;
        border-left: 4px solid #2563EB;
    }

    .review-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .review-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #2563EB, #60A5FA);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
    }

    .review-info h4 {
        color: #1E3A8A;
        margin: 0 0 0.25rem 0;
        font-weight: 700;
    }

    .review-date {
        color: #94A3B8;
        font-size: 0.85rem;
    }

    .review-rating {
        color: #FBBF24;
        margin-top: 0.5rem;
    }

    .review-text {
        color: #475569;
        line-height: 1.6;
    }

    .rating-form-section {
        background: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 100%);
        border: 2px solid #BFDBFE;
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .rating-form-section h4 {
        color: #1E3A8A;
        font-weight: 700;
        margin-bottom: 1.5rem;
    }

    .rating-stars {
        display: flex;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
    }

    .rating-star {
        font-size: 2rem;
        cursor: pointer;
        transition: all 0.2s ease;
        opacity: 0.4;
    }

    .rating-star:hover,
    .rating-star.active {
        transform: scale(1.2);
        opacity: 1;
    }

    .rating-star svg {
        width: 1.8rem;
        height: 1.8rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        color: #1E3A8A;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .form-group textarea {
        width: 100%;
        padding: 0.75rem;
        border: 2px solid #E0E7FF;
        border-radius: 8px;
        font-family: inherit;
        resize: vertical;
        min-height: 100px;
        color: #475569;
    }

    .form-group textarea:focus {
        outline: none;
        border-color: #2563EB;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .form-actions {
        display: flex;
        gap: 1rem;
    }

    .form-actions button {
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        flex: 1;
    }

    .btn-submit {
        background: #2563EB;
        color: white;
    }

    .btn-submit:hover {
        background: #1D4ED8;
    }

    .btn-cancel {
        background: #E0E7FF;
        color: #2563EB;
    }

    .btn-cancel:hover {
        background: #DBEAFE;
    }

    .no-reviews {
        text-align: center;
        color: #94A3B8;
        padding: 2rem;
        background: #F8FAFC;
        border-radius: 12px;
    }

    @media (max-width: 768px) {
        .book-detail-content {
            grid-template-columns: 1fr;
            padding: 1.5rem;
        }

        .book-title-detail {
            font-size: 1.8rem;
        }

        .book-stats {
            grid-template-columns: 1fr;
        }

        .section-tabs {
            flex-wrap: wrap;
        }
    }
</style>

<div class="book-detail-container">
    <div class="book-detail-wrapper">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="<?php echo e(route('welcome')); ?>"><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'home','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'home','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Beranda</a>
            <span class="breadcrumb-separator">/</span>
            <a href="<?php echo e(route('books.index')); ?>"><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
<?php endif; ?>Koleksi Buku</a>
            <span class="breadcrumb-separator">/</span>
            <span style="color: #64748B;"><?php echo e($book->title); ?></span>
        </div>

        <!-- Book Detail Card -->
        <div class="book-detail-card">
            <div class="book-detail-content">
                <!-- Left: Book Cover -->
                <div class="book-cover-section">
                    <div class="book-cover-large">
                        <?php if($book->cover_image_url): ?>
                            <img src="<?php echo e($book->cover_image_url); ?>" alt="<?php echo e($book->title); ?>"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <span style="display:none;"><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
<?php endif; ?></span>
                        <?php else: ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
<?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <div class="book-actions-detail">
                        <?php if(auth()->user() && auth()->user()->role === 'admin'): ?>
                            <button class="btn-large btn-disabled-large" disabled>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
<?php endif; ?>Tidak bisa pinjam
                            </button>
                        <?php elseif($book->copies > 0): ?>
                            <button class="btn-large btn-borrow-large" onclick="openBorrowModal()">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
<?php endif; ?>Pinjam Sekarang
                            </button>
                        <?php else: ?>
                            <button class="btn-large btn-disabled-large" disabled>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
<?php endif; ?>Sedang Habis
                            </button>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                            <?php if(auth()->user()->role === 'user'): ?>
                                <button
                                    id="favoriteBtn"
                                    class="btn-large btn-favorite-large <?php echo e($isFavorited ? 'favorited' : ''); ?>"
                                    data-book-id="<?php echo e($book->id); ?>"
                                    type="button"
                                >
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'heart','class' => 'icon-inline favorite-icon']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'heart','class' => 'icon-inline favorite-icon']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <span class="favorite-label"><?php echo e($isFavorited ? 'Favorit' : 'Tambah Favorit'); ?></span>
                                </button>
                            <?php endif; ?>
                        <?php else: ?>
                            <a class="btn-large btn-favorite-large" href="<?php echo e(route('login')); ?>">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'heart','class' => 'icon-inline favorite-icon']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'heart','class' => 'icon-inline favorite-icon']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <span class="favorite-label">Tambah Favorit</span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Right: Book Info -->
                <div class="book-info-section">
                    <h1 class="book-title-detail"><?php echo e($book->title); ?></h1>

                    <div class="book-meta">
                        <div class="meta-item">
                            <span class="meta-label"><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'user','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'user','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Penulis</span>
                            <span class="meta-value"><?php echo e($book->author ?? 'Tidak Diketahui'); ?></span>
                        </div>

                        <div class="meta-item">
                            <span class="meta-label"><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'tag','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'tag','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Kategori</span>
                            <span>
                                <span class="book-category-large"><?php echo e($book->category->name ?? 'Umum'); ?></span>
                            </span>
                        </div>

                        <div class="meta-item">
                            <span class="meta-label"><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
<?php endif; ?>Penerbit</span>
                            <span class="meta-value"><?php echo e($book->publisher ?? 'Tidak Diketahui'); ?></span>
                        </div>

                        <div class="meta-item">
                            <span class="meta-label"><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
<?php endif; ?>Tahun</span>
                            <span class="meta-value"><?php echo e($book->year_published ?? 'Tidak Diketahui'); ?></span>
                        </div>

                        <div class="meta-item">
                            <span class="meta-label"><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'file-text','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'file-text','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Halaman</span>
                            <span class="meta-value"><?php echo e($book->pages ?? 'Tidak Diketahui'); ?> halaman</span>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="meta-item">
                        <span class="meta-label"><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'star','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'star','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Rating</span>
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <span style="color: #FBBF24; font-size: 1.2rem;"><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'star','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'star','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php echo e(method_exists($book, 'getAverageRating') ? $book->getAverageRating() : ($book->average_rating ?? 0)); ?>/5</span>
                            <span class="rating-text">(<?php echo e(method_exists($book, 'getRatingCount') ? $book->getRatingCount() : ($book->rating_count ?? 0)); ?> ulasan)</span>
                        </div>
                    </div>

                    <div class="meta-item">
                        <span class="meta-label"><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'info','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'info','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Ketersediaan</span>
                        <span class="availability-badge <?php echo e($book->copies > 0 ? 'available' : 'unavailable'); ?>">
                            <?php if($book->copies > 0): ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'check-circle','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check-circle','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php echo e($book->copies); ?> Buku Tersedia
                            <?php else: ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'x-circle','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'x-circle','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Sedang Habis
                            <?php endif; ?>
                        </span>
                    </div>

                    <!-- Description -->
                    <div class="book-description">
                        <h3><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'file-text','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'file-text','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Deskripsi Buku</h3>
                        <p>
                            <?php echo e($book->description ?? 'Buku "' . $book->title . '" karya ' . ($book->author ?? 'Penulis Hebat') . ' adalah sebuah karya yang luar biasa yang akan membawa Anda dalam perjalanan penuh makna dan pembelajaran. Dengan gaya penulisan yang menarik dan plot yang engaging, buku ini menjadi pilihan sempurna untuk pembaca yang mencari inspirasi dan hiburan berkualitas. Nikmati pengalaman membaca yang tak terlupakan dengan koleksi buku kami.'); ?>

                        </p>
                    </div>

                    <!-- Stats -->
                    <div class="book-stats">
                        <div class="stat">
                            <div class="stat-number"><?php echo e(rand(5, 25)); ?></div>
                            <div class="stat-label">Dipinjam Bulan Ini</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number"><?php echo e(rand(50, 150)); ?></div>
                            <div class="stat-label">Total Peminjam</div>
                        </div>
                        <div class="stat">
                            <div class="stat-number"><?php echo e(rand(80, 99)); ?>%</div>
                            <div class="stat-label">Kepuasan Pembaca</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabs Section -->
            <div style="padding: 3rem; border-top: 2px solid #E0E7FF;">
                <div class="section-tabs">
                    <button class="tab-btn active" onclick="switchTab(event, 'detail')">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'clipboard','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'clipboard','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Detail Lengkap
                    </button>
                    <button class="tab-btn" onclick="switchTab(event, 'rating')">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'message-circle','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'message-circle','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Ulasan & Rating (<?php echo e(method_exists($book, 'getRatingCount') ? $book->getRatingCount() : ($book->rating_count ?? 0)); ?>)
                        </button>
                </div>

                <!-- Detail Tab -->
                <div id="detail" class="tab-content active">
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem;">
                        <div>
                            <h4 style="color: #1E3A8A; font-weight: 700; margin-bottom: 1rem;">Informasi Teknis</h4>
                            <div style="display: flex; flex-direction: column; gap: 0.75rem; color: #475569;">
                                <div>
                                    <strong>ISBN:</strong> <?php echo e($book->isbn ?? '978-XXXXXXXXXX'); ?>

                                </div>
                                <div>
                                    <strong>Bahasa:</strong> <?php echo e($book->language ?? 'Indonesia'); ?>

                                </div>
                                <div>
                                    <strong>Jenis Buku:</strong> <?php echo e($book->type ?? 'Buku Cetak'); ?>

                                </div>
                                <div>
                                    <strong>Format:</strong> <?php echo e($book->format ?? 'Hardcover'); ?>

                                </div>
                            </div>
                        </div>
                        <div>
                            <h4 style="color: #1E3A8A; font-weight: 700; margin-bottom: 1rem;">Kebijakan Peminjaman</h4>
                            <div style="display: flex; flex-direction: column; gap: 0.75rem; color: #475569;">
                                <div>
                                    <strong>Durasi Peminjaman:</strong> 14 hari
                                </div>
                                <div>
                                    <strong>Denda Keterlambatan:</strong> Rp 1.000/hari
                                </div>
                                <div>
                                    <strong>Max Peminjaman:</strong> 5 buku sekaligus
                                </div>
                                <div>
                                    <strong>Perpanjangan:</strong> Maksimal 2 kali
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rating & Reviews Tab -->
                <div id="rating" class="tab-content">
                    <!-- Rating Form (untuk user yang login) -->
                    <?php if(auth()->guard()->check()): ?>
                    <div class="rating-form-section">
                        <h4><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'star','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'star','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Beri Rating & Ulasan Buku</h4>
                        
                        <form action="<?php echo e(route('books.rating', $book->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            
                            <div class="form-group">
                                <label>Berapa bintang rating Anda?</label>
                                <div class="rating-stars" id="ratingStars">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <span class="rating-star" onclick="setRating(<?php echo e($i); ?>)"><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'star']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'star']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?></span>
                                    <?php endfor; ?>
                                </div>
                                <input type="hidden" id="ratingInput" name="rating" value="0" required>
                                <div id="ratingError" style="color: #EF4444; font-size: 0.9rem; display: none; margin-top: 0.5rem;">
                                    Silakan pilih rating terlebih dahulu
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="review">Tulis Ulasan Anda (Opsional)</label>
                                <textarea id="review" name="review" placeholder="Bagikan pengalaman Anda membaca buku ini..."></textarea>
                            </div>

                            <div class="form-actions">
                                <button type="button" class="btn-cancel" onclick="resetRatingForm()">
                                    Batal
                                </button>
                                <button type="submit" class="btn-submit">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'check-circle','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check-circle','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Kirim Rating
                                </button>
                            </div>
                        </form>
                    </div>
                    <?php else: ?>
                    <div style="background: #DBEAFE; border: 2px solid #BFDBFE; border-radius: 12px; padding: 2rem; text-align: center; margin-bottom: 2rem;">
                        <p style="color: #1E3A8A; font-weight: 700; margin-bottom: 1rem;">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'lock','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'lock','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Silakan Login untuk memberikan rating
                        </p>
                        <a href="<?php echo e(route('login')); ?>" style="display: inline-block; padding: 0.75rem 1.5rem; background: #2563EB; color: white; text-decoration: none; border-radius: 8px; font-weight: 700;">
                            Login Sekarang
                        </a>
                    </div>
                    <?php endif; ?>

                    <!-- Reviews List -->
                    <h4 style="color: #1E3A8A; font-weight: 700; margin-bottom: 1.5rem; margin-top: 2rem;">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'message-circle','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'message-circle','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Ulasan Pembaca (<?php echo e(method_exists($book, 'getRatingCount') ? $book->getRatingCount() : ($book->rating_count ?? 0)); ?>)
                    </h4>

                    <?php if($ratings->count() > 0): ?>
                        <div class="reviews-list">
                            <?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="review-item">
                                    <div class="review-header">
                                        <div class="review-avatar">
                                            <?php echo e(strtoupper(substr($rating->user->name ?? 'U', 0, 1))); ?><?php echo e(strtoupper(substr($rating->user->name ?? 'U', -1, 1))); ?>

                                        </div>
                                        <div class="review-info">
                                            <h4><?php echo e($rating->user->name ?? 'Pembaca Anonim'); ?></h4>
                                            <div class="review-date"><?php echo e($rating->created_at->format('d M Y')); ?></div>
                                            <div class="review-rating">
                                                <?php for($i = 0; $i < $rating->rating; $i++): ?>
                                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'star','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'star','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                <?php endfor; ?>
                                                <span style="color: #64748B; margin-left: 0.5rem;"><?php echo e($rating->rating); ?>/5</span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($rating->review): ?>
                                        <p class="review-text"><?php echo e($rating->review); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div class="no-reviews">
                            <p style="font-size: 1.1rem; margin-bottom: 1rem;">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'info','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'info','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Belum ada ulasan untuk buku ini
                            </p>
                            <p style="color: #64748B;">
                                Jadilah yang pertama memberikan ulasan!
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Borrow Modal -->
<div id="borrowModal" style="display: none; position: fixed; z-index: 1500; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); align-items: center; justify-content: center;">
    <div style="background: white; padding: 2rem; border-radius: 16px; max-width: 500px; width: 90%; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3); position: relative;">
        <button style="position: absolute; top: 1.5rem; right: 1.5rem; background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #64748B;" onclick="closeBorrowModal()">✕</button>
        <div style="font-size: 1.5rem; font-weight: 900; color: #1E3A8A; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem;">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'clipboard','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'clipboard','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Ajukan Peminjaman
        </div>
        <form method="POST" action="<?php echo e(route('loans.store')); ?>">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="book_id" value="<?php echo e($book->id); ?>">
            <div style="margin-bottom: 1.5rem;">
                <label style="color: #64748B; font-weight: 700;">Buku yang dipinjam</label>
                <input type="text" value="<?php echo e($book->title); ?>" readonly style="width:100%; padding:0.75rem; border-radius:8px; border:1px solid #E0E7FF; background:#F3F4F6; margin-bottom:0.5rem;">
            </div>
            <div style="margin-bottom: 1.5rem;">
                <label style="color: #64748B; font-weight: 700;">Tanggal Mulai</label>
                <input type="date" name="start_date" id="startDateInput" required style="width:100%; padding:0.75rem; border-radius:8px; border:1px solid #E0E7FF; margin-bottom:0.5rem;">
            </div>
            <div style="margin-bottom: 1.5rem;">
                <label style="color: #64748B; font-weight: 700;">Catatan</label>
                <textarea name="note" placeholder="Tulis catatan (opsional)..." style="width:100%; padding:0.75rem; border-radius:8px; border:1px solid #E0E7FF; min-height:80px;"></textarea>
            </div>
            <div style="display: flex; gap: 1rem;">
                <button type="button" style="flex: 1; padding: 0.75rem; background: #E0E7FF; color: #2563EB; border: none; border-radius: 8px; font-weight: 700; cursor: pointer;" onclick="closeBorrowModal()">
                    Batal
                </button>
                <button type="submit" style="flex: 1; padding: 0.75rem; background: #2563EB; color: white; border: none; border-radius: 8px; font-weight: 700; cursor: pointer;">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'check-circle','class' => 'icon-inline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'check-circle','class' => 'icon-inline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>Pinjam Sekarang
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    let selectedRating = 0;

    function openBorrowModal() {
        const today = new Date();
        const tomorrow = new Date(today.getTime() + 24 * 60 * 60 * 1000);
        const yyyy = tomorrow.getFullYear();
        const mm = String(tomorrow.getMonth() + 1).padStart(2, '0');
        const dd = String(tomorrow.getDate()).padStart(2, '0');
        document.getElementById('startDateInput').value = `${yyyy}-${mm}-${dd}`;
        document.getElementById('borrowModal').style.display = 'flex';
    }

    function closeBorrowModal() {
        document.getElementById('borrowModal').style.display = 'none';
    }

    function confirmBorrow() {
        // For actual implementation, you would submit a form here
        // For now, just show a message
        window.location.href = "<?php echo e(Auth::check() ? route('loans.store') : route('login')); ?>";
    }

    function setRating(rating) {
        selectedRating = rating;
        document.getElementById('ratingInput').value = rating;
        
        const stars = document.querySelectorAll('.rating-star');
        stars.forEach((star, index) => {
            if (index < rating) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });
        
        document.getElementById('ratingError').style.display = 'none';
    }

    function resetRatingForm() {
        document.getElementById('ratingInput').value = 0;
        document.getElementById('review').value = '';
        selectedRating = 0;
        
        document.querySelectorAll('.rating-star').forEach(star => {
            star.classList.remove('active');
        });
    }

    const favoriteBtn = document.getElementById('favoriteBtn');
    if (favoriteBtn) {
        favoriteBtn.addEventListener('click', async () => {
            const bookId = favoriteBtn.getAttribute('data-book-id');
            try {
                const res = await fetch(`/books/${bookId}/favorite`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                        'Accept': 'application/json',
                    },
                });

                if (!res.ok) {
                    return;
                }

                const data = await res.json();
                const label = favoriteBtn.querySelector('.favorite-label');

                if (data.favorited) {
                    favoriteBtn.classList.add('favorited');
                    label.textContent = 'Favorit';
                } else {
                    favoriteBtn.classList.remove('favorited');
                    label.textContent = 'Tambah Favorit';
                }
            } catch (e) {
                // no-op
            }
        });
    }

    function switchTab(event, tabName) {
        // Remove active from all tabs and buttons
        document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
        document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
        
        // Add active to clicked button and corresponding content
        event.target.classList.add('active');
        document.getElementById(tabName).classList.add('active');
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('borrowModal');
        if (event.target === modal) {
            closeBorrowModal();
        }
    }
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\htdocs\app_laravel1\resources\views/books/show.blade.php ENDPATH**/ ?>