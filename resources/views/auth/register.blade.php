<!-- register.blade.php -->
<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-50 to-gray-100 py-12 px-4">
        <div class="w-full max-w-md">
            <!-- Logo -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-slate-900 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl font-bold">B</span>
                </div>
                <h1 class="text-2xl font-bold text-slate-900">Create Account</h1>
                <p class="text-slate-600 mt-2">Join BiblioCore library platform</p>
            </div>

            <!-- Form -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="space-y-5">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-slate-900 mb-2">
                                Full Name
                            </label>
                            <div class="relative">
                                <input id="name" type="text" name="name" value="{{ old('name') }}" 
                                       required autofocus autocomplete="name"
                                       class="w-full px-4 py-3 border border-slate-300 rounded-lg text-slate-900 placeholder:text-slate-400 focus:border-slate-400 focus:ring-2 focus:ring-slate-200 focus:outline-none transition">
                                <span class="absolute right-3 top-1/2 transform -translate-y-1/2 material-symbols-outlined text-slate-400">badge</span>
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Username -->
                        <div>
                            <label for="username" class="block text-sm font-medium text-slate-900 mb-2">
                                Username
                            </label>
                            <div class="relative">
                                <input id="username" type="text" name="username" value="{{ old('username') }}" 
                                       required autocomplete="username"
                                       class="w-full px-4 py-3 border border-slate-300 rounded-lg text-slate-900 placeholder:text-slate-400 focus:border-slate-400 focus:ring-2 focus:ring-slate-200 focus:outline-none transition">
                                <span class="absolute right-3 top-1/2 transform -translate-y-1/2 material-symbols-outlined text-slate-400">alternate_email</span>
                            </div>
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-900 mb-2">
                                Email Address
                            </label>
                            <div class="relative">
                                <input id="email" type="email" name="email" value="{{ old('email') }}" 
                                       required autocomplete="email"
                                       class="w-full px-4 py-3 border border-slate-300 rounded-lg text-slate-900 placeholder:text-slate-400 focus:border-slate-400 focus:ring-2 focus:ring-slate-200 focus:outline-none transition">
                                <span class="absolute right-3 top-1/2 transform -translate-y-1/2 material-symbols-outlined text-slate-400">mail</span>
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-slate-900 mb-2">
                                Password
                            </label>
                            <div class="relative">
                                <input id="password" type="password" name="password" 
                                       required autocomplete="new-password"
                                       class="w-full px-4 py-3 border border-slate-300 rounded-lg text-slate-900 placeholder:text-slate-400 focus:border-slate-400 focus:ring-2 focus:ring-slate-200 focus:outline-none transition">
                                <span class="absolute right-3 top-1/2 transform -translate-y-1/2 material-symbols-outlined text-slate-400">lock</span>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-slate-900 mb-2">
                                Confirm Password
                            </label>
                            <div class="relative">
                                <input id="password_confirmation" type="password" name="password_confirmation" 
                                       required autocomplete="new-password"
                                       class="w-full px-4 py-3 border border-slate-300 rounded-lg text-slate-900 placeholder:text-slate-400 focus:border-slate-400 focus:ring-2 focus:ring-slate-200 focus:outline-none transition">
                                <span class="absolute right-3 top-1/2 transform -translate-y-1/2 material-symbols-outlined text-slate-400">lock_reset</span>
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-slate-900 text-white py-3 px-4 rounded-lg font-medium hover:bg-slate-800 transition-colors focus:outline-none focus:ring-2 focus:ring-slate-200 focus:ring-offset-2 mt-6">
                        Create Account
                    </button>

                    <!-- Login Link -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-slate-600">
                            Already have an account?
                            <a href="{{ route('login') }}" class="font-medium text-slate-900 hover:text-slate-700 transition-colors">
                                Sign in
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>