
@extends('layouts.app')

@section('title', 'Daftar Tugas')

@section('content')

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8 anim-fade-up">

        <div>
            <div class="flex items-center gap-3 mb-1">
                <div class="w-1 h-7 rounded-full" style="background: linear-gradient(180deg, #7c3aed, #4c1d95);"></div>
                <h1 class="text-2xl font-bold text-white">
                    Daftar Tugas
                </h1>
            </div>
            <p class="text-sm pl-4" style="color: #6b6b6b;">
                Catat tugasmu, kerjakan, lalu tandai selesai.
            </p>
        </div>

        <a href="{{ route('todos.create') }}"
           class="btn-red text-white px-5 py-3 rounded-xl font-semibold inline-flex items-center gap-2 text-sm group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform duration-300 group-hover:rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Tugas
        </a>

    </div>

    <!-- List Tugas -->
    <div class="space-y-3">

        @forelse ($todos as $todo)

            @php $delay = 'stagger-' . min($loop->index + 1, 8); @endphp

            <article class="card-dark rounded-xl p-5 group anim-fade-up {{ $delay }}">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                    <!-- Informasi Tugas -->
                    <div class="flex items-start gap-4 flex-1 min-w-0">

                        <!-- Status indicator dot -->
                        <div class="mt-1 flex-shrink-0">
                            @if ($todo->is_completed)
                                <div class="w-3 h-3 rounded-full" style="background-color: #22c55e; box-shadow: 0 0 6px rgba(34,197,94,0.5);"></div>
                            @else
                                <div class="relative w-3 h-3">
                                    <div class="dot-ping w-3 h-3 rounded-full relative" style="background-color: #7c3aed;"></div>
                                </div>
                            @endif
                        </div>

                        <div class="flex-1 min-w-0">
                            <h2 class="text-base font-semibold mb-2 break-words transition-colors duration-150
                                       {{ $todo->is_completed ? 'line-through' : '' }}"
                                style="{{ $todo->is_completed ? 'color: #555;' : 'color: #f0f0f0;' }}">
                                <a href="{{ route('todos.show', $todo) }}"
                                   class="hover:text-purple-400 transition-colors duration-150">
                                    {{ $todo->title }}
                                </a>
                            </h2>

                            <!-- Status badge -->
                            @if ($todo->is_completed)
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium"
                                      style="background-color: #052e16; color: #4ade80; border: 1px solid #166534;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Selesai
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium"
                                      style="background-color: #1e0a3c; color: #c4b5fd; border: 1px solid #5b21b6;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3" />
                                    </svg>
                                    Belum Selesai
                                </span>
                            @endif
                        </div>

                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex flex-wrap items-center gap-2 pl-7 sm:pl-0">

                        <!-- Detail -->
                        <a href="{{ route('todos.show', $todo) }}"
                           class="px-3 py-1.5 rounded-lg text-xs font-medium transition-all duration-150"
                           style="background-color: #1a1a2e; color: #818cf8; border: 1px solid #312e81;"
                           onmouseover="this.style.backgroundColor='#1e1b4b'"
                           onmouseout="this.style.backgroundColor='#1a1a2e'">
                            Detail
                        </a>

                        <!-- Edit -->
                        <a href="{{ route('todos.edit', $todo) }}"
                           class="px-3 py-1.5 rounded-lg text-xs font-medium transition-all duration-150"
                           style="background-color: #1c1209; color: #fbbf24; border: 1px solid #92400e;"
                           onmouseover="this.style.backgroundColor='#271a0a'"
                           onmouseout="this.style.backgroundColor='#1c1209'">
                            Edit
                        </a>

                        <!-- Hapus -->
                        <form action="{{ route('todos.destroy', $todo) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus tugas ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    aria-label="Hapus tugas {{ $todo->title }}"
                                    class="px-3 py-1.5 rounded-lg text-xs font-medium transition-all duration-150 cursor-pointer"
                                    style="background-color: #1e0a3c; color: #c4b5fd; border: 1px solid #5b21b6;"
                                    onmouseover="this.style.backgroundColor='#2d1260'; this.style.boxShadow='0 0 8px rgba(109,40,217,0.35)'"
                                    onmouseout="this.style.backgroundColor='#1e0a3c'; this.style.boxShadow='none'">
                                Hapus
                            </button>

                        </form>

                    </div>

                </div>

            </article>

        @empty

            <!-- Empty State -->
            <div class="text-center py-20 rounded-xl anim-scale-in" style="border: 2px dashed #2d2d2d;">

                <div class="w-16 h-16 rounded-2xl mx-auto mb-5 flex items-center justify-center logo-shimmer"
                     style="background: linear-gradient(135deg, #1e0a3c, #2d1260); border: 1px solid #5b21b6;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" style="color: #7c3aed;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>

                <h3 class="text-lg font-semibold text-white mb-2">
                    Belum Ada Tugas
                </h3>

                <p class="text-sm mb-8" style="color: #6b6b6b;">
                    Yuk, mulai buat tugas pertamamu!
                </p>

                <a href="{{ route('todos.create') }}"
                   class="btn-red text-white px-6 py-3 rounded-xl font-semibold inline-flex items-center gap-2 text-sm group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform duration-300 group-hover:rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Tugas
                </a>

            </div>

        @endforelse

    </div>

@endsection
