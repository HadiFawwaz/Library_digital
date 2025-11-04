<x-app-layout>
    <x-slot name="pageHeading">
        Pengaturan Profil
    </x-slot>

    <x-slot name="pageDescription">
        Perbarui informasi akun, kata sandi, dan kelola akses BiblioCore-mu.
    </x-slot>

    <div class="space-y-6">
        <div class="rounded-[2.5rem] border border-[#dcd2bd] bg-white/90 p-6 shadow-[0_25px_70px_-45px_rgba(15,87,82,0.45)]">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="rounded-[2.5rem] border border-[#dcd2bd] bg-white/90 p-6 shadow-[0_25px_70px_-45px_rgba(15,87,82,0.45)]">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Books Liked by User Section -->
        <div class="rounded-[2.5rem] border border-[#dcd2bd] bg-white/90 p-6 shadow-[0_25px_70px_-45px_rgba(15,87,82,0.45)]">
            <div class="max-w-xl">
                <h2 class="text-lg font-semibold text-[#172a37] mb-4" style="font-family: 'Space Grotesk', sans-serif;">
                    Novel yang Saya Sukai
                </h2>
                
                @if($likedBooks && $likedBooks->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($likedBooks as $book)
                            <div class="rounded-[1.5rem] border border-[#eaddc2] bg-white p-4 flex items-center gap-3">
                                @if($book->cover_image_path)
                                    <div class="h-12 w-8 overflow-hidden rounded-[0.75rem] border border-[#eaddc2] bg-[#f6ecda]">
                                        <img src="{{ asset('storage/'.$book->cover_image_path) }}" alt="Sampul {{ $book->title }}" class="h-full w-full object-cover" />
                                    </div>
                                @else
                                    <div class="h-12 w-8 flex items-center justify-center text-[8px] font-semibold uppercase tracking-[0.2em] text-[#b69c74] bg-[#f6ecda] rounded-[0.75rem]">
                                        No Cover
                                    </div>
                                @endif
                                <div>
                                    <p class="text-sm font-semibold text-[#172a37] truncate max-w-[140px]">{{ $book->title }}</p>
                                    <p class="text-xs text-[#4c5b54]">{{ $book->author }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-[#4c5b54]">Kamu belum menyukai novel apapun. Mulai jelajahi dan sukai novel yang menarik!</p>
                @endif
            </div>
        </div>

        <div class="rounded-[2.5rem] border border-[#be123c]/30 bg-[#be123c]/10 p-6 shadow-[0_25px_70px_-45px_rgba(190,18,60,0.35)]">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
