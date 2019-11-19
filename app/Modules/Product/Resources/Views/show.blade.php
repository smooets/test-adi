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
    <!-- Container -->
    <div class="container">
        <!-- Products -->
        <div class="row mt-3 mb-3">
            <div class="col-12">
                <img class="col-12 img-responsive border" src="{{ $product->imageUrl }}" alt="{{ $product->title }}">
                <div class="mt-2">
                    <div class="row">
                        <span class="col-10 font-weight-bold">{{ $product->title }}</span>
                        <span class="coll-2 font-weight-bold float-right"><i class="fa {{ @($product->loved) ? 'fa-heart' : 'fa-heart-o' }} fa-2x"></i></span>
                    </div>
                </div>
                <p class="mt-2 text-justify">{!! $product->description !!}</p>
                <div class="mt-2 float-right">
                    <span class="font-weight-bold mr-4">{{ $product->price }}</span>
                    <button class="btn btn-primary">Buy</button>
                </div>
            </div>
        </div>
        <!-- End Product-->
    </div>
    <!-- End Container -->
</body>
</html>
