
@extends('layouts.app')

@section('title', 'Detail Tugas')

@section('content')

    <div class="max-w-2xl mx-auto">

        <!-- Header -->
        <div class="mb-8 anim-slide-left">
            <a href="{{ route('todos.index') }}"
               class="inline-flex items-center gap-1.5 text-xs font-medium mb-4 transition-colors duration-150"
               style="color: #6b6b6b;"
               onmouseover="this.style.color='#7c3aed'"
               onmouseout="this.style.color='#6b6b6b'">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Daftar
            </a>

            <p class="text-xs font-semibold uppercase tracking-widest mb-3" style="color: #7c3aed;">
                Detail Tugas
            </p>

            <h1 class="text-2xl font-bold text-white break-words leading-snug">
                {{ $todo->title }}
            </h1>
        </div>

        <!-- Status -->
        <div class="mb-6 anim-fade-up stagger-2">
            <p class="text-xs font-semibold uppercase tracking-widest mb-3" style="color: #555555;">
                Status Tugas
            </p>

            @if ($todo->is_completed)
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold"
                      style="background-color: #052e16; color: #4ade80; border: 1px solid #166534;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    Selesai
                </span>
            @else
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold"
                      style="background-color: #1e0a3c; color: #c4b5fd; border: 1px solid #5b21b6;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3" />
                    </svg>
                    Belum Selesai
                </span>
            @endif
        </div>

        <!-- Deskripsi -->
        <div class="mb-8 anim-fade-up stagger-3">
            <p class="text-xs font-semibold uppercase tracking-widest mb-3" style="color: #555555;">
                Deskripsi Tugas
            </p>

            <div class="rounded-xl p-5 min-h-32" style="background-color: #161616; border: 1px solid #252525;">
                <p class="leading-relaxed whitespace-pre-line break-words text-sm"
                   style="color: {{ $todo->description ? '#d4d4d4' : '#4b4b4b' }};">
                    {{ $todo->description ?: 'Tidak ada deskripsi.' }}
                </p>
            </div>
        </div>

        <!-- Informasi Tambahan -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-8 anim-fade-up stagger-4">

            <div class="rounded-xl p-4" style="background-color: #161616; border: 1px solid #252525;">
                <p class="text-xs uppercase tracking-widest mb-2" style="color: #555555;">
                    Dibuat Pada
                </p>
                <p class="text-sm font-semibold" style="color: #d4d4d4;">
                    {{ $todo->created_at->format('d M Y, H:i') }}
                </p>
            </div>

            <div class="rounded-xl p-4" style="background-color: #161616; border: 1px solid #252525;">
                <p class="text-xs uppercase tracking-widest mb-2" style="color: #555555;">
                    Terakhir Diperbarui
                </p>
                <p class="text-sm font-semibold" style="color: #d4d4d4;">
                    {{ $todo->updated_at->format('d M Y, H:i') }}
                </p>
            </div>

        </div>

        <!-- Buttons -->
        <div class="flex flex-wrap items-center gap-3 pt-6 anim-fade-up stagger-5" style="border-top: 1px solid #1f1f1f;">

            <a
                href="{{ route('todos.edit', $todo) }}"
                class="text-white px-6 py-3 rounded-xl font-semibold text-sm inline-flex items-center gap-2 transition-all duration-200"
                style="background: linear-gradient(135deg, #d97706, #b45309);"
                onmouseover="this.style.background='linear-gradient(135deg, #b45309, #92400e)'; this.style.boxShadow='0 0 16px rgba(217,119,6,0.3)'; this.style.transform='translateY(-1px)'"
                onmouseout="this.style.background='linear-gradient(135deg, #d97706, #b45309)'; this.style.boxShadow='none'; this.style.transform='none'">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit Tugas
            </a>

            <a
                href="{{ route('todos.index') }}"
                class="px-6 py-3 rounded-xl text-sm font-medium transition-all duration-150"
                style="background-color: #1a1a1a; color: #888888; border: 1px solid #2d2d2d;"
                onmouseover="this.style.backgroundColor='#222222'; this.style.color='#aaaaaa'"
                onmouseout="this.style.backgroundColor='#1a1a1a'; this.style.color='#888888'">
                ← Kembali
            </a>

        </div>

    </div>

@endsection
