<div class="row">
    @foreach($products as $product)
        <div class="col-12 col-md-6 p-2">
            <a href="{{ route('product.show', ['id' => $product->id]) }}">
                <div class="card col-12 p-2">
                    <img class="card-img img-responsive border" src="{{ $product->imageUrl }}"
                         alt="{{ $product->title }}">
                    <div class="card-img-overlay h-100 pb-5 d-flex flex-column justify-content-end">
                        <div class="">
                                <span class="btn m-0 p-0"><i
                                            class="fa {{ @($product->loved) ? 'fa-heart' : 'fa-heart-o' }} fa-2x"></i></span>
                        </div>
                    </div>
                    <p class="card-text mt-2">{{ $product->title }}</p>
                </div>
            </a>
        </div>
    @endforeach
</div>