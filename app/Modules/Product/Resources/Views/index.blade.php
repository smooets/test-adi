@extends('product::layouts.landing')

@section('contents')
    <!-- Top Navbar -->
    <nav class="navbar navbar-light bg-light">
        <form class="my-auto d-inline w-100">
            <div class="input-group">
                <span id="brand" class="input-group-append mr-3 mt-1"><i class="fa fa-heart-o fa-2x"></i></span>
                <input id="search" type="text" class="form-control" placeholder="Search">
            </div>
        </form>
    </nav>
    <!-- End Top Navbar -->
    <!-- Container -->
    <div id="body-container" class="container-fluid pb-60">
        <!-- Categories -->
        @include('product::partials.categories', ['categories' => $categories])
        <!-- End Categories -->
        <!-- Products -->
        @if(!is_null($products))
            @include('product::partials.card-square', ['products' => $products])
        @else
            <div class="col-12 col-md-6 p-2">
                <p class="text-center">Whoops, product not found.</p>
            </div>
        @endif
        <!-- End Product-->
    </div>
    <!-- End Container -->
    <!-- Search Container -->
    <div id="search-container" class="container-fluid pb-60 d-none"></div>
    <!-- End Search Container -->
    <!-- Bottom Navbar -->
    <nav id="bottom-navbar" class="navbar navbar-toggleable-xl navbar-light bg-light fixed-bottom text-center">
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
@endsection

@section('scripts')
    <script src="{{ asset('js/product/index.js') }}"></script>
@endsection
