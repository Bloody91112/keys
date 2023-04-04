<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
    </div>
    <div class="card-body">
        @if($promocodes->count() > 0)
            @foreach($promocodes as $promocode)
                <p class="text-primary">
                    <strong>
                        <a href="{{ route('admin.promocodes.edit', $promocode->id ) }}">PROMOCODE ID {{ $promocode->id }}</a>
                    </strong>
                </p>
            @endforeach
        @else
            No promocodes
        @endif
    </div>
</div>


