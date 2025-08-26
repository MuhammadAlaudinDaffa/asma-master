<!DOCTYPE html>
<html lang="id" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AsMa - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @layer base {
            :root {
                --primary-color: #3b82f6;
                --accent-color: #f59e0b;
                --text-dark: #1e293b;
                --text-muted: #6b7280;
                --card-bg: #ffffff;
                --border-color: #e2e8f0;
                --bg-primary: #f1f5f9;
                --sidebar-hover: #f3f4f6;
            }

            .dark {
                --primary-color: #60a5fa;
                --accent-color: #facc15;
                --text-dark: #f8fafc;
                --text-muted: #9ca3af;
                --card-bg: #1f2937;
                --border-color: #374151;
                --bg-primary: #111827;
                --sidebar-hover: #1e293b;
            }
        }

        @layer components {
            .btn-primary {
                @apply bg-[var(--primary-color)] text-white px-6 py-3 rounded-xl font-semibold shadow-lg transition duration-300 ease-in-out hover:bg-blue-600 dark:hover:bg-blue-400;
            }

            .sidebar-item {
                @apply flex items-center p-3 rounded-lg text-sm font-medium transition duration-200 ease-in-out;
                @apply text-[var(--text-dark)] hover:bg-[var(--sidebar-hover)] hover:text-[var(--primary-color)] dark:hover:bg-slate-700 dark:hover:text-white;
            }

            .sidebar-item.active {
                @apply bg-blue-100 dark:bg-blue-900 text-[var(--primary-color)] dark:text-white;
            }
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.8);
        }

        .dark .glass-effect {
            background-color: rgba(31, 41, 55, 0.8);
        }

        .animate-bounce-subtle {
            animation: bounce-subtle 1s infinite;
        }

        @keyframes bounce-subtle {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5%);
            }
        }
    </style>
    <script>
        (function () {
            const storedTheme = localStorage.getItem('theme');
            const isDarkMode = storedTheme === 'dark' || (!storedTheme && window.matchMedia(
                '(prefers-color-scheme: dark)').matches);
            if (isDarkMode) {
                document.documentElement.classList.add('dark');
                document.documentElement.classList.remove('light');
            } else {
                document.documentElement.classList.remove('dark');
                document.documentElement.classList.add('light');
            }
        })();
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="bg-[var(--bg-primary)] text-[var(--text-dark)] transition-colors duration-300">

    <div class="flex h-screen">
        <aside id="sidebar"
            class="w-64 bg-[var(--card-bg)] shadow-lg transform -translate-x-full md:translate-x-0 fixed md:relative z-50 transition-transform duration-300 ease-in-out flex flex-col">
            <div class="p-6 border-b border-[var(--border-color)] flex items-center justify-between">
                <a href="/dashboard" class="flex items-center space-x-2">
                    <i class="fas fa-user-graduate text-2xl text-[var(--primary-color)]"></i>
                    <span class="text-2xl font-bold text-[var(--text-dark)]">As<span
                            class="text-[var(--accent-color)]">Ma</span></span>
                </a>
                <button id="sidebar-close-btn"
                    class="md:hidden text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
            <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
                <a href="{{ route('dashboard') }}"
                    class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt me-3"></i>
                    <span>Dashboard</span>
                </a>
                @if (Auth::user()->role === 'mahasiswa')
                    <a href="{{ route('pengaduan.create') }}"
                        class="sidebar-item {{ request()->routeIs('pengaduan.create') ? 'active' : '' }}">
                        <i class="fas fa-plus-circle me-3"></i>
                        <span>Buat Pengaduan</span>
                    </a>
                    <a href="{{ route('pengaduan.history') }}"
                        class="sidebar-item {{ request()->routeIs('pengaduan.history') || request()->routeIs('pengaduan.show') ? 'active' : '' }}">
                        <i class="fas fa-history me-3"></i>
                        <span>Riwayat Pengaduan</span>
                    </a>
                @elseif(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.pengaduan.index') }}"
                        class="sidebar-item {{ request()->routeIs('admin.pengaduan.*') ? 'active' : '' }}">
                        <i class="fas fa-tasks me-3"></i>
                        <span>Manajemen Pengaduan</span>
                    </a>
                    <a href="{{ route('admin.mahasiswa.index') }}"
                        class="sidebar-item {{ request()->routeIs('admin.mahasiswa.*') ? 'active' : '' }}">
                        <i class="fas fa-users me-3"></i>
                        <span>Daftar Mahasiswa</span>
                    </a>
                @endif
                <a href="{{ route('profile.show') }}"
                    class="sidebar-item {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                    <i class="fas fa-user me-3"></i>
                    <span>Profil Saya</span>
                </a>
            </nav>
            <div class="p-4 border-t border-[var(--border-color)]">
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="w-full text-left sidebar-item text-red-500">
                        <i class="fas fa-sign-out-alt me-3"></i>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-y-auto">
            <header class="bg-[var(--card-bg)] shadow-sm z-30 sticky top-0">
                <div class="flex items-center justify-between p-4 lg:px-6">
                    <div class="flex items-center space-x-4">
                        <button id="sidebar-toggle-btn"
                            class="p-2.5 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-[var(--primary-color)] transition-all duration-300 md:hidden">
                            <i class="fas fa-bars text-lg"></i>
                        </button>
                        <div class="flex items-center space-x-3">
                            <div
                                class="hidden lg:block w-1 h-8 bg-gradient-to-b from-[var(--primary-color)] to-blue-600 rounded-full">
                            </div>
                            <div>
                                <h1 class="text-xl lg:text-2xl font-bold text-[var(--text-dark)]">
                                    @yield('title')
                                </h1>
                                <p class="text-sm text-[var(--text-muted)] hidden lg:block">
                                    Selamat datang kembali,
                                    {{ Auth::user()->role === 'admin' ? 'Admin!' : 'Mahasiswa!' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <button id="theme-toggle"
                            class="p-3 rounded-xl text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-[var(--primary-color)] transition-all duration-300 group">
                            <i id="theme-icon-header" class="fas text-lg group-hover:animate-bounce-subtle"></i>
                        </button>

                        <div class="relative">
                            <button id="user-dropdown-btn"
                                class="flex items-center space-x-3 p-2 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-[var(--primary-color)] transition-all duration-300 group">
                                <span
                                    class="text-[var(--text-dark)] font-medium hidden md:inline group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                    {{ Auth::user()->name }}
                                </span>
                                <div class="relative">
                                    <div
                                        class="bg-gradient-to-br from-[var(--primary-color)] to-blue-600 border-2 border-white dark:border-gray-700 rounded-xl w-10 h-10 flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-105">
                                        <i class="fas fa-user text-white text-sm"></i>
                                    </div>
                                    <div
                                        class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-400 border-2 border-white dark:border-gray-900 rounded-full">
                                    </div>
                                </div>
                            </button>

                            <div id="user-dropdown-menu"
                                class="absolute right-0 mt-2 w-56 bg-white dark:bg-gray-800 rounded-xl shadow-xl border border-gray-200 dark:border-gray-700 py-2 z-50 glass-effect hidden">
                                <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                                    <p class="text-sm text-gray-700 dark:text-gray-300">
                                        <span class="text-[var(--text-dark)] font-medium">
                                            {{ Auth::user()->name }}
                                        </span>
                                    </p>
                                    <p class="text-sm text-gray-700 dark:text-gray-300">
                                        <span class="text-[var(--text-dark)]">
                                            {{ Auth::user()->email }}
                                        </span>
                                    </p>
                                </div>

                                <a href="{{ route('profile.show') }}"
                                    class="flex items-center px-4 py-3 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                    <i class="fas fa-user-circle mr-3"></i>
                                    <span class="text-[var(--text-dark)]">Profil Saya</span>
                                </a>

                                <div class="border-t border-gray-200 dark:border-gray-700 my-1"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center w-full px-4 py-3 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors duration-200">
                                        <i class="fas fa-sign-out-alt mr-3"></i>
                                        Keluar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6">
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const html = document.documentElement;
            const themeToggle = document.getElementById('theme-toggle');
            const themeIcon = document.getElementById('theme-icon-header');
            const sidebarToggle = document.getElementById('sidebar-toggle-btn');
            const sidebarClose = document.getElementById('sidebar-close-btn');
            const sidebar = document.getElementById('sidebar');
            const userDropdownBtn = document.getElementById('user-dropdown-btn');
            const userDropdownMenu = document.getElementById('user-dropdown-menu');

            // Logika Dark/Light mode toggle
            themeToggle.addEventListener('click', () => {
                if (html.classList.contains('dark')) {
                    html.classList.remove('dark');
                    html.classList.add('light');
                    localStorage.setItem('theme', 'light');
                    themeIcon.classList.remove('fa-moon', 'text-yellow-400');
                    themeIcon.classList.add('fa-sun');
                } else {
                    html.classList.remove('light');
                    html.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                    themeIcon.classList.remove('fa-sun');
                    themeIcon.classList.add('fa-moon', 'text-yellow-400');
                }
            });

            // Sinkronisasi ikon tema saat memuat halaman
            const isDarkMode = html.classList.contains('dark');
            if (isDarkMode) {
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon', 'text-yellow-400');
            } else {
                themeIcon.classList.remove('fa-moon', 'text-yellow-400');
                themeIcon.classList.add('fa-sun');
            }

            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
            }
            
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', toggleSidebar);
            }
            if (sidebarClose) {
                sidebarClose.addEventListener('click', toggleSidebar);
            }

            if (userDropdownBtn && userDropdownMenu) {
                userDropdownBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    userDropdownMenu.classList.toggle('hidden');
                });

                document.addEventListener('click', (e) => {
                    if (!userDropdownMenu.contains(e.target) && !userDropdownBtn.contains(e.target)) {
                        userDropdownMenu.classList.add('hidden');
                    }
                });
            }

            document.addEventListener('click', (e) => {
                const isMobile = window.innerWidth < 768;
                if (isMobile && sidebar && !sidebar.contains(e.target) && 
                    sidebarToggle && !sidebarToggle.contains(e.target) && 
                    !sidebar.classList.contains('-translate-x-full')) {
                    sidebar.classList.add('-translate-x-full');
                }
            });
        });
    </script>
</body>

</html>