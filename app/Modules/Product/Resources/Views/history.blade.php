@extends('product::layouts.landing')

@section('title', $title)

@section('contents')
    <!-- Top Navbar -->
    <nav class="navbar navbar-toggleable-xl fixed-top navbar-light bg-light">
    <span>
        <a class="navbar-brand" href="javascript:history.back()"><i class="fa fa-arrow-left"></i></a>
        <span class="font-weight-bold">{{ $title }}</span>
    </span>
    </nav>
    <!-- End top Navbar -->
    <!-- Container -->
    <div class="container-fluid pt-60 pb-60">
        <!-- Products -->
        @if(!is_null($products))
            @include('product::partials.card-horizontal', ['products' => $products])
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
@endsection
