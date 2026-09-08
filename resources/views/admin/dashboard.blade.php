<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin QCall</title>
    <link rel="stylesheet" href="{{ asset('css/qcall.css') }}">
</head>
<body class="portal-page admin-page">
    <header class="portal-header">
        <a href="{{ route('home') }}" class="portal-logo"><strong>QC</strong>CALL <em>ADMIN</em></a>
        <div class="portal-user">
            <div class="portal-avatar admin-avatar">A</div>
            <div class="portal-user-info"><strong>{{ auth()->user()->name }}</strong><small>Administrator</small></div>
            <form method="POST" action="{{ route('logout') }}">@csrf<button class="logout-btn">Keluar</button></form>
        </div>
    </header>

    <main class="portal-container">
        <div class="portal-heading">
            <div>
                <span class="portal-kicker">ADMIN PANEL</span>
                <h1>Data Pendaftar</h1>
                <p>Kelola peserta yang mendaftar program QCall.</p>
            </div>
        </div>

        @if(session('success'))
            <div class="portal-alert success">{{ session('success') }}</div>
        @endif

        <section class="stats-grid">
            <div class="stat-card"><span>Total</span><strong>{{ $stats['total'] }}</strong><small>Semua pendaftar</small></div>
            <div class="stat-card pending"><span>Menunggu</span><strong>{{ $stats['pending'] }}</strong><small>Perlu ditinjau</small></div>
            <div class="stat-card accepted"><span>Diterima</span><strong>{{ $stats['accepted'] }}</strong><small>Peserta aktif</small></div>
            <div class="stat-card rejected"><span>Ditolak</span><strong>{{ $stats['rejected'] }}</strong><small>Ditolak</small></div>
        </section>

        <section class="admin-table-card">
            <div class="table-head">
                <div><h2>Daftar Pendaftaran</h2><p>Update status peserta langsung dari panel ini.</p></div>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr><th>Peserta</th><th>WhatsApp</th><th>Detail</th><th>Status</th><th>Aksi</th></tr>
                    </thead>
                    <tbody>
                    @forelse($registrations as $registration)
                        <tr>
                            <td><div class="table-person"><span>{{ strtoupper(substr($registration->name,0,1)) }}</span><div><strong>{{ $registration->name }}</strong><small>{{ $registration->user?->email ?? 'Pendaftaran publik' }}</small></div></div></td>
                            <td>{{ $registration->phone }}</td>
                            <td><strong>{{ $registration->age }} tahun</strong><small class="table-sub">{{ $registration->gender ?: '-' }} · {{ $registration->country ?: '-' }}<br>{{ $registration->preferred_time }}</small></td>
                            <td><span class="badge-status {{ $registration->status }}">{{ $registration->status === 'accepted' ? 'Diterima' : ($registration->status === 'rejected' ? 'Ditolak' : 'Menunggu') }}</span></td>
                            <td>
                                <form method="POST" action="{{ route('admin.registrations.status', $registration) }}" class="status-form">
                                    @csrf @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" aria-label="Ubah status">
                                        <option value="pending" @selected($registration->status === 'pending')>Menunggu</option>
                                        <option value="accepted" @selected($registration->status === 'accepted')>Diterima</option>
                                        <option value="rejected" @selected($registration->status === 'rejected')>Ditolak</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="empty-table">Belum ada pendaftaran.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>
