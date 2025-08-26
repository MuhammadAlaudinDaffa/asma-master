<!DOCTYPE html>
<html lang="id" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AsMa - Aplikasi Pengaduan Mahasiswa. Masuk untuk mengelola pengaduan Anda.">
    <title>Masuk - AsMa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bs-primary: #3b82f6;
            --bs-primary-rgb: 59, 130, 246;
            --bs-secondary: #f1f5f9;
            --bs-dark: #1a202c;
            --bs-gray-600: #6b7280;
            --bs-yellow-600: #f59e0b;
            --asma-blue: #3b82f6;
            --asma-indigo: #1d4ed8;
            --asma-orange: #FBBF24;
            --asma-amber: #f59e0b;
            --bs-body-bg: var(--bs-secondary);
            --bs-body-color: var(--bs-dark);
            --bs-heading-color: var(--bs-dark);
            --bs-link-color: var(--bs-primary);
            --bs-link-hover-color: #2563eb;
            --bs-card-bg: white;
            --bs-border-color: #e5e7eb;
            --bs-text-muted: var(--bs-gray-600);
            --login-bg-start: var(--asma-blue);
            --login-bg-end: var(--asma-indigo);
            --login-card-bg: white;
            --login-text-color: var(--bs-dark);
            --login-icon-bg: #f8f9fa;
            --login-input-focus: rgba(59, 130, 246, 0.25);
        }

        [data-bs-theme="dark"] {
            --bs-body-bg: #111827;
            --bs-body-color: #f3f4f6;
            --bs-heading-color: #f9fafb;
            --bs-link-color: #60a5fa;
            --bs-link-hover-color: #3b82f6;
            --bs-card-bg: #1f2937;
            --bs-border-color: #374151;
            --bs-text-muted: #9ca3af;
            --login-bg-start: #111827;
            --login-bg-end: #1f2937;
            --login-card-bg: #1f2937;
            --login-text-color: #f9fafb;
            --login-icon-bg: #374151;
            --login-input-focus: rgba(96, 165, 250, 0.25);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bs-body-bg);
            color: var(--bs-body-color);
            line-height: 1.6;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Auth Container */
        .auth-container {
            background: linear-gradient(135deg, var(--login-bg-start) 0%, var(--login-bg-end) 100%);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Card Styling */
        .login-card {
            background-color: var(--login-card-bg);
            border-radius: 1.5rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            border: none;
            max-width: 1000px;
            width: 100%;
            margin: 0 auto;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .login-form-container {
            padding: 3rem;
        }

        .login-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--bs-heading-color);
        }

        .login-subtitle {
            color: var(--bs-text-muted);
        }

        .login-right-panel {
            background: linear-gradient(135deg, var(--login-bg-start), var(--login-bg-end));
            padding: 3rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            min-height: 100%;
        }

        /* Logo Styling */
        .asma-logo {
            display: inline-flex;
            align-items: center;
            font-weight: 800;
            font-family: 'Poppins', sans-serif;
            font-size: 1.6rem;
        }

        .asma-logo .cap-icon {
            font-size: 1.5em;
            margin-right: 0.25em;
            color: var(--asma-blue);
        }

        .asma-logo .text-as {
            color: var(--asma-blue);
        }

        .asma-logo .text-ma {
            color: var(--asma-amber);
        }

        .login-right-panel .asma-logo {
            font-size: 3.5rem;
        }

        .login-right-panel .asma-logo .cap-icon {
            color: var(--asma-orange);
        }

        .login-right-panel .asma-logo .text-as {
            color: white;
        }

        .login-right-panel .asma-logo .text-ma {
            color: var(--asma-orange);
        }

        /* Form Elements */
        .form-label {
            font-weight: 600;
            color: var(--bs-heading-color);
            font-size: 0.95rem;
        }

        .input-group-text {
            background-color: var(--login-icon-bg);
            border-right: none;
            border-top-left-radius: 0.5rem !important;
            border-bottom-left-radius: 0.5rem !important;
            padding: 0.75rem 1.25rem;
            color: var(--bs-text-muted);
            transition: all 0.3s ease;
        }

        .form-control {
            border-left: none;
            border-top-right-radius: 0.5rem !important;
            border-bottom-right-radius: 0.5rem !important;
            padding: 0.75rem 1.25rem;
            height: auto;
            font-size: 1rem;
            background-color: var(--login-card-bg);
            color: var(--login-text-color);
            border-color: var(--bs-border-color);
            transition: all 0.3s ease;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem var(--login-input-focus);
            border-color: var(--bs-primary);
        }

        /* Custom Buttons */
        .btn-primary-custom, .btn-outline-custom {
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-primary-custom {
            background-color: var(--bs-primary);
            border-color: var(--bs-primary);
            color: white;
        }

        .btn-primary-custom:hover {
            background-color: var(--bs-link-hover-color);
            border-color: var(--bs-link-hover-color);
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .btn-outline-custom {
            border-color: var(--bs-border-color);
            color: var(--bs-text-muted);
        }

        .btn-outline-custom:hover {
            background-color: rgba(107, 114, 128, 0.1);
            border-color: var(--bs-border-color);
            color: var(--bs-heading-color);
        }

        /* Theme Toggle Button */
        .theme-toggle-btn {
            position: fixed;
            bottom: 1rem;
            right: 1rem;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--bs-card-bg);
            border: 1px solid var(--bs-border-color);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            color: var(--bs-text-muted);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            transition: all 0.3s ease;
        }

        .theme-toggle-btn:hover {
            background-color: var(--bs-link-hover-color);
            color: white;
            border-color: var(--bs-link-hover-color);
            transform: scale(1.05);
        }

        /* Modal Styling */
        .modal-content {
            border-radius: 1rem;
            background-color: var(--login-card-bg);
            color: var(--bs-body-color);
            border: 1px solid var(--bs-border-color);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .modal-header {
            border-bottom: 1px solid var(--bs-border-color);
            background-color: var(--asma-blue);
            color: white;
        }

        .modal-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.25rem;
        }

        .modal-body {
            padding: 1.5rem;
            font-size: 1rem;
            color: var(--bs-heading-color);
        }

        .modal-footer {
            border-top: 1px solid var(--bs-border-color);
            padding: 1rem;
        }

        .btn-modal-close {
            background-color: var(--bs-primary);
            border-color: var(--bs-primary);
            color: white;
            font-weight: 600;
            padding: 0.5rem 1.25rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-modal-close:hover {
            background-color: var(--bs-link-hover-color);
            border-color: var(--bs-link-hover-color);
            transform: translateY(-1px);
        }

        /* Responsive Adjustments */
        @media (max-width: 767.98px) {
            .login-card {
                border-radius: 1rem;
                max-width: none;
            }

            .login-form-container {
                padding: 2rem;
            }

            .login-title {
                font-size: 1.5rem;
            }

            .login-right-panel {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <div class="min-vh-100 d-flex align-items-center justify-content-center p-3 auth-container">
        <div class="login-card">
            <div class="row g-0 flex-md-row-reverse">
                <div class="col-12 col-md-6 d-none d-md-flex align-items-center justify-content-center">
                    <div class="login-right-panel w-100">
                        <div class="asma-logo">
                            <i class="fas fa-user-graduate cap-icon"></i>
                            <span class="text-as">As</span><span class="text-ma">Ma</span>
                        </div>
                        <h2 class="mt-4 mb-2 fw-bold text-white">Selamat Datang Kembali</h2>
                        <p class="text-white-50">Silakan login untuk mengakses akun Anda dan mengelola pengaduan.</p>
                        <div class="mt-4">
                            
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                    <div class="login-form-container w-100">
                        <div class="login-header text-center mb-4">
                            <h1 class="login-title">Masuk ke Akun Anda</h1>
                            <p class="login-subtitle text-muted">Silakan masuk dengan NIM dan kata sandi Anda.</p>
                        </div>
                        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text"><i class="fas fa-user-graduate"></i></span>
                                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM Anda" value="{{ old('nim') }}" required autofocus>
                                    <div class="invalid-feedback">
                                        Harap masukkan NIM Anda.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi Anda" required>
                                    <div class="invalid-feedback">
                                        Harap masukkan kata sandi Anda.
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-3 mt-4">
                                <button type="submit" class="btn btn-primary-custom">
                                    <i class="fas fa-sign-in-alt me-2"></i> Masuk
                                </button>
                                <a href="{{ url('/') }}" class="btn btn-outline-custom">
                                    <i class="fas fa-arrow-left me-2"></i> Kembali ke Beranda
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <button class="theme-toggle-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#customizeOffcanvas" aria-controls="customizeOffcanvas">
            <i class="fas fa-cog fa-spin"></i>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="customizeOffcanvas" aria-labelledby="customizeOffcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="customizeOffcanvasLabel"><i class="fas fa-cogs me-2"></i>Pengaturan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Tutup"></button>
            </div>
            <div class="offcanvas-body">
                <h6>Skema Warna</h6>
                <p class="text-muted small">Pilih mode warna yang sesuai untuk aplikasi.</p>
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

        @if ($errors->any())
        <div class="modal fade" id="loginErrorModal" tabindex="-1" aria-labelledby="loginErrorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginErrorModalLabel">
                            <i class="fas fa-exclamation-circle me-2"></i>Gagal Masuk
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Terjadi kesalahan saat mencoba masuk:</strong></p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <p class="text-muted">Periksa kembali NIM dan Kata Sandi Anda, lalu coba lagi.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-modal-close" data-bs-dismiss="modal">Coba Lagi</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Theme toggle logic
            const themeRadios = document.querySelectorAll('input[name="bs-theme"]');
            const storedTheme = localStorage.getItem('bs-theme');

            function applyTheme(theme) {
                document.documentElement.setAttribute('data-bs-theme', theme);
                localStorage.setItem('bs-theme', theme);
                themeRadios.forEach(radio => radio.checked = radio.value === theme);
            }

            if (storedTheme) {
                applyTheme(storedTheme);
            } else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                applyTheme('dark');
            } else {
                applyTheme('light');
            }

            themeRadios.forEach(radio => {
                radio.addEventListener('change', (event) => {
                    applyTheme(event.target.value);
                });
            });

            // Form validation logic
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });

            // Show error modal if there are validation errors
            @if ($errors->any())
                const loginErrorModal = new bootstrap.Modal(document.getElementById('loginErrorModal'), {
                    keyboard: false
                });
                loginErrorModal.show();
            @endif
        });
    </script>
</body>
</html>