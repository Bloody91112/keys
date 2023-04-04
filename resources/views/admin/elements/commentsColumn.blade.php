<div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
        <div class="card-body">
            @if($comments->count() > 0)
                @foreach($comments as $comment)
                    @if(isset($withUser) && $withUser === true)
                        <strong>
                            <i class="fas fa-comment-dots mr-1"></i>
                            <a href="{{ route('admin.comments.edit', $comment->id) }}">{{ $comment->user->name }}</a>
                        </strong>
                    @else
                        <strong>
                            <i class="fas fa-comment-dots mr-1"></i>
                            <a href="{{ route('admin.comments.edit', $comment->id) }}">{{ $comment->product->title }}</a>
                        </strong>
                    @endif

                    @if(mb_strlen($comment->message) >= 100)
                        <p>{{ mb_substr($comment->message, 0, 97) . '...' }}</p>
                    @else
                        <p>{{ $comment->message }}</p>
                    @endif
                    <p class="text-primary">{{ $comment->created_at->diffForHumans() }}</p>
                    <hr>
                @endforeach
            @else
                No comments
            @endif
        </div>
    </div>

