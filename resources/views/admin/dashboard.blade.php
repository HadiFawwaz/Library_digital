<x-app-layout>
    <x-slot name="pageHeading">
        Panel Admin
    </x-slot>

    <x-slot name="pageDescription">
        Statistik singkat dan aktivitas peminjaman terbaru di BiblioCore.
    </x-slot>

    <div class="w-max-full text-center gap-6 md:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-[2rem] border border-[#dcd2bd] bg-white/85 p-6 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-[#6b766f]">Total Buku</p>
            <p class="mt-4 text-3xl font-semibold text-[#172a37]" style="font-family: 'Space Grotesk', sans-serif;">{{ $totalBooks }}</p>
            <p class="mt-2 text-xs text-[#4c5b54]">Seluruh koleksi yang terdata dalam sistem.</p>
        </div>

        
    </div>

    <div class="w-full-max gap-8 md:grid-cols-[1.6fr_1fr]">
        <div class="rounded-[2.5rem] border border-[#dcd2bd] bg-white/85 p-6 shadow-[0_25px_70px_-45px_rgba(15,87,82,0.45)]">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h3 class="text-lg font-semibold text-[#172a37]" style="font-family: 'Space Grotesk', sans-serif;">Buku yang terbaca Terbaru</h3>
                    <p class="text-xs text-[#4c5b54]">Lima buku yang dibaca oleh terkini  masuk ke sistem.</p>
                </div>
                <a href="{{ route('admin.borrowings.index') }}" class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.3em] text-[#0f766e] transition hover:text-[#115e59]">
                    <span class="material-symbols-rounded text-base">north_east</span>
                    Lihat semua
                </a>
            </div>

            <div class="mt-6 space-y-4">
                @forelse ($recentBorrowings as $borrowing)
                    <div class="rounded-[1.75rem] border border-[#eaddc2] bg-white px-5 py-4 transition hover:border-[#0f766e]/40">
                        <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                            <div>
                                <p class="text-sm font-semibold text-[#172a37]">{{ $borrowing->book->title }}</p>
                                <p class="text-xs text-[#4c5b54]">
                                    Dipinjam oleh <span class="font-medium text-[#0f766e]">{{ $borrowing->borrower_name }}</span>
                                </p>
                            </div>
                            <span class="inline-flex items-center gap-2 rounded-full border border-[#dcd2bd] bg-[#fff1dc] px-4 py-1 text-xs font-semibold uppercase tracking-[0.3em] text-[#b95d23]">
                                {{ $borrowing->statusLabel() }}
                            </span>
                        </div>
                        <div class="mt-4 grid gap-3 text-xs text-[#4c5b54] md:grid-cols-4">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-rounded text-base text-[#0f766e]">calendar_today</span>
                                {{ $borrowing->borrowed_at->translatedFormat('d M Y') }}
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-rounded text-base text-[#be123c]">event</span>
                                {{ $borrowing->return_date->translatedFormat('d M Y') }}
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-rounded text-base text-[#166534]">library_books</span>
                                {{ $borrowing->quantity }} Buku Di Pinjam
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-rounded text-base text-[#9aa29a]">person</span>
                                {{ $borrowing->user->username }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="rounded-[1.75rem] border border-dashed border-[#dcd2bd] bg-white/70 px-6 py-8 text-center text-sm text-[#4c5b54]">
                        Belum ada aktivitas peminjaman terbaru.
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</x-app-layout>
