<!-- login.blade.php -->
<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-50 to-gray-100 py-12 px-4">
        <div class="w-full max-w-md">
            <!-- Logo -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-slate-900 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <span class="text-white text-2xl font-bold">B</span>
                </div>
                <h1 class="text-2xl font-bold text-slate-900">Welcome Back</h1>
                <p class="text-slate-600 mt-2">Sign in to your BiblioCore account</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Form -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Username -->
                    <div class="mb-6">
                        <label for="username" class="block text-sm font-medium text-slate-900 mb-2">
                            Username
                        </label>
                        <div class="relative">
                            <input id="username" type="text" name="username" value="{{ old('username') }}" 
                                   required autofocus autocomplete="username"
                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg text-slate-900 placeholder:text-slate-400 focus:border-slate-400 focus:ring-2 focus:ring-slate-200 focus:outline-none transition">
                            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 material-symbols-outlined text-slate-400">person</span>
                        </div>
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-slate-900 mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <input id="password" type="password" name="password" 
                                   required autocomplete="current-password"
                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg text-slate-900 placeholder:text-slate-400 focus:border-slate-400 focus:ring-2 focus:ring-slate-200 focus:outline-none transition">
                            <span class="absolute right-3 top-1/2 transform -translate-y-1/2 material-symbols-outlined text-slate-400">lock</span>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center">
                            <input id="remember_me" type="checkbox" name="remember" 
                                   class="rounded border-slate-300 text-slate-600 focus:ring-slate-200">
                            <span class="ml-2 text-sm text-slate-700">Remember me</span>
                        </label>
                        
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" 
                               class="text-sm text-slate-600 hover:text-slate-900 transition-colors">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-slate-900 text-white py-3 px-4 rounded-lg font-medium hover:bg-slate-800 transition-colors focus:outline-none focus:ring-2 focus:ring-slate-200 focus:ring-offset-2">
                        Sign In
                    </button>

                    <!-- Register Link -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-slate-600">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="font-medium text-slate-900 hover:text-slate-700 transition-colors">
                                Sign up
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>