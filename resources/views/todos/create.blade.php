
@extends('layouts.app')

@section('title', 'Tambah Tugas')

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

            <div class="flex items-center gap-3">
                <div class="w-1 h-7 rounded-full" style="background: linear-gradient(180deg, #7c3aed, #4c1d95);"></div>
                <h1 class="text-2xl font-bold text-white">
                    Tambah Tugas
                </h1>
            </div>
            <p class="text-sm mt-2 pl-4" style="color: #6b6b6b;">
                Isi formulir berikut untuk menambahkan tugas baru.
            </p>
        </div>

        <!-- Form -->
        <form action="{{ route('todos.store') }}" method="POST" class="space-y-6 anim-fade-up stagger-2">
            @csrf

            <!-- Judul -->
            <div>
                <label for="title" class="block text-sm font-semibold mb-2" style="color: #d4d4d4;">
                    Judul Tugas <span style="color: #a78bfa;">*</span>
                </label>

                <input
                    id="title"
                    name="title"
                    type="text"
                    maxlength="255"
                    value="{{ old('title') }}"
                    placeholder="Contoh: Belajar Laravel CRUD"
                    required
                    class="w-full px-4 py-3 rounded-xl text-white placeholder-gray-600 outline-none transition-all duration-200"
                    style="background-color: #1a1a1a; border: 1px solid #2d2d2d; color: #f0f0f0;"
                    onfocus="this.style.borderColor='#7c3aed'"
                    onblur="this.style.borderColor='#2d2d2d'">

                @error('title')
                    <p class="text-sm mt-2" style="color: #c4b5fd;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="description" class="block text-sm font-semibold mb-2" style="color: #d4d4d4;">
                    Deskripsi
                    <span class="font-normal text-xs" style="color: #555555;">(Opsional)</span>
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="5"
                    maxlength="5000"
                    placeholder="Tuliskan detail tugas di sini..."
                    class="w-full px-4 py-3 rounded-xl outline-none transition-all duration-200 resize-y"
                    style="background-color: #1a1a1a; border: 1px solid #2d2d2d; color: #f0f0f0;"
                    onfocus="this.style.borderColor='#7c3aed'"
                    onblur="this.style.borderColor='#2d2d2d'">{{ old('description') }}</textarea>

                @error('description')
                    <p class="text-sm mt-2" style="color: #c4b5fd;">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div class="rounded-xl p-4" style="background-color: #161616; border: 1px solid #2d2d2d;">
                <label class="flex items-center gap-4 cursor-pointer group">
                    <div class="relative">
                        <input
                            type="checkbox"
                            name="is_completed"
                            value="1"
                            @checked(old('is_completed', false))
                            class="sr-only peer">
                        <div class="w-5 h-5 rounded flex items-center justify-center transition-all duration-150"
                             style="background-color: #1a1a1a; border: 2px solid #3d3d3d;"
                             id="checkbox-visual">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 hidden" style="color: #7c3aed;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" id="check-icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>

                    <div>
                        <span class="block text-sm font-medium" style="color: #d4d4d4;">Sudah Selesai</span>
                        <span class="text-xs" style="color: #555555;">Centang jika tugas sudah dikerjakan.</span>
                    </div>
                </label>
            </div>

            <!-- Buttons -->
            <div class="flex flex-wrap items-center gap-3 pt-4" style="border-top: 1px solid #1f1f1f;">

                <button
                    type="submit"
                    class="btn-red text-white px-6 py-3 rounded-xl font-semibold text-sm cursor-pointer inline-flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Tugas
                </button>

                <a
                    href="{{ route('todos.index') }}"
                    class="px-6 py-3 rounded-xl text-sm font-medium transition-all duration-150"
                    style="background-color: #1a1a1a; color: #888888; border: 1px solid #2d2d2d;"
                    onmouseover="this.style.backgroundColor='#222222'; this.style.color='#aaaaaa'"
                    onmouseout="this.style.backgroundColor='#1a1a1a'; this.style.color='#888888'">
                    Batal
                </a>

            </div>

        </form>
    </div>

@endsection
