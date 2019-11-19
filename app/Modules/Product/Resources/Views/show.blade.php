<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Facebook -->
    <meta property="og:url"           content="{{ url()->current() }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $product->title }} ({{ $product->price }})" />
    <meta property="og:description"   content="{{ $product->description }}" />
    <meta property="og:image"         content="{{ $product->imageUrl }}" />

    <title>Laravel</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customs/global.css') }}" rel="stylesheet">

    <style>
        .container-fluid {
            padding-top: 60px;
        }
    </style>
</head>
<body>
<!-- Bottom Navbar -->
<nav class="navbar navbar-toggleable-xl fixed-top navbar-light bg-light">
    <a class="navbar-brand" href="javascript:history.back()"><i class="fa fa-arrow-left"></i></a>
    <a class="navbar-brand mr-0" href="javascript:void(0)" data-toggle="modal" data-target="#shareModal"><i class="fa fa-share-alt"></i></a>
</nav>
<!-- End Bottom Navbar -->
<!-- Container -->
<div class="container-fluid">
    <!-- Product -->
    <div class="row mb-3">
        <div class="col-12">
            <img class="col-12 img-responsive border" src="{{ $product->imageUrl }}" alt="{{ $product->title }}">
            <div class="mt-2">
                <div class="row">
                    <span class="col-10 font-weight-bold">{{ $product->title }}</span>
                    <span class="coll-2 font-weight-bold float-right"><i
                                class="fa {{ @($product->loved) ? 'fa-heart' : 'fa-heart-o' }} fa-2x"></i></span>
                </div>
            </div>
            <p class="mt-2 text-justify">{!! $product->description !!}</p>
            <div class="mt-2 float-right">
                <span class="font-weight-bold mr-4">{{ $product->price }}</span>
                <button class="btn btn-primary buy" data-pid="{{ $product->id }}">Buy</button>
            </div>
        </div>
    </div>
    <!-- End Product-->
</div>

<div id="shareModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Share product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <a class="twitter-share-button"
                   href="https://twitter.com/intent/tweet?text={{ $product->title }} ({{ $product->price }}) {{ url()->current() }}"
                   target="_blank"
                   data-size="large">
                    <button class="btn btn-default" type="button"><i class="fa fa-twitter"></i></button>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank">
                    <button class="btn btn-default" type="button"><i class="fa fa-facebook"></i></button>
                </a>
                <a href="mailto:?subject={{ $product->title }} ({{ $product->price }})&body=Check out this site {{ url()->current() }}.">
                    <button class="btn btn-default" type="button"><i class="fa fa-envelope"></i></button>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- End Container -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '.buy', function () {
        let pid = $(this).data('pid');
        $.post('{{ route('product.buy') }}', { pid: pid} );
    });
</script>
</body>
</html>
