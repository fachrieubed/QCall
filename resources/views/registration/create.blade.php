<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Sekarang - QCall</title>

    <link rel="stylesheet" href="{{ asset('css/qcall.css') }}">
</head>

<body class="registration-page">

    <header class="registration-header">
        <a href="{{ route('home') }}" class="registration-back">
            <span>←</span>
            <span>Program Lainnya</span>
        </a>

        <div class="registration-country" aria-label="Indonesia">
            <span></span>
        </div>
    </header>

    <main class="registration-main">

        <section class="registration-program-card">
            <div class="registration-program-image">
                <div class="program-image-title">Belajar Quran dengan<br><strong>Pembimbing Bersahabat</strong></div>
                <div class="program-people">
                    <span>👩🏻</span>
                    <span>👩🏽</span>
                    <span>👨🏻</span>
                    <span>👨🏽</span>
                </div>
                <div class="program-image-line">Quran Tahsin & Tilawah Mentoring</div>
            </div>

            <div class="registration-program-copy">
                <h1>Cinta Quran Call</h1>
                <p>
                    <strong>Qur'an Tahsin and Tilawah Mentoring Service.</strong>
                    Led directly by certified instructors from CintaQuran.
                    This service is provided <strong>free of charge.</strong>
                </p>
            </div>
        </section>

        @if (session('success'))
            <div class="registration-success">
                <span class="success-icon">✓</span>
                <div>
                    <strong>Pendaftaran berhasil!</strong>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="registration-errors">
                <strong>Cek lagi data kamu:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('registration.store') }}" method="POST" class="registration-form">
            @csrf

            <div class="form-field">
                <label for="name">Nama <span>*</span></label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Masukan Nama"
                    autocomplete="name"
                    required
                >
            </div>

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
                >
            </div>

            <div class="form-field">
                <label for="password">Password <span>*</span></label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Buat password minimal 8 karakter"
                    autocomplete="new-password"
                    minlength="8"
                    required
                >
            </div>

            <div class="form-field">
                <label for="password_confirmation">Konfirmasi Password <span>*</span></label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Masukan ulang password"
                    autocomplete="new-password"
                    minlength="8"
                    required
                >
            </div>

            <div class="form-field">
                <label for="phone">Nomor Handphone/Whatsapp <span>*</span></label>
                <div class="phone-input">
                    <div class="country-code">
                        <span class="mini-flag"></span>
                        <span>+62</span>
                    </div>
                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        value="{{ old('phone') }}"
                        placeholder="Masukan nomor Whatsapp"
                        autocomplete="tel"
                        required
                    >
                </div>
            </div>

            <div class="form-field">
                <label for="gender">Jenis Kelamin</label>
                <div class="select-wrap">
                    <select id="gender" name="gender">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" @selected(old('gender') === 'Laki-laki')>Laki-laki</option>
                        <option value="Perempuan" @selected(old('gender') === 'Perempuan')>Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="form-field">
                <label for="country">Negara</label>
                <div class="select-wrap">
                    <select id="country" name="country">
                        <option value="">Pilih Negara</option>
                        <option value="Indonesia" @selected(old('country', 'Indonesia') === 'Indonesia')>Indonesia</option>
                        <option value="Malaysia" @selected(old('country') === 'Malaysia')>Malaysia</option>
                        <option value="Singapura" @selected(old('country') === 'Singapura')>Singapura</option>
                        <option value="Brunei Darussalam" @selected(old('country') === 'Brunei Darussalam')>Brunei Darussalam</option>
                        <option value="Lainnya" @selected(old('country') === 'Lainnya')>Lainnya</option>
                    </select>
                </div>
            </div>

            <div class="form-field">
                <label for="age">Usia <span>*</span></label>
                <input
                    type="number"
                    id="age"
                    name="age"
                    value="{{ old('age') }}"
                    placeholder="Masukan usia anda sekarang"
                    min="5"
                    max="100"
                    required
                >
            </div>

            <div class="form-field">
                <label for="preferred_time">Waktu <span>*</span></label>
                <div class="select-wrap">
                    <select id="preferred_time" name="preferred_time" required>
                        <option value="">Pilih waktu belajar</option>
                        <option value="Pagi (08.00 - 12.00)" @selected(old('preferred_time') === 'Pagi (08.00 - 12.00)')>Pagi (08.00 - 12.00)</option>
                        <option value="Siang (12.00 - 15.00)" @selected(old('preferred_time') === 'Siang (12.00 - 15.00)')>Siang (12.00 - 15.00)</option>
                        <option value="Sore (15.00 - 18.00)" @selected(old('preferred_time') === 'Sore (15.00 - 18.00)')>Sore (15.00 - 18.00)</option>
                        <option value="Malam (18.00 - 21.00)" @selected(old('preferred_time') === 'Malam (18.00 - 21.00)')>Malam (18.00 - 21.00)</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="registration-submit">
                <span>Daftar Sekarang</span>
                <span class="submit-arrow">→</span>
            </button>
        </form>
    </main>

</body>
</html>
