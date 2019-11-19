<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Laravel</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customs/global.css') }}" rel="stylesheet">

    <style>
        .container-fluid {
            padding-bottom: 60px;
            padding-top: 60px;
        }
    </style>
</head>
<body>
<!-- Bottom Navbar -->
<nav class="navbar navbar-toggleable-xl fixed-top navbar-light bg-light">
    <span>
        <a class="navbar-brand" href="javascript:history.back()"><i class="fa fa-arrow-left"></i></a>
        <span class="font-weight-bold">Purchased History</span>
    </span>
</nav>
<!-- End Bottom Navbar -->
<!-- Container -->
<div class="container-fluid">
    <!-- Products -->
    @if(!is_null($products))
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
    @else
        <div class="col-12 col-md-6 p-2">
            <p class="text-center">Whoops, you never buy somethings.</p>
        </div>
    @endif
    <!-- End Products-->
    <!-- Logout-->
    @if(\Auth::check())
        <a class="btn btn-danger col-12" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endif
    <!-- End Logout-->
</div>
<!-- End Container -->
<!-- Bottom Navbar -->
<nav class="navbar navbar-toggleable-xl navbar-light bg-light fixed-bottom text-center">
    <div class="navbar-expand ml-auto mx-auto" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item font-weight-bold">
                <a class="nav-link" href="{{ route('product.index') }}">Home</a>
            </li>
            <li class="nav-item font-weight-bold">
                <a class="nav-link" href="#">Feed</a>
            </li>
            <li class="nav-item font-weight-bold">
                <a class="nav-link" href="#">Chart</a>
            </li>
            <li class="nav-item font-weight-bold">
                <a class="nav-link" href="{{ route('product.history') }}">Profile</a>
            </li>
        </ul>
    </div>
</nav>
<!-- End Bottom Navbar -->
</body>
</html>
