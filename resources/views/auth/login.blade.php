<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - QCall</title>
    <link rel="stylesheet" href="{{ asset('css/qcall.css') }}">
</head>
<body class="registration-page auth-registration-page">

    <header class="registration-header">
        <a href="{{ route('home') }}" class="registration-back">
            <span>←</span>
            <span>Program Lainnya</span>
        </a>
        <div class="registration-country" aria-label="Indonesia"><span></span></div>
    </header>

    <main class="registration-main auth-main">
        <section class="auth-intro-card">
            <div class="auth-logo">QC<span>CALL</span></div>
            <div class="auth-title-wrap">
                <div class="auth-kicker-small">SELAMAT DATANG KEMBALI</div>
                <h1>Masuk ke QCall</h1>
                <p>Masuk menggunakan <strong>email</strong> dan password kamu.</p>
            </div>
        </section>

        @if (session('success'))
            <div class="registration-success">
                <span class="success-icon">✓</span>
                <div>
                    <strong>Berhasil!</strong>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="registration-errors">
                <strong>Login gagal:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}" class="registration-form auth-form-mobile">
            @csrf

            <div class="form-field">
                <label for="email">Email <span>*</span></label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukan email kamu"
                    autocomplete="email"
                    required
                    autofocus
                >
            </div>

            <div class="form-field">
                <label for="password">Password <span>*</span></label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukan password"
                    autocomplete="current-password"
                    required
                >
            </div>

            <label class="auth-remember">
                <input type="checkbox" name="remember" value="1">
                <span>Ingat saya</span>
            </label>

            <button class="registration-submit auth-submit-mobile" type="submit">
                <span>Masuk</span>
                <span class="submit-arrow">→</span>
            </button>

            <p class="auth-register-link">
                Belum punya akun? <a href="{{ route('registration.create') }}">Daftar sekarang</a>
            </p>
        </form>
    </main>
</body>
</html>
