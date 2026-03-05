

<?php $__env->startSection('content'); ?>
<style>
    .auth-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #E8F1F8 0%, #D4E4F7 100%);
        padding: 2rem;
    }

    .auth-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(37, 99, 235, 0.15);
        overflow: hidden;
        width: 100%;
        max-width: 500px;
    }

    .auth-header {
        background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%);
        color: white;
        padding: 3rem 2rem;
        text-align: center;
    }

    .auth-header h1 {
        font-size: 2rem;
        font-weight: 900;
        margin-bottom: 0.5rem;
    }

    .auth-header p {
        font-size: 1rem;
        opacity: 0.9;
        margin: 0;
    }

    .auth-body {
        padding: 3rem 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        font-weight: 700;
        color: #1E3A8A;
        margin-bottom: 0.75rem;
        font-size: 0.95rem;
    }

    .form-group input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #E0E7FF;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    .form-group input:focus {
        outline: none;
        border-color: #2563EB;
        background: #EFF6FF;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .form-group input::placeholder {
        color: #94A3B8;
    }

    .error-message {
        color: #DC2626;
        font-size: 0.85rem;
        margin-top: 0.5rem;
    }

    .submit-btn {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 1rem;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(37, 99, 235, 0.3);
    }

    .submit-btn:active {
        transform: translateY(0);
    }

    .form-footer {
        text-align: center;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #E0E7FF;
    }

    .form-footer p {
        color: #64748B;
        margin: 0 0 1rem 0;
    }

    .form-footer a {
        color: #2563EB;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.3s ease;
    }

    .form-footer a:hover {
        color: #1D4ED8;
        text-decoration: underline;
    }

    .forgot-password {
        text-align: right;
        margin-bottom: 1.5rem;
    }

    .forgot-password a {
        color: #2563EB;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .forgot-password a:hover {
        color: #1D4ED8;
        text-decoration: underline;
    }

    .remember-me {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
    }

    .remember-me input[type="checkbox"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: #2563EB;
    }

    .remember-me label {
        margin: 0;
        cursor: pointer;
        color: #64748B;
        font-weight: 500;
    }

    .success-message {
        background: #DBEAFE;
        border-left: 4px solid #2563EB;
        color: #1E3A8A;
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
    }

    @media (max-width: 600px) {
        .auth-container {
            padding: 1rem;
        }

        .auth-header {
            padding: 2rem 1.5rem;
        }

        .auth-header h1 {
            font-size: 1.5rem;
        }

        .auth-body {
            padding: 2rem 1.5rem;
        }
    }
</style>

<div class="auth-container">
    <div class="auth-card">
        <!-- Header -->
        <div class="auth-header">
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
<?php endif; ?>Masuk</h1>
            <p>Selamat datang kembali di Perpustakaan Digital</p>
        </div>

        <!-- Body -->
        <div class="auth-body">
            <?php if($errors->any()): ?>
                <div class="error-message" style="background: #FEE2E2; border-left: 4px solid #DC2626; color: #991B1B; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                    <strong>Login Gagal!</strong>
                    <ul style="margin: 0.5rem 0 0 1.5rem;">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if(session('status')): ?>
                <div class="success-message">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <!-- Test Credentials Info -->
            <div style="background: #DBEAFE; border-left: 4px solid #2563EB; color: #1E3A8A; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; font-size: 0.9rem;">
                <strong><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
<?php endif; ?>Test Credentials:</strong>
                <div style="margin-top: 0.5rem; line-height: 1.5;">
                    <div><strong>Admin:</strong> admin@localhost / admin123</div>
                    <div><strong>Petugas:</strong> petugas@localhost / petugas123</div>
                    <div><strong>User:</strong> user@localhost / user123</div>
                </div>
            </div>

            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="Masukkan email Anda"
                        value="<?php echo e(old('email')); ?>"
                        required
                        autofocus
                    >
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error-message"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Masukkan password Anda"
                        required
                    >
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error-message"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Remember Me -->
                <div class="remember-me">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        name="remember"
                    >
                    <label for="remember">Ingat saya</label>
                </div>

                <!-- Forgot Password -->
                <?php if(Route::has('password.request')): ?>
                    <div class="forgot-password">
                        <a href="<?php echo e(route('password.request')); ?>">Lupa password?</a>
                    </div>
                <?php endif; ?>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn">Masuk</button>

                <!-- Register Link -->
                <div class="form-footer">
                    <p>Belum memiliki akun?</p>
                    <a href="<?php echo e(route('register')); ?>">Daftar di sini</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.empty', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\htdocs\app_laravel1\resources\views/auth/login.blade.php ENDPATH**/ ?>