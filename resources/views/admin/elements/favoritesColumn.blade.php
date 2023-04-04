<div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>
        <div class="card-body">
            @if($favorites->count() > 0)
                @foreach($favorites as $favorite)
                    @if(isset($withUser) && $withUser === true)
                        <p class="text-primary">
                            By <strong>
                                <a href="{{ route('admin.users.edit', $favorite->user->id ) }}">{{ $favorite->user->name }}</a>
                            </strong>
                        </p>
                    @else
                        <p class="text-primary">
                            <i class="fas fa-gamepad mr-1"></i>
                            <strong>
                                <a href="{{ route('admin.products.edit', $favorite->product->id ) }}">{{ $favorite->product->title }}</a>
                            </strong>
                        </p>
                    @endif
                    <p class="text-primary">{{ $favorite->created_at->diffForHumans() }}</p>
                    <hr>
                @endforeach
            @else
                No favorites
            @endif
        </div>
    </div>

