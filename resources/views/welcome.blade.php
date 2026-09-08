<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>QCall - Bimbingan Belajar Quran</title>

    <link rel="stylesheet" href="{{ asset('css/qcall.css') }}">
</head>

<body>

    <!-- ================= NAVBAR ================= -->
    <header class="navbar">
        <div class="nav-container">

            <a href="/" class="logo">
                <div class="logo-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <div class="logo-text">
                    <strong>QC</strong><span>CALL</span>
                </div>
            </a>

            <nav class="nav-menu">
                <a href="#tentang">Tentang Kami</a>
                <a href="#program">Program</a>
                <a href="#testimoni">Testimoni</a>
                <a href="#pembimbing">Pembimbing</a>
                <a href="#donasi">Donasi</a>

                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="nav-login">Admin Panel</a>
                    @else
                        <a href="{{ route('user.dashboard') }}" class="nav-login">Dashboard</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}" class="nav-logout-form">
                        @csrf
                        <button type="submit" class="nav-logout">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-login">Masuk</a>
                    <a href="{{ route('registration.create') }}" class="nav-button">
                        Daftar Sekarang - Gratis
                    </a>
                @endauth
            </nav>

            <button class="mobile-menu-button" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div>

        <div class="mobile-menu" id="mobileMenu">
            <a href="#tentang" onclick="toggleMenu()">Tentang Kami</a>
            <a href="#program" onclick="toggleMenu()">Program</a>
            <a href="#testimoni" onclick="toggleMenu()">Testimoni</a>
            <a href="#pembimbing" onclick="toggleMenu()">Pembimbing</a>
            <a href="#donasi" onclick="toggleMenu()">Donasi</a>

            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" onclick="toggleMenu()">Admin Panel</a>
                @else
                    <a href="{{ route('user.dashboard') }}" onclick="toggleMenu()">Dashboard</a>
                @endif

                <form method="POST" action="{{ route('logout') }}" class="mobile-logout-form">
                    @csrf
                    <button type="submit" class="mobile-nav-button">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}" onclick="toggleMenu()">Masuk</a>
                <a href="{{ route('registration.create') }}" class="mobile-nav-button" onclick="toggleMenu()">
                    Daftar Sekarang - Gratis
                </a>
            @endauth
        </div>
    </header>


    <!-- ================= HERO ================= -->
    <main>

        <section class="hero">

            <!-- dekorasi -->
            <div class="hero-circle circle-one"></div>
            <div class="hero-circle circle-two"></div>
            <div class="hero-circle circle-three"></div>

            <div class="hero-container">

                <!-- LEFT -->
                <div class="hero-content">

                    <div class="partner">
                        <span>Part of</span>

                        <div class="partner-logo">
                            <div class="partner-mark">✦</div>
                            <div>
                                <strong>CintaQuran</strong>
                                <small>FOUNDATION</small>
                            </div>
                        </div>
                    </div>

                    <h1>
                        Bimbingan Belajar<br>
                        Quran Paling<br>
                        Nyaman Serasa<br>
                        Ngobrol sama Bestie
                    </h1>

                    <p class="hero-description">
                        Pelajari cara membaca dan menghafal Al-Quran
                        dengan pendekatan yang nyaman, menyenangkan,
                        dan interaktif, seperti berdiskusi dengan sahabat terbaik.
                    </p>

                    <div class="hero-actions">

                        <a href="{{ route('registration.create') }}" class="primary-button">
                            Daftar Sekarang - Gratis
                        </a>

                        <a href="#video" class="video-button">
                            <span class="play-icon">▶</span>
                            Tonton Video
                        </a>

                    </div>

                </div>


                <!-- RIGHT -->
                <div class="hero-visual">

                    <div class="mentor-badge">
                        <div class="mini-avatars">
                            <span>👩🏻</span>
                            <span>👨🏻</span>
                        </div>

                        <div>
                            <strong>100rb++</strong>
                            <small>Bimbingan</small>
                        </div>
                    </div>


                    <!-- FOTO UTAMA -->
                    <div class="main-photo photo-placeholder">

                        <div class="laptop">
                            <div class="screen">
                                <div class="screen-line"></div>
                                <div class="screen-line short"></div>
                                <div class="screen-line"></div>
                                <div class="screen-line tiny"></div>
                            </div>

                            <div class="keyboard">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>

                        <div class="phone">
                            <div class="phone-screen">
                                <div class="person-face">🙂</div>
                            </div>
                        </div>

                        <div class="headphone"></div>

                    </div>


                    <!-- FOTO BAWAH -->
                    <div class="small-photo-row">

                        <div class="small-photo woman">
                            <div class="person">
                                <div class="head">👩🏻</div>
                                <div class="body"></div>
                            </div>

                            <div class="headset"></div>
                        </div>

                        <div class="small-photo man">
                            <div class="person">
                                <div class="head">👨🏽</div>
                                <div class="body dark"></div>
                            </div>

                            <div class="headset"></div>
                        </div>

                    </div>

                </div>

            </div>


            <!-- CURVE BAWAH -->
            <div class="hero-bottom-curve"></div>

        </section>


        <!-- ================= TENTANG ================= -->
        <section class="section white-section" id="tentang">

            <div class="section-container">

                <div class="section-label">
                    TENTANG KAMI
                </div>

                <h2>
                    Belajar Quran dengan cara
                    yang lebih nyaman
                </h2>

                <p>
                    QCall hadir untuk membuat proses belajar Al-Quran
                    terasa lebih dekat, santai, interaktif, dan menyenangkan.
                    Belajar bukan cuma tentang materi, tapi juga tentang
                    teman belajar yang bikin nyaman.
                </p>

            </div>

        </section>


        <!-- ================= PROGRAM ================= -->
        <section class="section program-section" id="program">

            <div class="section-container">

                <div class="section-heading">
                    <div>
                        <div class="section-label">PROGRAM</div>

                        <h2>
                            Pilih program belajar<br>
                            yang cocok buat kamu
                        </h2>
                    </div>

                    <p>
                        Program dirancang untuk berbagai kebutuhan
                        belajar Al-Quran secara fleksibel.
                    </p>
                </div>


                <div class="program-grid">

                    <div class="program-card">
                        <div class="program-icon">📖</div>
                        <h3>Belajar Membaca Quran</h3>
                        <p>
                            Mulai dari dasar hingga semakin lancar
                            membaca Al-Quran.
                        </p>

                        <a href="{{ route('registration.create') }}">Pelajari →</a>
                    </div>


                    <div class="program-card featured">
                        <div class="program-icon">✨</div>
                        <h3>Tahsin & Tahfidz</h3>
                        <p>
                            Tingkatkan kualitas bacaan sekaligus
                            membangun hafalan Quran.
                        </p>

                        <a href="{{ route('registration.create') }}">Pelajari →</a>
                    </div>


                    <div class="program-card">
                        <div class="program-icon">💬</div>
                        <h3>Private Learning</h3>
                        <p>
                            Belajar lebih personal bersama
                            pembimbing pilihan.
                        </p>

                        <a href="{{ route('registration.create') }}">Pelajari →</a>
                    </div>

                </div>

            </div>

        </section>


        <!-- ================= TESTIMONI ================= -->
        <section class="section white-section" id="testimoni">

            <div class="section-container">

                <div class="section-label">
                    TESTIMONI
                </div>

                <h2>
                    Kata mereka tentang QCall
                </h2>


                <div class="testimonial-grid">

                    <div class="testimonial-card">
                        <div class="stars">★★★★★</div>

                        <p>
                            "Belajarnya santai banget. Rasanya seperti
                            ngobrol sama teman sendiri tapi tetap dapat
                            ilmu yang banyak."
                        </p>

                        <div class="testimonial-user">
                            <div class="avatar">A</div>

                            <div>
                                <strong>Alia</strong>
                                <small>Peserta QCall</small>
                            </div>
                        </div>
                    </div>


                    <div class="testimonial-card">
                        <div class="stars">★★★★★</div>

                        <p>
                            "Pembimbingnya sabar dan cara menjelaskannya
                            gampang dipahami. Jadi makin semangat belajar."
                        </p>

                        <div class="testimonial-user">
                            <div class="avatar">R</div>

                            <div>
                                <strong>Rizky</strong>
                                <small>Peserta QCall</small>
                            </div>
                        </div>
                    </div>


                    <div class="testimonial-card">
                        <div class="stars">★★★★★</div>

                        <p>
                            "Enak banget karena bisa belajar dari rumah
                            dan waktunya fleksibel."
                        </p>

                        <div class="testimonial-user">
                            <div class="avatar">N</div>

                            <div>
                                <strong>Nadia</strong>
                                <small>Peserta QCall</small>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>


        <!-- ================= PEMBIMBING ================= -->
        <section class="section mentor-section" id="pembimbing">

            <div class="section-container">

                <div class="section-heading">

                    <div>
                        <div class="section-label">
                            PEMBIMBING
                        </div>

                        <h2>
                            Belajar bersama<br>
                            pembimbing terbaik
                        </h2>
                    </div>

                </div>


                <div class="mentor-grid">

                    <div class="mentor-card">
                        <div class="mentor-image">👩🏻‍🏫</div>

                        <h3>Ustadzah Aisyah</h3>
                        <p>Tahsin & Tahfidz</p>
                    </div>


                    <div class="mentor-card">
                        <div class="mentor-image">👨🏻‍🏫</div>

                        <h3>Ustadz Ahmad</h3>
                        <p>Quran & Tajwid</p>
                    </div>


                    <div class="mentor-card">
                        <div class="mentor-image">👩🏻‍🏫</div>

                        <h3>Ustadzah Nabila</h3>
                        <p>Private Learning</p>
                    </div>


                    <div class="mentor-card">
                        <div class="mentor-image">👨🏽‍🏫</div>

                        <h3>Ustadz Fajar</h3>
                        <p>Tahfidz</p>
                    </div>

                </div>

            </div>

        </section>


        <!-- ================= CTA ================= -->
        <section class="cta-section" id="daftar">

            <div class="cta-decoration"></div>

            <div class="cta-content">

                <div class="section-label">
                    MULAI SEKARANG
                </div>

                <h2>
                    Yuk, mulai perjalanan<br>
                    belajar Quran kamu!
                </h2>

                <p>
                    Daftar sekarang dan rasakan pengalaman
                    belajar Quran yang berbeda.
                </p>

                <a href="#" class="primary-button white-button">
                    Daftar Sekarang - Gratis
                </a>

            </div>

        </section>


        <!-- ================= FOOTER ================= -->
        <footer class="footer" id="donasi">

            <div class="footer-container">

                <div class="footer-brand">

                    <div class="logo footer-logo">

                        <div class="logo-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                        <div class="logo-text">
                            <strong>QC</strong><span>CALL</span>
                        </div>

                    </div>

                    <p>
                        Teman belajar Quran yang nyaman,
                        interaktif, dan menyenangkan.
                    </p>

                </div>


                <div class="footer-column">

                    <h4>Menu</h4>

                    <a href="#tentang">Tentang Kami</a>
                    <a href="#program">Program</a>
                    <a href="#testimoni">Testimoni</a>
                    <a href="#pembimbing">Pembimbing</a>

                </div>


                <div class="footer-column">

                    <h4>Informasi</h4>

                    <a href="{{ route('registration.create') }}">Pendaftaran</a>
                    <a href="#donasi">Donasi</a>
                    <a href="#">FAQ</a>
                    <a href="#">Kontak</a>

                </div>


                <div class="footer-column">

                    <h4>Hubungi Kami</h4>

                    <p>Instagram</p>
                    <p>WhatsApp</p>
                    <p>Email</p>

                </div>

            </div>


            <div class="footer-bottom">
                <p>
                    © {{ date('Y') }} QCall. All rights reserved.
                </p>
            </div>

        </footer>

    </main>


    <script>

        function toggleMenu() {

            const menu = document.getElementById('mobileMenu');

            menu.classList.toggle('active');

        }

    </script>

</body>
</html>