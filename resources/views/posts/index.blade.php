@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Social Feed</h1>

    <!-- Post creation form -->
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <textarea name="message_text" class="form-control" rows="3" placeholder="What's on your mind?"></textarea>
        </div>
        <div class="form-group">
            <input type="file" name="message_gambar" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Post</button>
    </form>

    <!-- Display posts -->
    @foreach ($posts as $post)
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">{{ $post->sender }}</h5>
                <p class="card-text">{{ $post->message_text }}</p>
                @if ($post->message_gambar)
                    <img src="{{ asset('storage/' . $post->message_gambar) }}" class="img-fluid" alt="Post image">
                @endif
                <p class="text-muted">{{ $post->created_at->diffForHumans() }}</p>

                <!-- Like button -->
                <button class="btn btn-sm btn-outline-primary like-btn" data-post-id="{{ $post->id }}">
                    Like ({{ $post->likes->count() }})
                </button>

                <!-- Comments -->
                <h6 class="mt-3">Comments</h6>
                @foreach ($post->comments as $comment)
                    <div class="mb-2">
                        <strong>{{ $comment->user->name }}:</strong>
                        {{ $comment->komentar_text }}
                    </div>
                @endforeach

                <!-- Comment form -->
                <form action="{{ route('posts.comments.store', $post->id) }}" method="POST" class="mt-2">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="komentar_text" class="form-control" placeholder="Add a comment">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Comment</button>
                </form>
            </div>
        </div>
    @endforeach
</div>

@endsection

@push('scripts')
<script>
    // Add JavaScript for handling like button clicks asynchronously
    $('.like-btn').on('click', function() {
        const postId = $(this).data('post-id');
        $.post(`/posts/${postId}/like`, function(data) {
            // Update like count and button state
        });
    });
</script>
@endpush
