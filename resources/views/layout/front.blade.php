<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name')}}</title>
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="mt-2">
                <nav class="navbar navbar-expand-lg bg-body-tertiary p-2">
                    <div class="container-fluid">
                        <a href="{{ url('/') }}"><img src="" alt=""><h1 class="">Warung Pak Pau</h1></a>
                        <ul class="navbar-nav gap-3">

                            @if (session()->has('cart'))
                                <li class="nav-item"><a href="{{ url('cart') }}">Cart (
                                    @php
                                        $count = count(session('cart'));
                                        echo $count;
                                    @endphp
                                )</a></li>
                            @else
                                <li class="nav-item"><a href="{{ url('cart') }}">Cart</a></li>
                            @endif

                            @if(session()->missing('id_pelanggan'))
                                <li class="nav-item"><a href="{{ url('register') }}">Register</a></li>
                                <li class="nav-item"><a href="{{ url('login') }}">Login</a></li>
                            @endif

                            @if (session()->has('id_pelanggan'))
                                <li class="nav-item">{{ session('id_pelanggan')['email'] }}</li>
                                <li class="nav-item"><a href="{{ url('logout') }}">Logout</a></li>
                            @endif

                        </ul>
                    </div>
                </nav>
            </div>
            <div class="row mt-4">
                <div class="col-2">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{ url('menu') }}">Menu</a></li>
                        @foreach ($kategories as $kategori)
                            <li class="list-group-item"><a href="{{ url('show/'.$kategori->id_kategori) }}">{{$kategori->kategori}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-10">
                    @yield('content')
                </div>
            </div>
            <div class="bg-light mt-5 p-3">
                <p class="text-center">Paul Andry &copy; 2023</p>
            </div>
        </div>

        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    </body>
</html>
