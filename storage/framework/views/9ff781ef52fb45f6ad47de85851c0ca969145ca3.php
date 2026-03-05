<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Perpustakaan Digital'); ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            line-height: 1.6;
        }

        /* Page Transition Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Loading Spinner */
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .page-loader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .page-loader.active {
            opacity: 1;
            pointer-events: all;
        }

        .loader-spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #E5E7EB;
            border-top-color: #2563EB;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        main {
            animation: fadeIn 0.6s ease-out;
        }

        /* Navbar Styles */
        .navbar {
            background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%);
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.2);
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            color: white;
            font-size: 1.3rem;
            font-weight: 900;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            opacity: 0.9;
        }

        .navbar-brand-icon {
            font-size: 1.8rem;
        }

        .navbar-menu {
            display: flex;
            align-items: center;
            gap: 2rem;
            list-style: none;
        }

        .navbar-item a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-item a:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #DBEAFE;
        }

        .navbar-item.active a {
            background: rgba(255, 255, 255, 0.2);
            border-bottom: 2px solid white;
        }

        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .search-box {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 8px;
            padding: 0.5rem 1rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .search-box:focus-within {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.4);
        }

        .search-box input {
            background: none;
            border: none;
            color: white;
            outline: none;
            width: 200px;
            font-size: 0.95rem;
        }

        .search-box input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .search-box svg {
            color: rgba(255, 255, 255, 0.7);
            width: 18px;
            height: 18px;
        }

        .navbar-auth {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .btn-auth {
            padding: 0.6rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 0.95rem;
        }

        .btn-login {
            background: transparent;
            border: 2px solid white;
            color: white;
        }

        .btn-login:hover {
            background: white;
            color: #2563EB;
        }

        .btn-register {
            background: white;
            color: #2563EB;
            border: 2px solid white;
        }

        .btn-register:hover {
            background: #EFF6FF;
        }

        .user-menu {
            position: relative;
        }

        .user-menu-btn {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: rgba(255, 255, 255, 0.15);
            border: none;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .user-menu-btn:hover {
            background: rgba(255, 255, 255, 0.25);
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            min-width: 220px;
            margin-top: 0.5rem;
            overflow: hidden;
            z-index: 1001;
        }

        .user-menu.active .dropdown-menu {
            display: block;
        }

        .dropdown-item {
            padding: 1rem;
            color: #333;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background: #EFF6FF;
            color: #2563EB;
        }

        .dropdown-divider {
            border-top: 1px solid #E0E7FF;
        }

        .notification-icon {
            position: relative;
            color: white;
            cursor: pointer;
            font-size: 1.3rem;
            display: inline-flex;
            align-items: center;
        }

        .icon {
            width: 1em;
            height: 1em;
            stroke: currentColor;
        }

        .icon-inline {
            margin-right: 0.4rem;
            vertical-align: -0.12em;
        }

        .notification-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #EF4444;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .hamburger {
            display: none;
            flex-direction: column;
            gap: 0.4rem;
            background: none;
            border: none;
            cursor: pointer;
        }

        .hamburger span {
            width: 25px;
            height: 2.5px;
            background: white;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg) translateY(10px);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg) translateY(-10px);
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }

            .navbar-container {
                flex-wrap: wrap;
                gap: 1rem;
            }

            .search-box {
                display: none;
            }

            .search-box input {
                width: 150px;
            }

            .navbar-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%);
                flex-direction: column;
                gap: 0;
                width: 100%;
                padding: 1rem 0;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
            }

            .navbar-menu.active {
                display: flex;
            }

            .navbar-item a {
                width: 100%;
                padding: 1rem 2rem;
                border-radius: 0;
            }

            .navbar-item.active a {
                border-bottom: none;
                border-left: 3px solid white;
                padding-left: calc(2rem - 3px);
            }

            .hamburger {
                display: flex;
            }

            .navbar-auth {
                gap: 0.5rem;
            }

            .btn-auth {
                padding: 0.5rem 1rem;
                font-size: 0.85rem;
            }

            .navbar-actions {
                gap: 1rem;
                order: 3;
                width: 100%;
                justify-content: flex-end;
            }
        }
    </style>

    <?php echo $__env->yieldContent('additional-styles'); ?>
</head>
<body>
    <!-- Page Loader -->
    <div class="page-loader">
        <div class="loader-spinner"></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <!-- Brand -->
            <a href="<?php echo e(route('welcome')); ?>" class="navbar-brand">
                <span class="navbar-brand-icon">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'book']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'book']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </span>
                <span>Perpusmina</span>
            </a>

            <!-- Hamburger Menu -->
            <button class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <!-- Navigation Menu -->
            <ul class="navbar-menu" id="navbarMenu">
                <li class="navbar-item <?php echo e(request()->routeIs('welcome') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('welcome')); ?>">Beranda</a>
                </li>
                <li class="navbar-item <?php echo e(request()->routeIs('books.index') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('books.index')); ?>">Koleksi Buku</a>
                </li>
                <li class="navbar-item <?php echo e(request()->routeIs('categories.*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('categories.index')); ?>">Kategori</a>
                </li>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->role === 'user'): ?>
                        <li class="navbar-item <?php echo e(request()->routeIs('loans.history') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('loans.history')); ?>">Riwayat Peminjaman</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>

            <!-- Navbar Actions -->
            <div class="navbar-actions">
                <!-- Search Box -->
                <div class="search-box">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" placeholder="Cari buku...">
                </div>
                <!-- Notification Icon -->
                <?php if(auth()->guard()->check()): ?>
                    <?php
                        $userUnreadNotifications = \App\Models\Notification::where('user_id', auth()->id())
                            ->whereIn('type', ['loan_approved', 'loan_returned'])
                            ->whereNull('read_at')
                            ->count();
                    ?>
                    <a href="<?php echo e(route('notifications.index')); ?>" class="notification-icon" title="Notifikasi">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'bell']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'bell']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php if($userUnreadNotifications > 0): ?>
                            <span class="notification-badge"><?php echo e($userUnreadNotifications); ?></span>
                        <?php endif; ?>
                    </a>
                <?php else: ?>
                    <div class="notification-icon">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon','data' => ['name' => 'bell']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'bell']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                <?php endif; ?>
                <!-- Auth Section -->
                <?php if(auth()->guard()->check()): ?>
                    <div class="user-menu" id="userMenu">
                        <button class="user-menu-btn">
                            <div class="user-avatar"><?php echo e(strtoupper(substr(auth()->user()->name ?? 'U', 0, 1))); ?></div>
                            <span><?php echo e(auth()->user()->name ?? 'User'); ?></span>
                        </button>
                        <div class="dropdown-menu">
                            <a href="<?php echo e(route('dashboard')); ?>" class="dropdown-item">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="7" r="4"/><path d="M5.5 21a7.5 7.5 0 0 1 13 0"/></svg></span> Profil Saya
                            </a>
                            <?php if(auth()->user()->role === 'user'): ?>
                                <a href="<?php echo e(route('favorites.index')); ?>" class="dropdown-item">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41 1.01 4.5 2.09C13.09 4.01 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.18L12 21z"/></svg></span> Favorit Saya
                                </a>
                                <a href="<?php echo e(route('notifications.index')); ?>" class="dropdown-item">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0 1 18 14.158V11a6.002 6.002 0 0 0-4-5.659V4a2 2 0 1 0-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg></span> Notifikasi
                                </a>
                            <?php endif; ?>
                            <a href="<?php echo e(route('dashboard')); ?>" class="dropdown-item">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09a1.65 1.65 0 0 0-1-1.51 1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1V15a2 2 0 0 1 0-4h.09a1.65 1.65 0 0 0 1.51-1 1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33h.09a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51h.09a1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82v.09a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg></span> Pengaturan
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="<?php echo e(route('logout')); ?>" style="width: 100%;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="dropdown-item" style="border: none; background: none; width: 100%; text-align: left; cursor: pointer;">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 16l4-4m0 0l-4-4m4 4H7"/><path d="M7 8v8"/></svg></span> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="navbar-auth">
                        <a href="<?php echo e(route('login')); ?>" class="btn-auth btn-login">Masuk</a>
                        <a href="<?php echo e(route('register')); ?>" class="btn-auth btn-register">Daftar</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <script>
        // Hamburger Menu Toggle
        const hamburger = document.getElementById('hamburger');
        const navbarMenu = document.getElementById('navbarMenu');

        if (hamburger) {
            hamburger.addEventListener('click', () => {
                hamburger.classList.toggle('active');
                navbarMenu.classList.toggle('active');
            });
        }

        // User Menu Toggle
        const userMenu = document.getElementById('userMenu');
        if (userMenu) {
            userMenu.querySelector('.user-menu-btn').addEventListener('click', (e) => {
                e.stopPropagation();
                userMenu.classList.toggle('active');
            });

            // Close menu when clicking outside
            document.addEventListener('click', (e) => {
                if (!userMenu.contains(e.target)) {
                    userMenu.classList.remove('active');
                }
            });
        }

        // Close menu when clicking on navbar items
        if (navbarMenu) {
            document.querySelectorAll('.navbar-item a').forEach(link => {
                link.addEventListener('click', () => {
                    if (hamburger) {
                        hamburger.classList.remove('active');
                    }
                    if (navbarMenu) {
                        navbarMenu.classList.remove('active');
                    }
                });
            });
        }

        // Page Transition Animation - Improved
        const pageLoader = document.querySelector('.page-loader');

        // Show loader on navigation
        document.querySelectorAll('a:not([target="_blank"]):not([href^="javascript:"]):not([data-no-loader])').forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                const currentPath = window.location.pathname;
                
                // Don't show loader for anchor links (#), same page, or javascript
                if (href && !href.startsWith('#') && !href.startsWith('javascript:') && href !== currentPath && !href.startsWith('mailto:') && !href.startsWith('tel:')) {
                    if (pageLoader) {
                        setTimeout(() => {
                            pageLoader.classList.add('active');
                        }, 50);
                    }
                }
            });
        });

        // Hide loader when page loads or when going back
        window.addEventListener('load', () => {
            if (pageLoader) {
                pageLoader.classList.remove('active');
            }
        });

        // Hide on page show (for browser back button)
        window.addEventListener('pageshow', (event) => {
            if (pageLoader) {
                pageLoader.classList.remove('active');
            }
        });

        // Hide on DOMContentLoaded
        document.addEventListener('DOMContentLoaded', () => {
            if (pageLoader) {
                pageLoader.classList.remove('active');
            }
        });

        // Add click scale effect for interactive elements
        document.querySelectorAll('a, button').forEach(element => {
            if (!element.classList.contains('no-scale')) {
                element.addEventListener('mousedown', function() {
                    this.style.transform = 'scale(0.98)';
                });
                element.addEventListener('mouseup', function() {
                    this.style.transform = 'scale(1)';
                });
                element.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                });
            }
        });
    </script>


<?php /**PATH C:\htdocs\app_laravel1\resources\views/layouts/app.blade.php ENDPATH**/ ?>