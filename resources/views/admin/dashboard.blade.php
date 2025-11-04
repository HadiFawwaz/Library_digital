<x-app-layout>
    <x-slot name="pageHeading">
        Panel Admin
    </x-slot>

    <x-slot name="pageDescription">
        Statistik singkat dan aktivitas peminjaman terbaru di BiblioCore.
    </x-slot>

    <div class="w-max-full text-center gap-6 md:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-[2rem] border border-[#dcd2bd] bg-white/85 p-6 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-[#6b766f]">Kelola Komentar Siswa Di Novel</p>

            <p class="mt-2 text-xs text-[#4c5b54]">Kelola komentar siswa di novel yang berbeda.</p>
        </div>
    </div>

    <style>
        .delete-transition {
            transition: all 0.3s ease-in-out;
        }

        #toast {
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
    </style>

    <div class="w-full-max gap-8 md:grid-cols-[1.6fr_1fr]">
        <!-- First Comment Section -->
        <div
            class="rounded-[2.5rem] border border-[#dcd2bd] bg-white/85 p-6 shadow-[0_25px_70px_-45px_rgba(15,87,82,0.45)]">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h3 class="text-lg font-semibold text-[#172a37]" style="font-family: 'Space Grotesk', sans-serif;">
                        Komentar Terbaru</h3>
                    <p class="text-xs text-[#4c5b54]">Lima komentar terakhir dari siswa di buku yang berbeda.</p>
                </div>
                <a href="{{ route('admin.comments.index') }}"
                    class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.3em] text-[#0f766e] transition hover:text-[#115e59]">
                    <span class="material-symbols-rounded text-base">north_east</span>
                    Lihat semua
                </a>
            </div>

            <div class="mt-6 space-y-4" id="recent-comments-section">
                @forelse ($recentComments as $comment)
                    <div class="comment-item rounded-[1.75rem] border border-[#eaddc2] bg-white px-5 py-4 transition hover:border-[#0f766e]/40"
                        data-comment-id="{{ $comment->id }}">
                        <div class="flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-[#172a37]">{{ $comment->book->title }}</p>
                                <p class="text-xs text-[#4c5b54]">
                                    Dikomentari oleh <span
                                        class="font-medium text-[#0f766e]">{{ $comment->user->username }}</span>
                                </p>
                                <p class="mt-1 text-xs text-[#4c5b54]">{{ Str::limit($comment->content, 100) }}</p>
                            <div class="mt-1 flex items-center gap-1">
                                <span class="material-symbols-rounded text-xs text-red-500">favorite</span>
                                <span class="text-xs text-[#b95d23]">{{ $comment->likes_count }} LIKE</span>
                            </div>
                            </div>
                            <div class="flex flex-col items-end gap-2 mt-2 md:mt-0">
                                <div class="flex items-center gap-1">
                                    <span class="material-symbols-rounded text-xs text-red-500">favorite</span>
                                    <span class="text-xs text-[#b95d23]">{{ $comment->likes_count }} LIKE</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <form method="POST" action="{{ route('admin.comments.destroy', $comment) }}"
                                        class="delete-form" data-comment-content="{{ Str::limit($comment->content, 30) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center gap-1 rounded-full border border-red-500 bg-red-100 px-3 py-1 text-xs font-semibold text-red-700 hover:bg-red-200 transition delete-btn">
                                            <span class="material-symbols-rounded text-sm">delete</span>
                                            Hapus
                                        </button>
                                    </form>
                                    <span
                                        class="inline-flex uppercase items-center gap-1 rounded-full border border-[#dcd2bd] bg-[#fff1dc] px-3 py-1 text-xs font-semibold uppercase tracking-[0.3em] text-[#b95d23]">
                                        {{ $comment->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div
                        class="rounded-[1.75rem] border border-dashed border-[#dcd2bd] bg-white/70 px-6 py-8 text-center text-sm text-[#4c5b54]">
                        Belum ada komentar terbaru.
                    </div>
                @endforelse
            </div>
            <div
                class="rounded-[2.5rem] mt-4 border border-[#dcd2bd] bg-white/85 p-6 shadow-[0_25px_70px_-45px_rgba(15,87,82,0.45)]">
                <div class="flex items-center justify-between gap-4">
                    <h3 class="text-lg font-semibold text-[#172a37]">Komentar Terbaru Siswa</h3>
                    <a href="{{ route('admin.comments.index') }}"
                        class="text-xs font-semibold text-[#0f766e] hover:text-[#115e59]">Lihat semua</a>
                </div>

                <div class="mt-4 space-y-4" id="recent-comments-student-section">
                    @forelse($recentComments as $comment)
                        <div class="comment-item-student rounded-[1.75rem] border border-[#eaddc2] bg-white px-5 py-4 flex justify-between items-start gap-4"
                            data-comment-id="{{ $comment->id }}">
                            <div>
                                <p class="text-sm font-semibold">{{ $comment->user->username }} Komentar di
                                    <em>{{ $comment->book->title }}</em></p>
                                <p class="text-xs text-[#4c5b54]">{{ $comment->content }}</p>
                                <div class="flex items-center gap-1 mt-1">
                                    <span class="material-symbols-rounded text-xs text-red-500">favorite</span>
                                    <span class="text-xs text-[#b95d23]">{{ $comment->likes_count }} LIKE</span>
                                </div>
                                <p class="text-[10px] text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
                            </div>
                            <form method="POST" action="{{ route('admin.comments.destroy', $comment) }}"
                                class="delete-form-student" data-comment-content="{{ Str::limit($comment->content, 30) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center gap-1 rounded-full border border-red-500 bg-red-100 px-3 py-1 text-xs font-semibold text-red-700 hover:bg-red-200 transition delete-btn-student">
                                    <span class="material-symbols-rounded text-sm">delete</span>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="text-xs text-gray-500">Belum ada komentar siswa.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Second Comment Section -->

    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="fixed inset-0 z-50 hidden flex items-center justify-center">
        <div class="absolute inset-0 bg-black/50" id="modalBackdrop"></div>
        <div
            class="relative bg-white rounded-2xl p-6 w-11/12 max-w-md mx-auto shadow-xl z-10 transform scale-95 opacity-0 transition-transform transition-opacity duration-200">
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <span class="material-symbols-rounded text-red-600 text-2xl">warning</span>
                </div>
                <h3 class="text-lg font-semibold text-[#172a37] mt-4" style="font-family: 'Space Grotesk', sans-serif;">
                    Konfirmasi Penghapusan</h3>
                <p class="text-sm text-[#4c5b54] mt-2">Apakah Anda yakin ingin menghapus komentar <span
                        id="commentContentModal" class="font-semibold"></span>? Tindakan ini tidak dapat dibatalkan.</p>
            </div>

            <div class="mt-6 flex justify-center gap-3">
                <button id="cancelDelete"
                    class="inline-flex items-center gap-2 rounded-full border border-[#dcd2bd] px-4 py-2 text-xs font-semibold uppercase tracking-[0.3em] text-[#4c5b54] transition hover:bg-[#fdf4e3]">
                    Batal
                </button>
                <button id="confirmDelete"
                    class="inline-flex items-center gap-2 rounded-full bg-[#be123c] px-4 py-2 text-xs font-semibold uppercase tracking-[0.3em] text-white transition hover:bg-[#991b1b]">
                    Hapus
                </button>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="fixed top-4 right-4 z-50 hidden">
        <div
            class="bg-white border border-[#dcd2bd] rounded-full px-4 py-3 shadow-[0_5px_15px_rgba(0,0,0,0.1)] flex items-center gap-3">
            <span class="material-symbols-rounded text-green-600">check_circle</span>
            <span id="toastMessage" class="text-sm font-medium text-[#172a37]">Komentar berhasil dihapus!</span>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-btn, .delete-btn-student');
            const deleteModal = document.getElementById('deleteModal');
            const modalBackdrop = document.getElementById('modalBackdrop');
            const cancelDelete = document.getElementById('cancelDelete');
            const confirmDelete = document.getElementById('confirmDelete');
            const commentContentModal = document.getElementById('commentContentModal');
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');

            let currentForm = null;

            deleteButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    currentForm = this.closest('.delete-form, .delete-form-student');
                    const content = currentForm.getAttribute('data-comment-content');
                    commentContentModal.textContent = '"' + content + (content.length >= 30 ? '...' : '') + '"';
                    showDeleteModal();
                });
            });

            function showDeleteModal() {
                deleteModal.classList.remove('hidden');
                // Trigger the animation
                setTimeout(() => {
                    const modalContent = deleteModal.querySelector('.transform');
                    modalContent.classList.remove('scale-95', 'opacity-0');
                    modalContent.classList.add('scale-100', 'opacity-100');
                }, 10);
            }

            function hideDeleteModal() {
                const modalContent = deleteModal.querySelector('.transform');
                modalContent.classList.remove('scale-100', 'opacity-100');
                modalContent.classList.add('scale-95', 'opacity-0');

                setTimeout(() => {
                    deleteModal.classList.add('hidden');
                }, 200);
            }

            modalBackdrop.addEventListener('click', hideDeleteModal);
            cancelDelete.addEventListener('click', hideDeleteModal);

            confirmDelete.addEventListener('click', function () {
                if (currentForm) {
                    // Get the parent comment item to add animation
                    const commentItem = currentForm.closest('.comment-item, .comment-item-student');
                    commentItem.classList.add('delete-transition');

                    // Fade out and slide animation
                    commentItem.style.opacity = '0';
                    commentItem.style.transform = 'translateX(-100%)';

                    setTimeout(() => {
                        currentForm.submit();
                    }, 300);
                }
            });

            // Show toast notification if deletion was successful
            @if(session('success'))
                showToast('{{ session('success') }}');
            @endif

            function showToast(message) {
                toastMessage.textContent = message;
                toast.classList.remove('hidden');
                toast.classList.add('delete-transition');

                // Animate in
                toast.style.transform = 'translateX(100%)';
                toast.style.opacity = '0';

                setTimeout(() => {
                    toast.style.transform = 'translateX(0)';
                    toast.style.opacity = '1';
                }, 10);

                // Auto hide after 3 seconds
                setTimeout(() => {
                    toast.style.transform = 'translateX(100%)';
                    toast.style.opacity = '0';

                    setTimeout(() => {
                        toast.classList.add('hidden');
                    }, 300);
                }, 3000);
            }
        });
    </script>
</x-app-layout>