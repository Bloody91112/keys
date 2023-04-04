<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
    </div>
    <div class="card-body">
        @if($products->count() > 0)
            @foreach($products as $product)
                <p class="text-primary">
                    <strong>
                        <i class="fas fa-gamepad mr-1"></i>
                        <a href="{{ route('admin.products.edit', $product->id ) }}"> {{ $product->title }}</a>
                    </strong>
                </p>
            @endforeach
        @else
            No products
        @endif
    </div>
</div>


