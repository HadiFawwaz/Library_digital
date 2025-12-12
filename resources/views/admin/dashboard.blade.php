<!-- resources/views/admin/dashboard.blade.php -->
<x-app-layout>
    <x-slot name="pageHeading">
        Admin Dashboard
    </x-slot>

    <x-slot name="pageDescription">
        Overview of library management system
    </x-slot>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Books -->
        <div class="bg-white border border-slate-200 rounded-xl p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-blue-600">auto_stories</span>
                </div>
                
            </div>
            <h3 class="font-semibold text-slate-900 mb-2">Library Collection</h3>
            <p class="text-sm text-slate-600">Total books in the system</p>
        </div>

        <!-- Total Users -->
        <div class="bg-white border border-slate-200 rounded-xl p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-emerald-50 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-emerald-600">people</span>
                </div>
                
            </div>
            <h3 class="font-semibold text-slate-900 mb-2">Registered Users</h3>
            <p class="text-sm text-slate-600">Students and administrators</p>
        </div>

        <!-- Recent Comments -->
        <div class="bg-white border border-slate-200 rounded-xl p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-amber-50 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-amber-600">comment</span>
                </div>
               
            </div>
            <h3 class="font-semibold text-slate-900 mb-2">Student Comments</h3>
            <p class="text-sm text-slate-600">Total user comments</p>
        </div>

        <!-- System Status -->
        <div class="bg-white border border-slate-200 rounded-xl p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-slate-50 rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-slate-600">check_circle</span>
                </div>
                <div class="text-right">
                    <div class="text-2xl font-bold text-slate-900">100%</div>
                    <div class="text-sm text-slate-500">System Status</div>
                </div>
            </div>
            <h3 class="font-semibold text-slate-900 mb-2">All Systems Online</h3>
            <p class="text-sm text-slate-600">Last checked: {{ now()->format('H:i') }}</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid lg:grid-cols-2 gap-8">
        <!-- Recent Comments Section -->
        <div class="bg-white border border-slate-200 rounded-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-slate-900">Recent Comments</h3>
                <a href="{{ route('admin.comments.index') }}" 
                   class="text-sm text-blue-600 hover:text-blue-700 font-medium">
                    View all
                </a>
            </div>

            <div class="space-y-4">
                @forelse($recentComments as $comment)
                <div class="border border-slate-200 rounded-lg p-4 hover:bg-slate-50 transition-colors">
                    <div class="flex items-start justify-between mb-2">
                        <div>
                            <p class="font-medium text-slate-900">{{ $comment->user->name }}</p>
                            <p class="text-sm text-slate-500">on {{ $comment->book->title }}</p>
                        </div>
                        <span class="text-xs text-slate-400">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-sm text-slate-600 mb-3">{{ Str::limit($comment->content, 100) }}</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-red-400 text-sm">favorite</span>
                            <span class="text-xs text-slate-500">{{ $comment->likes_count }} likes</span>
                        </div>
                        <form method="POST" action="{{ route('admin.comments.destroy', $comment) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-xs text-red-600 hover:text-red-700 font-medium"
                                    onclick="return confirm('Delete this comment?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="text-center py-8">
                    <span class="material-symbols-outlined text-slate-300 text-4xl mb-2">comment</span>
                    <p class="text-slate-500">No comments yet</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white border border-slate-200 rounded-xl p-6">
            <h3 class="text-lg font-semibold text-slate-900 mb-6">Quick Actions</h3>
            
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('admin.books.create') }}" 
                   class="border border-slate-200 rounded-lg p-4 hover:border-slate-300 hover:bg-slate-50 transition-colors text-center">
                    <span class="material-symbols-outlined text-blue-600 mb-2 block">add</span>
                    <span class="text-sm font-medium text-slate-900">Add Book</span>
                </a>
                
                <a href="{{ route('admin.books.index') }}" 
                   class="border border-slate-200 rounded-lg p-4 hover:border-slate-300 hover:bg-slate-50 transition-colors text-center">
                    <span class="material-symbols-outlined text-emerald-600 mb-2 block">list</span>
                    <span class="text-sm font-medium text-slate-900">View Books</span>
                </a>
                
                <a href="{{ route('admin.comments.index') }}" 
                   class="border border-slate-200 rounded-lg p-4 hover:border-slate-300 hover:bg-slate-50 transition-colors text-center">
                    <span class="material-symbols-outlined text-amber-600 mb-2 block">forum</span>
                    <span class="text-sm font-medium text-slate-900">Manage Comments</span>
                </a>
                
                <a href="#" 
                   class="border border-slate-200 rounded-lg p-4 hover:border-slate-300 hover:bg-slate-50 transition-colors text-center">
                    <span class="material-symbols-outlined text-purple-600 mb-2 block">analytics</span>
                    <span class="text-sm font-medium text-slate-900">Reports</span>
                </a>
            </div>

            <!-- Recent Activity -->
            <div class="mt-8 pt-6 border-t border-slate-200">
                <h4 class="font-semibold text-slate-900 mb-4">Recent Activity</h4>
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-blue-600 text-sm">add</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-900">New book added</p>
                            <p class="text-xs text-slate-500">2 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-green-600 text-sm">person_add</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-slate-900">New user registered</p>
                            <p class="text-xs text-slate-500">5 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>