<!DOCTYPE html>
<html lang="id" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AsMa - Aplikasi Pengaduan Mahasiswa, solusi modern untuk menyampaikan aspirasi dan pengaduan di lingkungan kampus.">
    <title>AsMa - Aplikasi Pengaduan Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3b82f6;
            --secondary-color: #f1f5f9;
            --text-dark: #1a202c;
            --text-muted: #6b7280;
            --accent-color: #f59e0b;
            --transition-speed: 0.3s;
            --card-bg: #ffffff;
            --bg-primary: #f8f9fa;
            --border-color: #e2e8f0;
        }
        [data-bs-theme="dark"] {
            --primary-color: #60a5fa;
            --secondary-color: #1a202c;
            --text-dark: #e2e8f0;
            --text-muted: #9ca3af;
            --accent-color: #facc15;
            --card-bg: #2d3748;
            --bg-primary: #1a202c;
            --border-color: #4a5568;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--secondary-color);
            color: var(--text-dark);
            line-height: 1.7;
            transition: all var(--transition-speed) ease;
            scroll-behavior: smooth;
        }
        .navbar {
            background: rgba(116, 116, 116, 0.7) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 0.8rem 0;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            transition: all var(--transition-speed) ease;
        }
        [data-bs-theme="dark"] .navbar {
            background: rgba(26, 32, 44, 0.7) !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .navbar-brand {
            font-weight: 800;
            font-size: 1.8rem;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            letter-spacing: -0.5px;
        }
        .navbar-brand:hover, 
        .navbar-brand:focus {
            color: var(--primary-color) !important;
            background: transparent !important;
        }
        .navbar-brand span {
            color: var(--accent-color);
        }
        .navbar-brand i {
            margin-right: 0.5rem;
            font-size: 2rem;
        }
        .navbar-nav .nav-link {
            font-weight: 600;
            color: var(--text-dark);
            padding: 0.6rem 1.2rem;
            margin: 0 0.2rem;
            border-radius: 10px;
            transition: all var(--transition-speed) ease;
            position: relative;
            font-size: 0.875rem;
        }
        [data-bs-theme="dark"] .navbar-nav .nav-link {
            color: var(--text-dark);
        }
        .navbar-nav .nav-link:hover {
            color: var(--primary-color);
            background: rgba(59, 130, 246, 0.12);
            transform: translateY(-2px);
        }
        [data-bs-theme="dark"] .navbar-nav .nav-link:hover {
            background: rgba(96, 165, 250, 0.12);
        }
        .btn-primary-custom {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            padding: 0.9rem 2.5rem;
            font-weight: 600;
            border-radius: 10px;
            transition: all var(--transition-speed) ease;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.12);
            font-size: 1.05rem;
        }
        .btn-primary-custom:hover {
            background-color: #2563eb;
            border-color: #2563eb;
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.18);
        }
        .btn-outline-light {
            border-width: 2px;
            padding: 0.9rem 2.5rem;
            font-weight: 600;
            border-radius: 10px;
            transition: all var(--transition-speed) ease;
            color: white;
            border-color: white;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.12);
            font-size: 1.05rem;
        }
        .btn-outline-light:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.18);
        }
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/images/student-bg.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            padding: 12rem 0;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero-content {
            position: relative;
            z-index: 10;
        }
        .hero-section h1 {
            font-weight: 800;
            font-size: 4.2rem;
            letter-spacing: -0.025em;
            text-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
            margin-bottom: 1.2rem;
            line-height: 1.2;
        }
        .hero-section .lead {
            font-size: 1.6rem;
            font-weight: 400;
            max-width: 800px;
            margin: 0 auto 3rem;
            text-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            line-height: 1.6;
        }
        .features-section {
            padding: 7rem 0;
            background-color: var(--secondary-color);
        }
        .features-section .feature-card {
            border: none;
            border-radius: 1.2rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: all var(--transition-speed) ease;
            overflow: hidden;
        }
        .features-section .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }
        .features-section .feature-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            transition: transform var(--transition-speed) ease;
        }
        .features-section .feature-card:hover .feature-icon {
            transform: scale(1.1);
        }
        .features-section .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .features-section .card-text {
            color: var(--text-muted);
            font-size: 1.05rem;
            line-height: 1.7;
        }
        .about-section {
            padding: 7rem 0;
            background: linear-gradient(135deg, #e9ecef 0%, #f8f9fa 100%);
        }
        [data-bs-theme="dark"] .about-section {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        }
        .about-image {
            border-radius: 1.2rem;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: transform var(--transition-speed) ease;
        }
        .about-image:hover {
            transform: scale(1.02);
        }
        .about-image img {
            width: 100%;
            height: auto;
            display: block;
        }
        .about-title {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 1.8rem;
            letter-spacing: -0.5px;
        }
        .about-text {
            font-size: 1.15rem;
            color: var(--text-muted);
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }
        .about-features {
            list-style: none;
            padding-left: 0;
            margin-bottom: 2rem;
        }
        .about-features li {
            position: relative;
            padding-left: 2.2rem;
            margin-bottom: 1rem;
            color: var(--text-muted);
            font-size: 1.1rem;
            line-height: 1.6;
        }
        .about-features li::before {
            content: '\f00c';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            left: 0;
            color: var(--primary-color);
            font-size: 1.2rem;
            top: 0.2rem;
        }
        footer {
            background: linear-gradient(to right, var(--secondary-color), var(--secondary-color));
            padding: 4rem 0 2rem;
            color: var(--text-muted);
            border-top: 1px solid rgba(0, 0, 0, 0.08);
        }
        [data-bs-theme="dark"] footer {
            background: linear-gradient(to right, #1a202c, #1a202c);
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }
        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            text-align: left;
        }
        .footer-logo {
            font-weight: 800;
            font-size: 2.2rem;
            color: var(--primary-color);
            margin-bottom: 1.2rem;
            letter-spacing: -0.5px;
        }
        .footer-logo span {
            color: var(--accent-color);
        }
        .footer-desc {
            font-size: 1.05rem;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }
        .footer-heading {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--text-dark);
            position: relative;
            padding-bottom: 0.8rem;
        }
        .footer-heading::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 3px;
            background-color: var(--primary-color);
            border-radius: 3px;
        }
        .footer-links {
            list-style: none;
            padding: 0;
        }
        .footer-links li {
            margin-bottom: 0.8rem;
        }
        .footer-links a {
            color: var(--text-muted);
            text-decoration: none;
            transition: all var(--transition-speed) ease;
            display: inline-block;
        }
        .footer-links a:hover {
            color: var(--primary-color);
            transform: translateX(5px);
        }
        .footer-links i {
            margin-right: 0.5rem;
            font-size: 0.9rem;
            color: var(--primary-color);
        }
        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        .social-icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background-color: rgba(59, 130, 246, 0.1);
            color: var(--primary-color);
            transition: all var(--transition-speed) ease;
        }
        [data-bs-theme="dark"] .social-icons a {
            background-color: rgba(96, 165, 250, 0.15);
        }
        .social-icons a:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .footer-bottom {
            margin-top: 4rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(0, 0, 0, 0.08);
            text-align: center;
        }
        [data-bs-theme="dark"] .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }
        .footer-bottom-links a {
            color: var(--text-muted);
            text-decoration: none;
            margin: 0 1rem;
            transition: color var(--transition-speed) ease;
            font-size: 0.95rem;
        }
        .footer-bottom-links a:hover {
            color: var(--primary-color);
        }
        .copyright {
            margin-top: 1rem;
            font-size: 0.95rem;
        }
        .theme-toggle-btn {
            position: fixed;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            width: 52px;
            height: 52px;
            background-color: var(--secondary-color);
            border: none;
            border-left: 2px solid var(--text-muted);
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: -2px 0 8px rgba(0, 0, 0, 0.12);
            transition: all var(--transition-speed) ease;
            z-index: 1000;
        }
        [data-bs-theme="dark"] .theme-toggle-btn {
            background-color: #1a202c;
            border-left-color: #4a5568;
        }
        .theme-toggle-btn:hover {
            background-color: rgba(59, 130, 246, 0.15);
            width: 55px;
        }
        .theme-toggle-btn i {
            color: var(--text-muted);
            font-size: 1.3rem;
            transition: color var(--transition-speed) ease;
        }
        [data-bs-theme="dark"] .theme-toggle-btn i {
            color: var(--text-dark);
        }
        #customizeOffcanvas {
            width: 320px;
            background-color: var(--secondary-color);
            border-left: 1px solid var(--text-muted);
            transition: all var(--transition-speed) ease;
        }
        [data-bs-theme="dark"] #customizeOffcanvas {
            background-color: #1a202c;
            border-left-color: #4a5568;
        }
        #customizeOffcanvas .offcanvas-header {
            border-bottom: 1px solid var(--text-muted);
            padding: 1.5rem;
        }
        #customizeOffcanvas .offcanvas-title {
            color: var(--text-dark);
            font-weight: 700;
            font-size: 1.4rem;
        }
        [data-bs-theme="dark"] #customizeOffcanvas .offcanvas-title {
            color: var(--text-dark);
        }
        #customizeOffcanvas .btn-close {
            filter: invert(var(--bs-body-color-inverse-filter, 0)) !important;
        }
        #customizeOffcanvas .offcanvas-body {
            padding: 1.5rem;
        }
        #customizeOffcanvas .form-check-label {
            color: var(--text-dark);
            font-weight: 500;
        }
        [data-bs-theme="dark"] #customizeOffcanvas .form-check-label {
            color: var(--text-dark);
        }
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 3rem;
        }
        .section-title::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -15px;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.8rem;
            }
            .hero-section .lead {
                font-size: 1.2rem;
            }
            .about-title {
                font-size: 2.2rem;
            }
            .footer-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }
        .navbar-nav .nav-item a{
            font-size: 0.875rem !important;
            padding: 0.7rem !important;
        }
        .faq-section {
            background-color: var(--bg-primary);
            padding: 7rem 0;
        }
        .faq-card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 1rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-user-graduate"></i>
                As<span>Ma</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    {{-- Tambahkan link FAQ di navbar --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="{{ route('login') }}" class="btn btn-primary-custom btn-sm">
                            <i class="fas fa-sign-in-alt me-1"></i> Masuk
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container hero-content text-center">
            <h1 class="display-4 fw-bold mb-4" style="font-size: calc(1.475rem + 2.7vw); !important">Aplikasi Sistem Mahasiswa<br><span style="color: var(--accent-color);">Aspirasi Mahasiswa</span></h1>
            <p class="mb-5">Platform terpadu untuk menyampaikan pengaduan dan aspirasi Anda dengan mudah dan efektif.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('login') }}" class="btn btn-primary-custom btn-lg">
                    <i class="fas fa-sign-in-alt me-2"></i> Mulai Sekarang
                </a>
                <a href="#features" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-info-circle me-2"></i> Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </section>

    <section id="features" class="features-section container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold section-title">Fungsi & Manfaat AsMa</h2>
            <p class="lead text-muted">Dirancang untuk mempermudah mahasiswa dalam menyampaikan pengaduan dan mendapatkan solusi yang cepat.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card feature-card h-100">
                    <div class="card-body text-center p-5">
                        <div class="feature-icon">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                        <h4 class="card-title">Pengajuan Mudah</h4>
                        <p class="card-text">Proses pengajuan pengaduan yang intuitif dan cepat, bisa dilakukan kapan saja dan di mana saja.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card h-100">
                    <div class="card-body text-center p-5">
                        <div class="feature-icon">
                            <i class="fas fa-stopwatch"></i>
                        </div>
                        <h4 class="card-title">Admin Fast Respon</h4>
                        <p class="card-text">Aspirasi kamu langsung ditangani tanpa harus nunggu lama, siap bantu 24/7.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card h-100">
                    <div class="card-body text-center p-5">
                        <div class="feature-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <h4 class="card-title">Komunikasi Efektif</h4>
                        <p class="card-text">Fasilitas diskusi dan klarifikasi antara mahasiswa dan pihak kampus terkait pengaduan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card h-100">
                    <div class="card-body text-center p-5">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4 class="card-title">Aman & Terpercaya</h4>
                        <p class="card-text">Semua data pengaduan terenkripsi dan dijaga kerahasiaannya untuk kenyamanan pengguna.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card h-100">
                    <div class="card-body text-center p-5">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4 class="card-title">Statistik Pengaduan</h4>
                        <p class="card-text">Informasi statistik pengaduan yang transparan untuk melihat tren dan area yang perlu ditingkatkan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card h-100">
                    <div class="card-body text-center p-5">
                        <div class="feature-icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <h4 class="card-title">Riwayat Pengaduan</h4>
                        <p class="card-text">Akses mudah ke riwayat pengaduan yang pernah Anda ajukan untuk referensi di masa mendatang.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="about-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="about-card p-4 p-lg-5 rounded-3 shadow-sm">
                        <h2 class="about-title">Tentang AsMa</h2>
                        <p class="about-text">
                            AsMa hadir sebagai solusi digital untuk menjembatani komunikasi antara mahasiswa dan pihak kampus terkait berbagai isu dan kendala. Kami percaya bahwa setiap aspirasi dan pengaduan berhak didengar dan ditindaklanjuti demi terciptanya lingkungan kampus yang lebih baik.
                        </p>
                        <ul class="about-features">
                            <li>Pengaduan terintegrasi dengan sistem kampus.</li>
                            <li>Proses tindak lanjut yang transparan.</li>
                            <li>Anonimitas pelapor (opsional).</li>
                            <li>Dukungan multi-platform (web & mobile).</li>
                        </ul>
                        <a href="{{ route('login') }}" class="btn btn-primary-custom mt-3">
                            <i class="fas fa-sign-in-alt me-2"></i> Bergabung dengan Komunitas AsMa
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="about-image rounded-3 overflow-hidden">
                        <img src="{{ asset('images/diskusi.jpg') }}" alt="Mahasiswa Berdiskusi" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Halaman FAQ -->
    <section id="faq" class="faq-section">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold section-title">Pertanyaan Umum (FAQ)</h2>
                <p class="lead text-muted">Temukan jawaban untuk pertanyaan yang paling sering diajukan mengenai layanan kami.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion" id="faqAccordion">
                        <!-- FAQ Item 1 -->
                        <div class="accordion-item faq-card mb-3">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    1. Apa itu Aplikasi Aspirasi Mahasiswa (ASMA)?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    ASMA adalah platform online yang disediakan oleh kampus untuk menampung pengaduan, saran, dan aspirasi dari seluruh mahasiswa. Tujuannya adalah untuk mempermudah komunikasi antara mahasiswa dengan pihak administrasi atau unit terkait di kampus, sehingga setiap masukan dapat ditindaklanjuti dengan cepat dan transparan.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="accordion-item faq-card mb-3">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    2. Bagaimana cara mengajukan pengaduan atau aspirasi?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Anda dapat mengajukan pengaduan dengan mengisi formulir di halaman "Buat Pengaduan". Pastikan Anda mengisi semua kolom yang diperlukan, seperti judul, kategori, deskripsi, dan prioritas, agar pengaduan Anda dapat diproses dengan lebih efektif.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="accordion-item faq-card mb-3">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    3. Apakah saya bisa mengajukan pengaduan secara anonim?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Ya, Anda dapat mengajukan pengaduan secara anonim dengan mencentang opsi "Kirim sebagai anonim" di formulir. Jika Anda memilih opsi ini, nama dan identitas Anda tidak akan ditampilkan kepada pihak admin, namun Anda tetap dapat melihat status pengaduan Anda.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 4 -->
                        <div class="accordion-item faq-card mb-3">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    4. Bagaimana saya bisa melihat status pengaduan saya?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Setelah mengajukan pengaduan, Anda akan mendapatkan nomor tiket. Anda bisa melihat riwayat status pengaduan Anda di halaman "Riwayat Pengaduan". Di sana, Anda akan melihat perubahan status dari **Dikirim**, **Diproses**, hingga **Selesai**, lengkap dengan catatan dan histori waktu.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 5 -->
                        <div class="accordion-item faq-card mb-3">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    5. Berapa lama pengaduan akan ditindaklanjuti?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Pengaduan akan ditinjau oleh admin sesegera mungkin. Waktu penindakan bervariasi tergantung pada kategori dan prioritas pengaduan. Anda bisa memantau perkembangannya melalui halaman detail pengaduan.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 6 -->
                        <div class="accordion-item faq-card mb-3">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    6. Apa saja jenis pengaduan yang bisa saya ajukan?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    <p class="mb-2">Anda dapat mengajukan pengaduan untuk berbagai kategori, antara lain:</p>
                                    <ul class="list-disc list-inside space-y-1">
                                        <li><strong>Akademik</strong>: Masalah seputar perkuliahan, jadwal, dosen, atau kurikulum.</li>
                                        <li><strong>Fasilitas</strong>: Pengaduan terkait sarana dan prasarana kampus (perpustakaan, ruang kelas, toilet, dll.).</li>
                                        <li><strong>Administrasi</strong>: Masalah seputar layanan administrasi (keuangan, registrasi, dll.).</li>
                                        <li><strong>Keamanan</strong>: Isu-isu terkait keamanan di lingkungan kampus.</li>
                                        <li><strong>Lainnya</strong>: Masukan atau saran untuk perbaikan umum di luar kategori di atas.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 7 -->
                        <div class="accordion-item faq-card mb-3">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    7. Apa yang harus saya sertakan dalam pengaduan saya?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Agar pengaduan Anda cepat ditindaklanjuti, sertakan informasi yang jelas dan detail di bagian deskripsi. Jika memungkinkan, sertakan lampiran berupa foto atau dokumen yang relevan sebagai bukti.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item faq-card mb-3">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    5. Apakah ada batasan jumlah pengaduan yang bisa saya ajukan?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Ya, setiap mahasiswa hanya diperbolehkan membuat maksimal 3 pengajuan dalam satu hari. Hal ini bertujuan untuk memastikan bahwa setiap pengaduan dapat ditangani dengan baik dan tidak menumpuk.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-container">
                <div class="footer-about">
                    <div class="footer-logo">As<span>Ma</span></div>
                    <p class="footer-desc">Platform pengaduan dan aspirasi mahasiswa yang dirancang untuk meningkatkan pengalaman kampus dan menciptakan lingkungan pendidikan yang lebih baik.</p>
                    <div class="social-icons">
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                <div class="footer-links-col">
                    <h4 class="footer-heading">Tautan Cepat</h4>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Beranda</a></li>
                        <li><a href="#features"><i class="fas fa-chevron-right"></i> Fitur</a></li>
                        <li><a href="#about"><i class="fas fa-chevron-right"></i> Tentang</a></li>
                        <li><a href="#faq"><i class="fas fa-chevron-right"></i> FAQ</a></li>
                        <li><a href="{{ route('login') }}"><i class="fas fa-chevron-right"></i> Masuk</a></li>
                    </ul>
                </div>
                <div class="footer-links-col">
                    <h4 class="footer-heading">Kontak</h4>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt"></i> Jl. Kampus No. 123, Kota</li>
                        <li><a href="tel:+62123456789"><i class="fas fa-phone"></i> +62 123 456 789</a></li>
                        <li><a href="mailto:aspirasimaha@asma.ac.id"><i class="fas fa-envelope"></i>aspirasimaha@asma.ac.id</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="footer-bottom-links">
                    <a href="#">Kebijakan Privasi</a>
                    <a href="#">Ketentuan Penggunaan</a>
                    <a href="#">Hubungi Kami</a>
                </div>
                <p class="copyright">© {{ date('Y') }} AsMa - Aspirasi Mahasiswa. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <button class="theme-toggle-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#customizeOffcanvas" aria-controls="customizeOffcanvas">
        <i class="fas fa-adjust"></i>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="customizeOffcanvas" aria-labelledby="customizeOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="customizeOffcanvasLabel"><i class="fas fa-palette me-2"></i>Sesuaikan Tampilan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Tutup"></button>
        </div>
        <div class="offcanvas-body">
            <h6>Pilih Tema</h6>
            <p class="text-muted small mb-3">Sesuaikan tampilan aplikasi dengan tema yang Anda sukai.</p>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bs-theme" id="themeLight" value="light" checked>
                <label class="form-check-label" for="themeLight">Terang</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bs-theme" id="themeDark" value="dark">
                <label class="form-check-label" for="themeDark">Gelap</label>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function setTheme(theme) {
                document.documentElement.setAttribute('data-bs-theme', theme);
                localStorage.setItem('bs-theme', theme);
                if (theme === 'light') {
                    document.getElementById('themeLight').checked = true;
                } else {
                    document.getElementById('themeDark').checked = true;
                }
            }
            const savedTheme = localStorage.getItem('bs-theme');
            if (savedTheme) {
                setTheme(savedTheme);
            } else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                setTheme('dark');
            } else {
                setTheme('light');
            }
            document.getElementById('themeLight').addEventListener('change', function() {
                setTheme('light');
            });
            document.getElementById('themeDark').addEventListener('change', function() {
                setTheme('dark');
            });
        });
    </script>
</body>
</html>
