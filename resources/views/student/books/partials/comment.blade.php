<div class="border-b pb-3 mb-3" style="margin-left: {{ $level * 24 }}px;">
    <p class="text-sm font-semibold">{{ $comment->user->name ?? 'Anonymous' }}</p>
    <p class="text-sm mb-1">{{ $comment->content }}</p>

    <div class="flex items-center gap-3 text-xs text-gray-500 mb-2">
        <form method="POST" action="{{ route('comments.like', $comment) }}">
            @csrf
            <button type="submit" class="hover:underline">👍 {{ $comment->likes?->count() ?? 0 }}</button>
        </form>
        <button type="button" class="hover:underline" onclick="setReply({{ $comment->id }}, '{{ $comment->user->name }}')">Reply</button>
        <span>{{ $comment->created_at->diffForHumans() }}</span>
    </div>

    @foreach($comment->replies as $like )
        @include('books.partials.comment', ['comment' => $reply, 'level' => $level + 1])
    @endforeach
</div>
