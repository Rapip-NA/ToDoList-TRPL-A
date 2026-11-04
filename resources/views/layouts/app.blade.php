
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Daftar Tugas') — Todo</title>

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
                        },
                        onyx: {
                            50:  '#f6f6f6',
                            100: '#e7e7e7',
                            200: '#d1d1d1',
                            300: '#b0b0b0',
                            400: '#888888',
                            500: '#6d6d6d',
                            600: '#5d5d5d',
                            700: '#4f4f4f',
                            800: '#454545',
                            900: '#3d3d3d',
                            950: '#141414',
                        },
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }

        /* ── Glow helpers ── */
        .glow-purple    { box-shadow: 0 0 20px rgba(109, 40, 217, 0.35); }
        .glow-purple-sm { box-shadow: 0 0 10px rgba(109, 40, 217, 0.25); }

        /* ── Buttons ── */
        .btn-red {
            background: linear-gradient(135deg, #7c3aed, #5b21b6);
            transition: all 0.25s cubic-bezier(.4,0,.2,1);
        }
        .btn-red:hover {
            background: linear-gradient(135deg, #6d28d9, #4c1d95);
            box-shadow: 0 0 22px rgba(109, 40, 217, 0.5);
            transform: translateY(-2px) scale(1.02);
        }
        .btn-red:active { transform: translateY(0) scale(0.98); }

        /* ── Cards ── */
        .card-dark {
            background: linear-gradient(145deg, #1a1a1a, #111111);
            border: 1px solid #2d2d2d;
            transition: border-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
        }
        .card-dark:hover {
            border-color: rgba(109, 40, 217, 0.5);
            box-shadow: 0 0 28px rgba(109, 40, 217, 0.15), 0 8px 32px rgba(0,0,0,0.4);
            transform: translateY(-2px);
        }

        /* ── Accent stripe ── */
        .stripe-accent {
            background: linear-gradient(90deg, #7c3aed 0%, #4c1d95 100%);
        }

        /* ── Inputs ── */
        input:focus, textarea:focus {
            box-shadow: 0 0 0 3px rgba(109, 40, 217, 0.25);
        }

        /* ── Page enter animation ── */
        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to   { opacity: 1; }
        }
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-20px); }
            to   { opacity: 1; transform: translateX(0); }
        }
        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.92); }
            to   { opacity: 1; transform: scale(1); }
        }

        .anim-fade-up   { animation: fadeSlideUp 0.5s cubic-bezier(.4,0,.2,1) both; }
        .anim-fade-in   { animation: fadeIn       0.4s ease both; }
        .anim-slide-left{ animation: slideInLeft  0.45s cubic-bezier(.4,0,.2,1) both; }
        .anim-scale-in  { animation: scaleIn      0.45s cubic-bezier(.4,0,.2,1) both; }

        /* Staggered delays for list items */
        .stagger-1  { animation-delay: 0.05s; }
        .stagger-2  { animation-delay: 0.10s; }
        .stagger-3  { animation-delay: 0.15s; }
        .stagger-4  { animation-delay: 0.20s; }
        .stagger-5  { animation-delay: 0.25s; }
        .stagger-6  { animation-delay: 0.30s; }
        .stagger-7  { animation-delay: 0.35s; }
        .stagger-8  { animation-delay: 0.40s; }

        /* ── Pulsing purple dot (pending status) ── */
        @keyframes ping-dot {
            0%   { transform: scale(1);   opacity: 1; }
            70%  { transform: scale(2.2); opacity: 0; }
            100% { transform: scale(2.2); opacity: 0; }
        }
        .dot-ping::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 9999px;
            background: #7c3aed;
            animation: ping-dot 1.6s ease-out infinite;
        }

        /* ── Shimmer on navbar logo icon ── */
        @keyframes shimmer {
            0%   { box-shadow: 0 0 6px rgba(109,40,217,0.5); }
            50%  { box-shadow: 0 0 18px rgba(109,40,217,0.8), 0 0 32px rgba(109,40,217,0.25); }
            100% { box-shadow: 0 0 6px rgba(109,40,217,0.5); }
        }
        .logo-shimmer { animation: shimmer 3s ease-in-out infinite; }

        /* ── Accent top bar animated ── */
        @keyframes stripeSlide {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .stripe-anim {
            background: linear-gradient(90deg, #7c3aed, #4c1d95, #8b5cf6, #6d28d9);
            background-size: 300% 300%;
            animation: stripeSlide 4s ease infinite;
        }

        /* ── Alert slide-in ── */
        @keyframes alertDrop {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .alert-anim { animation: alertDrop 0.35s cubic-bezier(.4,0,.2,1) both; }

        /* ── Smooth page wrapper ── */
        .page-content { animation: fadeSlideUp 0.4s cubic-bezier(.4,0,.2,1) both; }
    </style>
</head>

<body class="min-h-screen flex flex-col" style="background-color: #0d0d0d; color: #e5e5e5;">

    <!-- Top accent line — animated gradient -->
    <div class="stripe-anim h-1 w-full"></div>

    <!-- Navbar -->
    <header class="anim-fade-in" style="background-color: #111111; border-bottom: 1px solid #1f1f1f;">
        <div class="max-w-5xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ route('todos.index') }}"
               class="flex items-center gap-3 group">
                <div class="w-9 h-9 rounded-lg flex items-center justify-center btn-red logo-shimmer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                </div>
                <div>
                    <span class="text-lg font-bold text-white group-hover:text-purple-400 transition-colors duration-200">TodoList</span>
                    <span class="text-xs text-gray-500 block leading-none">Belajar Laravel</span>
                </div>
            </a>

            <div class="flex items-center gap-3">
                <a href="{{ route('landing') }}"
                   class="text-xs text-gray-400 hover:text-violet-300 font-medium px-3 py-1.5 rounded-lg border border-violet-900/40 hover:border-violet-700/60 transition">
                    ← Home
                </a>
                <a href="{{ route('todos.create') }}"
                   class="btn-red text-white text-sm font-semibold px-4 py-2 rounded-lg inline-flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform duration-200 group-hover:rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 w-full max-w-5xl mx-auto px-6 py-10">

        <!-- Alert Success -->
        @if (session('success'))
            <div role="status"
                 class="mb-6 rounded-xl px-5 py-4 text-sm font-medium flex items-center gap-3 alert-anim"
                 style="background-color: #0f2010; border: 1px solid #166534; color: #4ade80;">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Alert Error -->
        @if ($errors->any())
            <div role="alert"
                 class="mb-6 rounded-xl px-5 py-4 text-sm alert-anim"
                 style="background-color: #1a0a0a; border: 1px solid #991b1b; color: #fca5a5;">

                <strong class="block mb-2 font-semibold flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    Periksa kembali isianmu:
                </strong>

                <ul class="list-disc list-inside space-y-1 pl-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Page Content -->
        <div class="page-content rounded-2xl p-6 md:p-8" style="background-color: #111111; border: 1px solid #1f1f1f;">
            @yield('content')
        </div>

    </main>

    <!-- Footer -->
    <footer class="anim-fade-in" style="background-color: #111111; border-top: 1px solid #1f1f1f; animation-delay: 0.3s;">
        <div class="max-w-5xl mx-auto px-6 py-4 text-center">
            <p class="text-xs" style="color: #555555;">
                Latihan CRUD &middot; Laravel &middot; Blade &middot; SQLite
            </p>
        </div>
    </footer>

    <!-- Bottom accent line — animated gradient -->
    <div class="stripe-anim h-0.5 w-full"></div>

</body>
</html>
