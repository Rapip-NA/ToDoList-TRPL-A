<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TodoList — Kelola Tugas dengan Mudah & Cepat</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        violet: {
                            50:  '#f5f3ff',
                            100: '#ede9fe',
                            200: '#ddd6fe',
                            300: '#c4b5fd',
                            400: '#a78bfa',
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                            800: '#5b21b6',
                            900: '#4c1d95',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #0b0914; color: #e5e5e5; }

        .btn-purple {
            background: linear-gradient(135deg, #7c3aed, #5b21b6);
            transition: all 0.3s cubic-bezier(.4,0,.2,1);
        }
        .btn-purple:hover {
            background: linear-gradient(135deg, #8b5cf6, #6d28d9);
            box-shadow: 0 0 28px rgba(124, 58, 237, 0.45);
            transform: translateY(-2px);
        }

        .card-glass {
            background: rgba(22, 17, 39, 0.65);
            backdrop-filter: blur(14px);
            border: 1px solid rgba(124, 58, 237, 0.2);
            transition: all 0.3s ease;
        }
        .card-glass:hover {
            border-color: rgba(139, 92, 246, 0.45);
            box-shadow: 0 12px 30px -10px rgba(124, 58, 237, 0.2);
            transform: translateY(-4px);
        }

        .stripe-anim {
            background: linear-gradient(90deg, #7c3aed, #4c1d95, #8b5cf6, #6d28d9);
            background-size: 300% 300%;
            animation: stripeSlide 5s ease infinite;
        }
        @keyframes stripeSlide {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .hero-glow {
            background: radial-gradient(circle at 50% 30%, rgba(124, 58, 237, 0.22) 0%, rgba(11, 9, 20, 0) 70%);
        }
    </style>
</head>

<body class="min-h-screen flex flex-col overflow-x-hidden selection:bg-violet-600 selection:text-white">

    <!-- Top Accent Bar -->
    <div class="stripe-anim h-1 w-full fixed top-0 left-0 z-50"></div>

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full z-40 bg-[#0b0914]/80 backdrop-blur-md border-b border-violet-900/30">
        <div class="max-w-6xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl btn-purple flex items-center justify-center shadow-lg shadow-violet-900/30 group-hover:scale-105 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="text-lg font-bold text-white tracking-tight group-hover:text-violet-400 transition">TodoList</span>
                    <span class="text-[10px] uppercase tracking-wider text-violet-400/80 font-semibold">TRPL-A Edition</span>
                </div>
            </a>

            <div class="flex items-center gap-4">
                <a href="{{ route('todos.index') }}"
                   class="btn-purple text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-lg shadow-violet-900/40 inline-flex items-center gap-2">
                    <span>Buka Aplikasi</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-36 pb-20 md:pt-48 md:pb-32 hero-glow">
        <div class="max-w-5xl mx-auto px-6 text-center">

            <!-- Pill Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-violet-950/60 border border-violet-800/40 text-violet-300 text-xs font-medium mb-8 backdrop-blur-sm animate-pulse">
                <span class="w-2 h-2 rounded-full bg-violet-400"></span>
                <span>Praktikum Web &middot; Laravel CRUD</span>
            </div>

            <!-- Title -->
            <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight leading-tight sm:leading-none mb-6">
                Kelola Tugas Jadi Lebih <br>
                <span class="bg-gradient-to-r from-violet-400 via-purple-300 to-indigo-400 bg-clip-text text-transparent">
                    Mudah, Rapi & Produktif
                </span>
            </h1>

            <p class="max-w-2xl mx-auto text-base sm:text-lg text-gray-400 leading-relaxed mb-10">
                Aplikasi manajemen to-do list sederhana berbasis Laravel dengan tampilan modern bernuansa Dark Violet. Catat, pantau, dan selesaikan semua tugas kuliah dan harianmu.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('todos.index') }}"
                   class="w-full sm:w-auto btn-purple text-white px-8 py-3.5 rounded-xl font-bold text-base shadow-xl shadow-violet-900/40 inline-flex items-center justify-center gap-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                    <span>Mulai Catat Tugas</span>
                </a>

                <a href="{{ route('todos.create') }}"
                   class="w-full sm:w-auto card-glass text-gray-200 hover:text-white px-7 py-3.5 rounded-xl font-semibold text-base inline-flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-violet-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>Tambah Tugas Baru</span>
                </a>
            </div>

            <!-- Preview Card Mockup -->
            <div class="mt-16 max-w-3xl mx-auto card-glass rounded-2xl p-6 sm:p-8 text-left border border-violet-800/30 shadow-2xl shadow-violet-950/60">
                <div class="flex items-center justify-between border-b border-violet-900/40 pb-4 mb-5">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-red-500/80 inline-block"></span>
                        <span class="w-3 h-3 rounded-full bg-amber-500/80 inline-block"></span>
                        <span class="w-3 h-3 rounded-full bg-emerald-500/80 inline-block"></span>
                        <span class="text-xs text-gray-400 ml-2 font-mono">todolist.rapipaja.my.id</span>
                    </div>
                    <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-violet-950/80 text-violet-300 border border-violet-800/50">
                        Live Preview
                    </span>
                </div>

                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3.5 rounded-xl bg-[#140f28]/80 border border-violet-900/30">
                        <div class="flex items-center gap-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-violet-400 animate-ping"></span>
                            <div>
                                <h4 class="text-sm font-semibold text-white">Selesaikan Tugas Pemrograman Web</h4>
                                <p class="text-xs text-gray-400">Implementasi CRUD TodoList & Deploy ke Server</p>
                            </div>
                        </div>
                        <span class="text-xs font-medium px-2.5 py-1 rounded-full bg-violet-950 text-violet-300 border border-violet-800">
                            Sedang Berjalan
                        </span>
                    </div>

                    <div class="flex items-center justify-between p-3.5 rounded-xl bg-[#140f28]/40 border border-violet-900/20 opacity-75">
                        <div class="flex items-center gap-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-300 line-through">Setup SQLite & Migration</h4>
                                <p class="text-xs text-gray-500">Tabel todos siap digunakan</p>
                            </div>
                        </div>
                        <span class="text-xs font-medium px-2.5 py-1 rounded-full bg-emerald-950/80 text-emerald-400 border border-emerald-800">
                            ✓ Selesai
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 relative border-t border-violet-900/30 bg-[#0e0b1c]/50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-white tracking-tight mb-4">
                    Fitur Lengkap & Simpel
                </h2>
                <p class="text-sm sm:text-base text-gray-400">
                    Dirancang seringan mungkin tanpa login rumit agar kamu bisa langsung fokus menyelesaikan tugas.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Feature 1 -->
                <div class="card-glass rounded-2xl p-7">
                    <div class="w-12 h-12 rounded-xl bg-violet-900/40 border border-violet-700/40 flex items-center justify-center text-violet-400 mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Manajemen CRUD Lengkap</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">
                        Tambah tugas baru, perbarui deskripsi, hapus tugas yang tidak relevan, serta lihat rincian tanggal pembuatan.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="card-glass rounded-2xl p-7">
                    <div class="w-12 h-12 rounded-xl bg-violet-900/40 border border-violet-700/40 flex items-center justify-center text-violet-400 mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Status Centang Cepat</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">
                        Tandai tugas yang telah selesai hanya dengan satu klik checkbox. Dilengkapi animasi dot indicator yang informatif.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="card-glass rounded-2xl p-7">
                    <div class="w-12 h-12 rounded-xl bg-violet-900/40 border border-violet-700/40 flex items-center justify-center text-violet-400 mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Dark Violet Theme</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">
                        Tampilan gelap modern bernuansa ungu dengan kontras tinggi yang nyaman di mata untuk pemakaian jangka panjang.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="mt-auto border-t border-violet-900/30 bg-[#0b0914] py-8">
        <div class="max-w-6xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left">
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-violet-500"></span>
                <p class="text-xs text-gray-400 font-medium">
                    TodoList TRPL-A &middot; Laravel &middot; Blade &middot; SQLite
                </p>
            </div>
            <p class="text-xs text-gray-500">
                &copy; {{ date('Y') }} TodoList App. All rights reserved.
            </p>
        </div>
    </footer>

</body>
</html>

