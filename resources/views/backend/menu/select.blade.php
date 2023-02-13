@extends('backend.back')

@section('admincontent')

    <div>
        <h1>Menu</h1>
    </div>

    <div>
        <a href="{{ url('admin/menu/create') }}" class="btn btn-primary">Tambah</a>
    </div>

    <div class="row mt-5">
        <div class="col-6 mb-2">
            <form action="{{ url('/admin/select/') }}" method="get" class="">
                <div class="form-group mt-2">
                    <select name="kategori" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategories as $kategori)
                            <option value="{{ $kategori->id_kategori }}">{{ $kategori->kategori }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-4">
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Kategori</td>
                    <td>Menu</td>
                    <td>Deskripsi</td>
                    <td>gambar</td>
                    <td>Harga</td>
                    <td width="15%">Aksi</td>
                </tr>
            </thead>
            @php
                $no=1;
            @endphp
            <tbody>
                @foreach ($menus as $menu)

                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$menu->kategori}}</td>
                    <td>{{$menu->menu}}</td>
                    <td>{{$menu->deskripsi}}</td>
                    <td><img src="{{ asset('gambar/'.$menu->gambar) }}" width="100px" alt=""></td>
                    <td>{{$menu->harga}}</td>
                    <td>
                        <a href="{{ url('admin/menu/'.$menu->id_menu.'/edit') }}" class="btn btn-success">Edit</a>
                        <a href="{{ url('admin/menu/'.$menu->id_menu) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-5">
            {{$menus->WithQueryString()->links()}}
        </div>
    </div>

@endsection
