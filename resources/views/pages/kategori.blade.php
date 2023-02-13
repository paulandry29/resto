@extends('layout.front')

@section('content')
<div class="row">
    @foreach ($menus as $menu)
        <div class="card mx-2 mb-3" style="width: 15rem;">
            <img src="{{ asset('gambar/'.$menu->gambar) }}" class="card-img-top" alt="{{$menu->menu}}">
            <div class="card-body">
                <h5 class="card-title">{{$menu->menu}}</h5>
                <p class="card-text">{{$menu->deskripsi}}</p>

            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><h5 class="card-title">Rp. {{$menu->harga}}</h5></li>
              </ul>
            <div class="card-footer bg-white">
                <a href="{{ url('beli/'.$menu->id_menu) }}" class="btn btn-primary">Beli</a>
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-center mt-5">
        {{$menus->links()}}
    </div>
</div>
@endsection
