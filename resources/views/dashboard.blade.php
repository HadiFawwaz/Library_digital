<!-- dashboard.blade.php -->
<x-app-layout>
    <x-slot name="pageHeading">
        Welcome back, {{ Auth::user()->name }}
    </x-slot>

    <x-slot name="pageDescription">
        Overview of your library activities and quick access to features.
    </x-slot>

    <!-- Stats Overview -->
    <div class="mb-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Stat 1 -->
            <div class="bg-white border border-slate-200 rounded-xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-blue-600">auto_stories</span>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-slate-900">12</div>
                        <div class="text-sm text-slate-500">Books Read</div>
                    </div>
                </div>
                <h3 class="font-semibold text-slate-900 mb-2">Reading Progress</h3>
                <p class="text-sm text-slate-600">Track your reading history and progress</p>
            </div>

            <!-- Stat 2 -->
            <div class="bg-white border border-slate-200 rounded-xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-emerald-50 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-emerald-600">pending</span>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-slate-900">3</div>
                        <div class="text-sm text-slate-500">Pending</div>
                    </div>
                </div>
                <h3 class="font-semibold text-slate-900 mb-2">Active Loans</h3>
                <p class="text-sm text-slate-600">Books currently on loan</p>
            </div>

            <!-- Stat 3 -->
            <div class="bg-white border border-slate-200 rounded-xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-amber-50 rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-amber-600">history</span>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-slate-900">24</div>
                        <div class="text-sm text-slate-500">Total</div>
                    </div>
                </div>
                <h3 class="font-semibold text-slate-900 mb-2">All Loans</h3>
                <p class="text-sm text-slate-600">Total books borrowed</p>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid gap-6 lg:grid-cols-2">
        <!-- Left Column -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="bg-white border border-slate-200 rounded-xl p-6">
                <h3 class="font-semibold text-slate-900 mb-4 text-lg">Quick Actions</h3>
                <div class="grid grid-cols-2 gap-3">
                    <a href="{{ route('student.books.index') }}" 
                       class="p-4 border border-slate-200 rounded-lg hover:border-slate-300 hover:bg-slate-50 transition-colors text-center">
                        <span class="material-symbols-outlined text-slate-600 mb-2 block">search</span>
                        <span class="text-sm font-medium text-slate-900">Browse Books</span>
                    </a>
                    <a href="{{ route('profile.edit') }}" 
                       class="p-4 border border-slate-200 rounded-lg hover:border-slate-300 hover:bg-slate-50 transition-colors text-center">
                        <span class="material-symbols-outlined text-slate-600 mb-2 block">person</span>
                        <span class="text-sm font-medium text-slate-900">Profile</span>
                    </a>
                    <a href="#" 
                       class="p-4 border border-slate-200 rounded-lg hover:border-slate-300 hover:bg-slate-50 transition-colors text-center">
                        <span class="material-symbols-outlined text-slate-600 mb-2 block">history</span>
                        <span class="text-sm font-medium text-slate-900">History</span>
                    </a>
                    <a href="#" 
                       class="p-4 border border-slate-200 rounded-lg hover:border-slate-300 hover:bg-slate-50 transition-colors text-center">
                        <span class="material-symbols-outlined text-slate-600 mb-2 block">settings</span>
                        <span class="text-sm font-medium text-slate-900">Settings</span>
                    </a>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white border border-slate-200 rounded-xl p-6">
                <h3 class="font-semibold text-slate-900 mb-4 text-lg">Recent Activity</h3>
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-blue-600 text-sm">download</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-900">Borrowed "Digital Design"</p>
                            <p class="text-xs text-slate-500">2 days ago</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-emerald-600 text-sm">check_circle</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-900">Returned "Web Development"</p>
                            <p class="text-xs text-slate-500">1 week ago</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-amber-100 rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-amber-600 text-sm">bookmark</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-900">Saved "UI/UX Design"</p>
                            <p class="text-xs text-slate-500">2 weeks ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-6">
            <!-- Recommended Books -->
            <div class="bg-white border border-slate-200 rounded-xl p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-semibold text-slate-900 text-lg">Recommended For You</h3>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-700 font-medium">View all</a>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors">
                        <div class="w-12 h-16 bg-slate-100 rounded overflow-hidden flex-shrink-0">
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-slate-300">book</span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-medium text-slate-900">Digital Design Principles</h4>
                            <p class="text-sm text-slate-500">By Alex Johnson</p>
                        </div>
                        <button class="text-blue-600 hover:text-blue-700">
                            <span class="material-symbols-outlined">add</span>
                        </button>
                    </div>
                    <div class="flex items-center gap-3 p-3 border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors">
                        <div class="w-12 h-16 bg-slate-100 rounded overflow-hidden flex-shrink-0">
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-slate-300">book</span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-medium text-slate-900">Modern Web Development</h4>
                            <p class="text-sm text-slate-500">By Sarah Miller</p>
                        </div>
                        <button class="text-blue-600 hover:text-blue-700">
                            <span class="material-symbols-outlined">add</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- System Status -->
            <div class="bg-slate-900 text-white rounded-xl p-6">
                <h3 class="font-semibold mb-4 text-lg">System Status</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-slate-300">Library Database</span>
                        <span class="px-2 py-1 bg-emerald-500 text-white text-xs rounded">Online</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-slate-300">Borrowing System</span>
                        <span class="px-2 py-1 bg-emerald-500 text-white text-xs rounded">Active</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-slate-300">User Accounts</span>
                        <span class="px-2 py-1 bg-emerald-500 text-white text-xs rounded">Secure</span>
                    </div>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-700">
                    <p class="text-sm text-slate-300">Last updated: {{ now()->format('M d, Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>