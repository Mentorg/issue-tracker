@forelse ($comments as $comment)
    <li class="bg-slate-200 py-4 px-10 rounded-md w-full">
        <h3 class="font-semibold">{{ $comment->author_name }}</h3>
        <p class="text-sm italic mt-4">{{ $comment->body }}</p>
        <small class="text-gray-500">
            {{ $comment->created_at->diffForHumans() }}
        </small>
    </li>
@empty
    <p id="no-comments">No comments yet</p>
@endforelse

<div class="pagination mt-4">
    {{ $comments->links() }}
</div>
