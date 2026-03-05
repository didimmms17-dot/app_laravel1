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

    .password-requirements {
        background: #DBEAFE;
        border-left: 4px solid #2563EB;
        color: #1E3A8A;
        padding: 1rem;
        border-radius: 8px;
        margin-top: 0.75rem;
        font-size: 0.85rem;
        line-height: 1.6;
    }

    .password-requirements ul {
        margin: 0.5rem 0 0 1.5rem;
        padding-left: 0;
    }

    .password-requirements li {
        margin: 0.3rem 0;
    }

    .terms-checkbox {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        margin: 1.5rem 0;
    }

    .terms-checkbox input[type="checkbox"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: #2563EB;
        margin-top: 0.25rem;
    }

    .terms-checkbox label {
        margin: 0;
        cursor: pointer;
        color: #64748B;
        font-weight: 500;
        font-size: 0.9rem;
    }

    .terms-checkbox a {
        color: #2563EB;
        text-decoration: none;
    }

    .terms-checkbox a:hover {
        text-decoration: underline;
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
            <h1><x-icon name="book" class="icon-inline" />Daftar</h1>
            <p>Bergabunglah dengan komunitas pembaca kami</p>
        </div>

        <!-- Body -->
        <div class="auth-body">
            @if ($errors->any())
                <div style="background: #FEE2E2; border-left: 4px solid #DC2626; color: #991B1B; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                    <strong>Registrasi Gagal!</strong>
                    <ul style="margin: 0.5rem 0 0 1.5rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nama -->
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        placeholder="Masukkan nama lengkap Anda"
                        value="{{ old('name') }}"
                        required
                        autofocus
                    >
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

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
                        placeholder="Minimal 8 karakter"
                        required
                    >
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                    <div class="password-requirements">
                        <strong>Persyaratan password:</strong>
                        <ul>
                            <li>Minimal 8 karakter</li>
                            <li>Mengandung huruf besar dan kecil</li>
                            <li>Mengandung angka</li>
                        </ul>
                    </div>
                </div>

                <!-- Konfirmasi Password -->
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input 
                        type="password" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        placeholder="Ulangi password Anda"
                        required
                    >
                    @error('password_confirmation')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Terms & Conditions -->
                <div class="terms-checkbox">
                    <input 
                        type="checkbox" 
                        id="terms" 
                        name="terms"
                        required
                    >
                    <label for="terms">
                        Saya setuju dengan 
                        <a href="#">Syarat & Ketentuan</a> dan 
                        <a href="#">Kebijakan Privasi</a>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn">Daftar Sekarang</button>

                <!-- Login Link -->
                <div class="form-footer">
                    <p>Sudah memiliki akun?</p>
                    <a href="{{ route('login') }}">Masuk di sini</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
