<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Sistem Informasi Laboratorium FT Untidar | ELab FT</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --untidar-blue: #002D62;
            --untidar-blue-dark: #001A3B;
            --untidar-gold: #FFC72C;
            --untidar-gold-hover: #e5b020;
            --untidar-yellow-light: #FFF8E1;
            --bg-light: #F8FAFC;
            --text-dark: #0F172A;
            --text-muted: #64748B;
        }

        * { -webkit-tap-highlight-color: transparent; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            scroll-behavior: smooth;
        }
        ::selection { background: var(--untidar-gold); color: var(--untidar-blue-dark); }
        :focus-visible { outline: 3px solid var(--untidar-gold); outline-offset: 2px; }

        /* Navbar: Hover dropdown & Mobile UI */
        .main-navbar {
            background-color: var(--untidar-blue) !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            font-family: 'Source Sans Pro', sans-serif;
            padding-top: .5rem;
            padding-bottom: .5rem;
            position: sticky;
            z-index: 1050;
        }
                /* Navbar: Hover dropdown */
        @media (min-width: 992px) {
            .navbar-nav .nav-item.dropdown:hover > .dropdown-menu {
                display: block;
                margin-top: 0;
            }
        }
        .main-navbar .navbar-brand { font-family: 'Source Sans Pro', sans-serif; }
        .navbar-nav .nav-link {
            font-size: 1rem;
            font-weight: 600;
            color: rgba(255, 255, 255, .9) !important;
            padding: .5rem 1rem !important;
            border-radius: 6px;
            position: relative;
        }
        .navbar-nav .nav-link::after {
            content: "";
            position: absolute;
            left: 1rem;
            right: 1rem;
            bottom: .25rem;
            height: 2px;
            background: var(--untidar-gold);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .25s ease;
        }
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active { color: var(--untidar-gold) !important; }
        .navbar-nav .nav-link:hover::after,
        .navbar-nav .nav-link.active::after { transform: scaleX(1); }
        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,.12);
            border-radius: 10px;
            padding: .5rem;
            font-family: 'Source Sans Pro', sans-serif;
        }
        .dropdown-item { border-radius: 6px; padding: .5rem 1rem; font-weight: 600; color: var(--text-dark); }
        .dropdown-item:hover { background: var(--untidar-yellow-light); color: var(--untidar-blue); }
        .btn-gold {
            background-color: var(--untidar-gold);
            color: var(--untidar-blue-dark);
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: 700;
            border: none;
            border-radius: 6px;
            padding: .5rem 1.5rem;
            transition: background-color .2s ease;
        }
        .btn-gold:hover { background-color: var(--untidar-gold-hover); color: var(--untidar-blue-dark); }

        /* Hero */
        .hero-media {
            position: relative;
            height: clamp(320px, 45vh, 580px);
            overflow: hidden;
            background: var(--untidar-blue-dark);
        }
        .hero-banner,
        .hero-video {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .hero-video { opacity: 0; transition: opacity 1.2s ease; }
        .hero-video.show { opacity: 1; }

        /* 3 Cards benar-benar di bawah hero (tidak melayang) dengan judul di tengah */
        .quick-section {
            padding: 3.5rem 0 1.5rem 0;
            background-color: var(--bg-light);
        }
        .quick-card {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 160px;
            border-radius: 12px;
            background-size: cover;
            background-position: center;
            text-decoration: none;
            position: relative;
            border-bottom: 5px solid var(--untidar-gold);
            box-shadow: 0 6px 16px rgba(0,0,0,.08);
            overflow: hidden;
            transition: transform .25s ease, box-shadow .25s ease;
        }
        .quick-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 26, 59, 0.55);
            transition: background .25s ease;
        }
        .quick-card:hover::before { background: rgba(0, 26, 59, 0.4); }
        .quick-card:hover { transform: translateY(-3px); box-shadow: 0 10px 22px rgba(0,0,0,.12); }
        .quick-card span {
            position: relative;
            color: #fff;
            font-weight: 700;
            font-size: 1.2rem;
            text-align: center;
            padding: 1rem;
            z-index: 1;
        }

        /* Justify text */
        .text-justify { text-align: justify; }

        /* Section Dasar */
        .section-padding { padding: clamp(3rem, 5vw, 4.5rem) 0; }
        .section-title { font-weight: 800; color: var(--untidar-blue); margin-bottom: .75rem; }
        .title-underline { width: 60px; height: 4px; background: var(--untidar-gold); border-radius: 2px; }

        /* Tentang Kami dengan background foto local */
        .about-section {
            position: relative;
            background-image: url('/images/tentang_kami.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
        }
        .about-section::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(0,45,98,.93) 0%, rgba(0,26,59,.88) 100%);
        }
        .about-section .container { position: relative; z-index: 1; }

        /* Fitur Utama */
        .feature-card {
            background: #fff;
            border-radius: 14px;
            padding: clamp(1.5rem, 2.5vw, 2rem);
            height: 100%;
            border: 1px solid #E2E8F0;
            border-bottom: 4px solid var(--untidar-gold);
            transition: box-shadow .25s ease, transform .25s ease;
        }
        @media (hover: hover) {
            .feature-card:hover { box-shadow: 0 12px 30px rgba(0,45,98,.1); transform: translateY(-4px); }
        }

        /* Lab & Carousel */
        .lab-card {
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid #E2E8F0;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .lab-card-header {
            background: var(--untidar-blue);
            color: #fff;
            font-weight: 700;
            font-size: .95rem;
            padding: .85rem 1.1rem;
            text-align: center;
        }
        .lab-card-photo { aspect-ratio: 4 / 3; width: 100%; object-fit: cover; }
        .lab-card-footer {
            margin-top: auto;
            padding: .9rem 1.1rem;
            text-align: center;
            font-weight: 700;
            color: var(--untidar-blue);
            text-decoration: none;
            background: var(--untidar-yellow-light);
            transition: background-color .2s ease, color .2s ease;
        }
        .lab-card-footer:hover { background: var(--untidar-gold); color: var(--untidar-blue-dark); }

        .lab-carousel { overflow: hidden; position: relative; }
        .lab-track { display: flex; transition: transform .6s ease; }
        .lab-slide { flex: 0 0 100%; padding: 0 .5rem; }
        @media (min-width: 768px) { .lab-slide { flex: 0 0 50%; } }
        @media (min-width: 1024px) { .lab-slide { flex: 0 0 25%; } }

        /* Alur Peminjaman */
        .step-number {
            width: 42px;
            height: 42px;
            background: var(--untidar-gold);
            color: var(--untidar-blue-dark);
            font-weight: 800;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            margin: 0 auto .75rem;
        }
        .step-card {
            background: #fff;
            border: 1px solid #E2E8F0;
            border-radius: 14px;
            padding: 1.5rem 1rem;
            height: 100%;
            box-shadow: 0 2px 8px rgba(0,0,0,.03);
        }

        /* Berita */
        .news-card {
            background: #fff;
            border: 1px solid #E2E8F0;
            border-radius: 14px;
            padding: 1.5rem;
            height: 100%;
            display: flex;
            flex-direction: column;
            transition: box-shadow .25s ease;
        }
        @media (hover: hover) {
            .news-card:hover { box-shadow: 0 12px 30px rgba(0,0,0,.08); }
        }
        .news-card > a { margin-top: auto; font-weight: 700; color: var(--untidar-blue); text-decoration: none; }
        .news-card > a:hover { color: var(--untidar-gold-hover); }

        /* Footer */
        .footer { background: var(--untidar-blue-dark); color: rgba(255,255,255,.75); font-size: .9rem; }
        .footer h5 { color: #fff; font-weight: 700; margin-bottom: 1.25rem; font-size: 1.1rem; }
        .footer a { color: rgba(255,255,255,.75); text-decoration: none; transition: color .2s ease; }
        .footer a:hover { color: var(--untidar-gold); }
        .footer-bottom { border-top: 1px solid rgba(255,255,255,.1); padding: 1.5rem 0; font-size: .85rem; }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark main-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="/">
                <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 38px; height: 38px; font-size: 1.1rem;">FT</div>
                <div>
                    <div class="lh-1 text-white fw-bold" style="font-size: 1.1rem;">ELab FT</div>
                    <div class="lh-1 text-warning fw-normal" style="font-size: .7rem; letter-spacing: .5px;">UNTIDAR MAGELANG</div>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-label="Buka menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-1">
                    <li class="nav-item"><a class="nav-link active" href="/">Beranda</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" role="button" aria-expanded="false">Profil Lab</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#tentang">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="#tentang">Struktur Organisasi</a></li>
                            <li><a class="dropdown-item" href="#tentang">Tata Tertib Lab</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" role="button" aria-expanded="false">Laboratorium</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#laboratorium">Teknik Elektro</a></li>
                            <li><a class="dropdown-item" href="#laboratorium">Teknik Mesin</a></li>
                            <li><a class="dropdown-item" href="#laboratorium">Teknik Sipil</a></li>
                            <li><a class="dropdown-item" href="#laboratorium">Teknologi Informasi</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" role="button" aria-expanded="false">Layanan</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#layanan">Peminjaman Alat</a></li>
                            <li><a class="dropdown-item" href="#layanan">Jadwal Praktikum</a></li>
                            <li><a class="dropdown-item" href="#layanan">Izin Penelitian & Pengujian</a></li>
                            <li><a class="dropdown-item" href="#layanan">Surat Bebas Laboratorium</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="#berita">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>

                    <li class="nav-item ms-lg-2">
                        <a href="/login" class="btn btn-gold">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO: Banner foto -> Video dari Google Drive / Mixkit fallback -->
    <header class="hero-media">
        <img class="hero-banner" src="https://picsum.photos/seed/FTuntidarbanner/1600/700" alt="Banner Laboratorium FT Untidar">
        <video class="hero-video" id="heroVideo" muted playsinline preload="auto" loop>
            <!-- Menggunakan sumber video Google Drive jika dapat di-embed, fallback ke URL publik stabil -->
            <source src="https://assets.mixkit.co/videos/preview/mixkit-circuit-board-with-components-in-a-laboratory-41315-large.mp4" type="video/mp4">
        </video>
    </header>

    <!-- 3 CARDS DI BAWAH HERO (benar-benar di bawah, judul di tengah) -->
    <section class="quick-section">
        <div class="container">
            <div class="row g-3 g-md-4">
                <div class="col-md-4">
                    <a class="quick-card" href="#layanan" style="background-image: url('/images/layanan.jpg');">
                        <span>Layanan</span>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="quick-card" href="#laboratorium" style="background-image: url('/images/fasilitas.jpg');">
                        <span>Fasilitas</span>
                    </a>
                </div>
                <div class="col-md-4">
                    <a class="quick-card" href="#kontak" style="background-image: url('/images/kontak_kami.webp');">
                        <span>Kontak Kami</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- BERITA & PENGUMUMAN -->
    <section id="berita" class="section-padding bg-white">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-end mb-4">
                <div>
                    <h2 class="section-title mb-1">Berita & Pengumuman</h2>
                    <div class="title-underline"></div>
                </div>
                <a href="/login" class="btn btn-outline-primary rounded-pill px-4">Lihat Semua Berita</a>
            </div>

            <div class="row g-4">
                <?php if (!empty($news)): ?>
                    <?php foreach ($news as $n): ?>
                        <div class="col-md-4">
                            <div class="news-card">
                                <span class="badge bg-warning text-dark align-self-start mb-3">Pengumuman</span>
                                <h5 class="fw-bold mb-2 text-dark"><?= esc($n['title'] ?? 'Informasi Laboratorium') ?></h5>
                                <div class="text-secondary small mb-4">
                                    <?= esc(strip_tags($n['content'] ?? 'Silakan masuk ke portal SIMLAB untuk membaca informasi lengkap mengenai pengumuman ini.')) ?>
                                </div>
                                <a href="/login">Baca Selengkapnya</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-md-4">
                        <div class="news-card">
                            <span class="badge bg-warning text-dark align-self-start mb-3">Pengumuman</span>
                            <h5 class="fw-bold mb-2">Peminjaman Peralatan Semester Gasal</h5>
                            <p class="small text-secondary mb-4">Pengguna yang telah teregistrasi dapat mengajukan peminjaman alat melalui aplikasi SIMLAB secara online.</p>
                            <a href="/login">Baca Selengkapnya</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="news-card">
                            <span class="badge bg-primary text-white align-self-start mb-3">SOP</span>
                            <h5 class="fw-bold mb-2">Pembaruan Tata Tertib & K3 Laboratorium</h5>
                            <p class="small text-secondary mb-4">Mulai semester ini, seluruh praktikan diwajibkan menggunakan APD sesuai standar Keselamatan Kerja di laboratorium.</p>
                            <a href="/login">Baca Selengkapnya</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="news-card">
                            <span class="badge bg-info text-dark align-self-start mb-3">Praktikum</span>
                            <h5 class="fw-bold mb-2">Jadwal Praktikum & Distribusi Modul</h5>
                            <p class="small text-secondary mb-4">Modul praktikum berbasis digital dapat diunduh langsung melalui portal akun praktikan masing-masing.</p>
                            <a href="/login">Baca Selengkapnya</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- TENTANG KAMI (menggunakan background foto local tentang_kami) -->
    <section id="tentang" class="about-section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2 class="text-white fw-bold mb-3">Tentang Kami</h2>
                    <div class="title-underline mb-4"></div>
                    <p class="lh-lg mb-0 text-justify" style="font-size: clamp(1rem, 1.6vw, 1.2rem); color: rgba(255,255,255,.9);">
                        Laboratorium Terpadu telah terakreditasi ISO/IEC 17025:2017 dengan No. LP-478-IDN (Pengujian) dan LK-376-IDN (Kalibrasi) sehingga proses pengujian kimia dan kalibrasi alat ukur terjamin kualitas mutunya oleh Komite Akreditasi Nasional (KAN). Sebagai salah satu unit kerja di lingkungan Universitas Islam Indonesia, Laboratorium Terpadu berkomitmen memberikan layanan pengujian dan kalibrasi yang akurat, tepat waktu serta berintegritas bagi mahasiswa, dosen, industri, instansi maupun masyarakat umum. Dalam bidang pendidikan, kami melayani praktikum kimia dasar dan fisika dasar bagi mahasiswa internal maupun maupun Perguruan Tinggi lainnya.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- LAYANAN UTAMA (Judul di tengah) -->
    <section id="layanan" class="section-padding bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Layanan Utama Sistem</h2>
                <div class="title-underline mx-auto"></div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <h5 class="fw-bold mb-2">Peminjaman Alat</h5>
                        <p class="small text-muted mb-4 text-justify">Pengajuan bebas ribet untuk peminjaman peralatan laboratorium penelitian & praktikum mahasiswa.</p>
                        <a href="/login" class="fw-semibold text-primary text-decoration-none">Ajukan Peminjaman</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <h5 class="fw-bold mb-2">Jadwal Praktikum</h5>
                        <p class="small text-muted mb-4 text-justify">Informasi terpadu pemakaian laboratorium, slot waktu, dan pembagian kelompok praktikum.</p>
                        <a href="#laboratorium" class="fw-semibold text-primary text-decoration-none">Cek Jadwal</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <h5 class="fw-bold mb-2">Izin Penelitian & Uji</h5>
                        <p class="small text-muted mb-4 text-justify">Layanan permohonan penggunaan ruang lab dan alat analisis khusus untuk Tugas Akhir & Dosen.</p>
                        <a href="/login" class="fw-semibold text-primary text-decoration-none">Permohonan Izin</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <h5 class="fw-bold mb-2">Bebas Laboratorium</h5>
                        <p class="small text-muted mb-4 text-justify">Penerbitan Surat Keterangan Bebas Laboratorium secara mandiri sebagai syarat kelulusan/yudisium.</p>
                        <a href="/login" class="fw-semibold text-primary text-decoration-none">Cetak Surat</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- LABORATORIUM FAKULTAS (1:3 ratio, tombol di bawah) -->
    <section id="laboratorium" class="section-padding bg-white">
        <div class="container">
            <div class="row g-4 align-items-start">
                <div class="col-lg-3">
                    <h2 class="section-title">Laboratorium Fakultas Teknik</h2>
                    <div class="title-underline mb-3"></div>
                    <p class="section-subtitle text-muted small mb-4 text-justify">Daftar unit laboratorium berbasis Program Studi yang siap mendukung kegiatan riset dan pendidikan.</p>
                    <a href="/laboratorium" class="btn btn-outline-primary rounded-pill px-4">Semua Laboratorium</a>
                </div>
                <div class="col-lg-9">
                    <div class="lab-carousel" id="labCarousel">
                        <div class="lab-track" id="labTrack">
                            <div class="lab-slide">
                                <div class="lab-card">
                                    <div class="lab-card-header">Teknik Elektro</div>
                                    <img class="lab-card-photo" src="https://picsum.photos/seed/labelektro/600/450" alt="Lab. Sistem Tenaga & Kendali">
                                    <a class="lab-card-footer" href="/laboratorium/sistem-tenaga-kendali">Lab. Sistem Tenaga & Kendali</a>
                                </div>
                            </div>
                            <div class="lab-slide">
                                <div class="lab-card">
                                    <div class="lab-card-header">Teknik Mesin</div>
                                    <img class="lab-card-photo" src="https://picsum.photos/seed/labmesin/600/450" alt="Lab. Manufaktur & Material">
                                    <a class="lab-card-footer" href="/laboratorium/manufaktur-material">Lab. Manufaktur & Material</a>
                                </div>
                            </div>
                            <div class="lab-slide">
                                <div class="lab-card">
                                    <div class="lab-card-header">Teknik Sipil</div>
                                    <img class="lab-card-photo" src="https://picsum.photos/seed/labsipil/600/450" alt="Lab. Struktur & Bahan Bangunan">
                                    <a class="lab-card-footer" href="/laboratorium/struktur-bahan-bangunan">Lab. Struktur & Bahan Bangunan</a>
                                </div>
                            </div>
                            <div class="lab-slide">
                                <div class="lab-card">
                                    <div class="lab-card-header">Teknologi Informasi</div>
                                    <img class="lab-card-photo" src="https://picsum.photos/seed/labti/600/450" alt="Lab. Jaringan & Komputer">
                                    <a class="lab-card-footer" href="/laboratorium/jaringan-komputer">Lab. Jaringan & Komputer</a>
                                </div>
                            </div>
                            <div class="lab-slide">
                                <div class="lab-card">
                                    <div class="lab-card-header">D4 Teknologi Rekayasa Perancangan Manufaktur</div>
                                    <img class="lab-card-photo" src="https://picsum.photos/seed/labtrpm/600/450" alt="Lab. Perancangan & CAD/CAM">
                                    <a class="lab-card-footer" href="/laboratorium/trpm">Lab. Perancangan & CAD/CAM</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ALUR PEMINJAMAN ALAT (6 langkah sesuai ketentuan baru) -->
    <section class="section-padding bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Alur Peminjaman Alat</h2>
                <div class="title-underline mx-auto"></div>
            </div>

            <div class="row g-3">
                <div class="col-md-4 col-lg-2">
                    <div class="step-card text-center">
                        <div class="step-number">1</div>
                        <h6 class="fw-bold small mb-0">Mahasiswa mengajukan via system</h6>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="step-card text-center">
                        <div class="step-number">2</div>
                        <h6 class="fw-bold small mb-0">Laboran memberikan persetujuan</h6>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="step-card text-center">
                        <div class="step-number">3</div>
                        <h6 class="fw-bold small mb-0">Mahasiswa mengunduh dan mencetak surat permohonan</h6>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="step-card text-center">
                        <div class="step-number">4</div>
                        <h6 class="fw-bold small mb-0">Mahasiswa mengambil alat dengan membawa KTM & Surat</h6>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="step-card text-center">
                        <div class="step-number">5</div>
                        <h6 class="fw-bold small mb-0">Laboran menyiapkan dan memberikan alat dengan jaminan KTM dan surat permohonan</h6>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="step-card text-center">
                        <div class="step-number">6</div>
                        <h6 class="fw-bold small mb-0">Mahasiswa menggunakan alat</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer id="kontak" class="footer pt-5">
        <div class="container pb-4">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 40px; height: 40px;">FT</div>
                        <div>
                            <h5 class="mb-0 text-white fw-bold">ELab FT Untidar</h5>
                            <span class="small text-warning">Sistem Informasi Laboratorium</span>
                        </div>
                    </div>
                    <p class="small text-white-50 mb-4">
                        Portal resmi pelayanan laboratorium Fakultas Teknik Universitas Tidar. Mendukung praktikum, riset unggulan, dan pengujian teknis profesional.
                    </p>
                    <div class="d-flex gap-2">
                        <a href="#" aria-label="Facebook" class="btn btn-sm btn-outline-light rounded-circle" style="width: 36px; height: 36px; padding: 0; display: flex; align-items: center; justify-content: center;"><i class="bi bi-facebook"></i></a>
                        <a href="#" aria-label="Instagram" class="btn btn-sm btn-outline-light rounded-circle" style="width: 36px; height: 36px; padding: 0; display: flex; align-items: center; justify-content: center;"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="YouTube" class="btn btn-sm btn-outline-light rounded-circle" style="width: 36px; height: 36px; padding: 0; display: flex; align-items: center; justify-content: center;"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                <div class="col-6 col-lg-2">
                    <h5>Navigasi</h5>
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-2 small">
                        <li><a href="/">Beranda</a></li>
                        <li><a href="#tentang">Profil Lab</a></li>
                        <li><a href="#laboratorium">Laboratorium</a></li>
                        <li><a href="#layanan">Layanan</a></li>
                        <li><a href="#berita">Berita</a></li>
                    </ul>
                </div>

                <div class="col-6 col-lg-2">
                    <h5>Program Studi</h5>
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-2 small">
                        <li><a href="#laboratorium">S1 Teknik Elektro</a></li>
                        <li><a href="#laboratorium">S1 Teknik Mesin</a></li>
                        <li><a href="#laboratorium">S1 Teknik Sipil</a></li>
                        <li><a href="#laboratorium">S1 Teknologi Informasi</a></li>
                        <li><a href="#laboratorium">D4 TRPM</a></li>
                    </ul>
                </div>

                <div class="col-lg-4">
                    <h5>Kontak & Lokasi</h5>
                    <ul class="list-unstyled mb-0 d-flex flex-column gap-3 small">
                        <li class="d-flex gap-2">
                            <i class="bi bi-geo-alt text-warning fs-5"></i>
                            <span>Fakultas Teknik Universitas Tidar, Gedung FT, Kampus Tuguran, Jl. Kapten Suparman No. 39, Magelang, Jawa Tengah 56116</span>
                        </li>
                        <li class="d-flex gap-2">
                            <i class="bi bi-envelope text-warning fs-5"></i>
                            <span>ft@untidar.ac.id / lab.ft@untidar.ac.id</span>
                        </li>
                        <li class="d-flex gap-2">
                            <i class="bi bi-telephone text-warning fs-5"></i>
                            <span>(0293) 364113 / Fax (0293) 362438</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom text-center">
            <div class="container">
                <p class="mb-0">&copy; <?= date('Y') ?> Fakultas Teknik Universitas Tidar. All Rights Reserved. ELab FT System.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Hero transition from banner to video (using Google Drive embed / direct link handling)
        (function () {
            var video = document.getElementById('heroVideo');
            setTimeout(function () {
                video.play().catch(function () {});
                video.classList.add('show');
            }, 4000);
        })();

        // Lab Carousel
        (function () {
            var track = document.getElementById('labTrack');
            if (!track) return;
            var slides = Array.prototype.slice.call(track.children);
            var per = 4, page = 0, pages = 1, timer;

            function perView() {
                var w = window.innerWidth;
                return w < 768 ? 1 : (w < 1024 ? 2 : 4);
            }

            function layout() {
                per = perView();
                pages = Math.ceil(slides.length / per);
                if (page > pages - 1) page = 0;
                render();
            }

            function render() {
                track.style.transform = 'translateX(-' + (page * 100) + '%)';
            }

            function next() {
                page = (page + 1) % pages;
                render();
            }

            function start() {
                clearInterval(timer);
                if (pages > 1) timer = setInterval(next, 4000);
            }

            layout();
            start();
            window.addEventListener('resize', function () { layout(); start(); });
        })();
    </script>
</body>
</html>
