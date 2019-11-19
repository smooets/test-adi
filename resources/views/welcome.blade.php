<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/customs/global.css') }}" rel="stylesheet">
    </head>
<body>
    <nav class="navbar navbar-light bg-light">
        <form class="my-auto d-inline w-100">
            <div class="input-group">
                <span class="input-group-append mr-3 mt-1"><i class="fa fa-heart fa-2x"></i></span>
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
    </nav>

    <!-- Container -->
    <div class="container-fluid">
        <!-- Categories -->
        <div class="row flex-row flex-nowrap scroll">
            @foreach($categories as $category)
                <div class="col-3 m-1 p-1">
                    <div class="card p-1">
                        <img class="card-img-top" src="{{ $category->imageUrl }}" alt="{{ $category->name }}">
                        <p class="card-text text-center">
                            <small class="text-muted">{{ $category->name }}</small>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- End Categories -->

        <!-- Products -->
        <div class="row">
            @foreach($products as $product)
                <div class="col-12 col-md-6 p-2">
                    <a href="{{ route('product.show', ['id' => $product->id]) }}">
                        <div class="card col-12 p-2">
                            <img class="card-img img-responsive border" src="{{ $product->imageUrl }}" alt="{{ $product->title }}">
                            <div class="card-img-overlay h-100 pb-5 d-flex flex-column justify-content-end">
                                <div class="">
                                    <span class="btn m-0 p-0"><i class="fa {{ @($product->loved) ? 'fa-heart' : 'fa-heart-o' }} fa-2x"></i></span>
                                </div>
                            </div>
                            <p class="card-text mt-2">{{ $product->title }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <!-- End Product-->

    </div>
    <!-- End Container -->
</body>
</html>
