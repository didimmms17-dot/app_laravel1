@extends('layouts.empty')

@section('content')
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
            <h1><x-icon name="book" class="icon-inline" />Masuk</h1>
            <p>Selamat datang kembali di Perpustakaan Digital</p>
        </div>

        <!-- Body -->
        <div class="auth-body">
            @if ($errors->any())
                <div class="error-message" style="background: #FEE2E2; border-left: 4px solid #DC2626; color: #991B1B; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                    <strong>Login Gagal!</strong>
                    <ul style="margin: 0.5rem 0 0 1.5rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="success-message">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Test Credentials Info -->
            <div style="background: #DBEAFE; border-left: 4px solid #2563EB; color: #1E3A8A; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; font-size: 0.9rem;">
                <strong><x-icon name="file-text" class="icon-inline" />Test Credentials:</strong>
                <div style="margin-top: 0.5rem; line-height: 1.5;">
                    <div><strong>Admin:</strong> admin@localhost / admin123</div>
                    <div><strong>Petugas:</strong> petugas@localhost / petugas123</div>
                    <div><strong>User:</strong> user@localhost / user123</div>
                </div>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="Masukkan email Anda"
                        value="{{ old('email') }}"
                        required
                        autofocus
                    >
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
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
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
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
                @if (Route::has('password.request'))
                    <div class="forgot-password">
                        <a href="{{ route('password.request') }}">Lupa password?</a>
                    </div>
                @endif

                <!-- Submit Button -->
                <button type="submit" class="submit-btn">Masuk</button>

                <!-- Register Link -->
                <div class="form-footer">
                    <p>Belum memiliki akun?</p>
                    <a href="{{ route('register') }}">Daftar di sini</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
