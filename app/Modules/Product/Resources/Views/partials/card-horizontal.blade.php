<!-- Products -->
<div class="row">
    @foreach($products as $product)
        <div class="col-12">
            <a href="{{ route('product.show', ['id' => $product->id]) }}">
                <div class="card mb-2 p-2">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <img class="thumbnail" src="{{ $product->imageUrl }}" class="img-fluid" alt="{{ $product->title }}">
                        </div>
                        <div class="col">
                            <div class="card-block px-2">
                                <p class="card-text font-weight-bold text-black-50">{{ $product->title }}</p>
                                <p class="card-text">{{ $product->price }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
<!-- End Product-->