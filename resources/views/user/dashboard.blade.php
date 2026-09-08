<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User - QCall</title>
    <link rel="stylesheet" href="{{ asset('css/qcall.css') }}">
</head>
<body class="portal-page">
    <header class="portal-header">
        <a href="{{ route('home') }}" class="portal-logo"><strong>QC</strong>CALL</a>
        <div class="portal-user">
            <div class="portal-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
            <div class="portal-user-info"><strong>{{ auth()->user()->name }}</strong><small>Peserta QCall</small></div>
            <form method="POST" action="{{ route('logout') }}">@csrf<button class="logout-btn">Keluar</button></form>
        </div>
    </header>

    <main class="portal-container">
        <div class="portal-heading">
            <div>
                <span class="portal-kicker">DASHBOARD PESERTA</span>
                <h1>Halo, {{ auth()->user()->name }} 👋</h1>
                <p>Pantau pendaftaran program kamu dari sini.</p>
            </div>
            <a href="{{ route('registration.create') }}" class="portal-primary">Daftar Program Baru</a>
        </div>

        @if(session('success'))
            <div class="portal-alert success">{{ session('success') }}</div>
        @endif

        <section class="user-grid">
            <div class="user-card status-card">
                <div class="card-top"><span>Status Pendaftaran</span><span class="status-dot"></span></div>
                @if($registration)
                    @php
                        $statusLabels = ['pending' => 'Menunggu Konfirmasi', 'accepted' => 'Diterima', 'rejected' => 'Ditolak'];
                    @endphp
                    <h2>{{ $statusLabels[$registration->status] ?? 'Menunggu Konfirmasi' }}</h2>
                    <p>Cinta Quran Call</p>
                    <div class="status-line"><span class="status-progress {{ $registration->status }}"></span></div>
                    <small>Terakhir diperbarui {{ $registration->updated_at->format('d M Y, H:i') }}</small>
                @else
                    <h2>Belum ada pendaftaran</h2>
                    <p>Yuk pilih program yang ingin kamu ikuti.</p>
                    <a href="{{ route('registration.create') }}" class="text-link">Daftar sekarang →</a>
                @endif
            </div>

            <div class="user-card">
                <div class="card-top"><span>Program Kamu</span><span>📖</span></div>
                @if($registration)
                    <h2>Cinta Quran Call</h2>
                    <p>Tahsin & Tilawah Mentoring</p>
                    <div class="detail-list">
                        <div><span>Waktu</span><strong>{{ $registration->preferred_time }}</strong></div>
                        <div><span>Negara</span><strong>{{ $registration->country ?: '-' }}</strong></div>
                    </div>
                @else
                    <h2>Belum memilih program</h2>
                    <p>Program belajar Quran yang nyaman dan interaktif.</p>
                @endif
            </div>

            <div class="user-card profile-card">
                <div class="card-top"><span>Profil Saya</span><span>👤</span></div>
                <div class="profile-row"><span>Nama</span><strong>{{ auth()->user()->name }}</strong></div>
                <div class="profile-row"><span>Email</span><strong>{{ auth()->user()->email }}</strong></div>
                @if($registration)
                    <div class="profile-row"><span>WhatsApp</span><strong>{{ $registration->phone }}</strong></div>
                @endif
            </div>
        </section>
    </main>
</body>
</html>
