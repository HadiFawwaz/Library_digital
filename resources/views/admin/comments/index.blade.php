<x-app-layout>
    <x-slot name="pageHeading">
        Kelola Komentar
    </x-slot>

    <x-slot name="pageDescription">
        Daftar semua komentar dari siswa di berbagai buku.
    </x-slot>

    <div class="rounded-[2rem] border border-[#dcd2bd] bg-white/85 p-6 shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-[#dcd2bd] text-left text-xs text-[#4c5b54]">
                        <th class="pb-3 font-semibold uppercase text-center tracking-[0.3em]">Siswa</th>
                        <th class="pb-3 font-semibold uppercase text-center tracking-[0.3em]">Buku</th>
                        <th class="pb-3 font-semibold uppercase text-center tracking-[0.3em]">LIKE</th>
                        <th class="pb-3 font-semibold uppercase text-center tracking-[0.3em]">Tanggal</th>
                        <th class="pb-3 font-semibold uppercase text-center tracking-[0.3em]">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($comments as $comment)
                    <tr class="border-b border-[#f0e8d3]">
                        <td class="py-4 text-sm text-center font-medium text-[#172a37]">
                            {{ $comment->user->username }}
                        </td>
                        <td class="py-4 text-sm text-center text-[#4c5b54]">
                            {{ $comment->book->title }}
                        </td>
                        <td class="py-4 text-sm text-center text-[#4c5b54]">
                            <div class="flex items-center justify-center gap-1">
                                <span class="material-symbols-rounded text-sm text-red-500">favorite</span>
                                <span class="font-medium">{{ $comment->likes_count }}</span>
                            </div>
                        </td>
                        <td class="py-4 text-sm text-center text-[#4c5b54]">
                            {{ $comment->created_at->format('d M Y H:i') }}
                        </td>
                        <td class="py-4 text-center">
                            <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus komentar ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1 rounded-full border border-red-500 bg-red-100 px-3 py-1 text-xs font-semibold text-red-700 hover:bg-red-200 transition">
                                    <span class="material-symbols-rounded text-sm">delete</span>
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-8 text-center text-sm text-[#4c5b54]">
                            Tidak ada komentar ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div class="mt-6">
                {{ $comments->links() }}
            </div>
        </div>
    </div>
</x-app-layout>