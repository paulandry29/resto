@extends('backend.back')

@section('admincontent')

<div>
    <h1>Edit Data</h1>
</div>
<div class="row">
    <div class="col-6">
        <form action="{{ url('/admin/menu'.$menu->id_menu) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mt-2">
                <label class="form-label" for="kategori">Kategori</label>
                <select name="kategori" class="form-select">
                    @foreach ($kategoris as $kategori)
                        <option @selected($kategori->id_kategori) value="{{ $kategori->id_kategori }}">{{ $kategori->kategori }}</option>
                    @endforeach
                </select>
                <span class="text-danger">
                    @error('kategori')
                        {{$message}}
                    @enderror
                </span>
            </div>

            <div class="form-group mt-3">
                <label class="form-label" for="menu">Menu</label>
                <input class="form-control" type="Text" value="{{ $menu->menu }}" name="menu" id="menu">
                <span class="text-danger">
                    @error('menu')
                        {{$message}}
                    @enderror
                </span>
            </div>

            <div class="form-group mt-3">
                <label class="form-label" for="deskripsi">Deskripsi</label>
                <input class="form-control" type="Text" value="{{ $menu->deskripsi }}" name="deskripsi" id="deskripsi">
                <span class="text-danger">
                    @error('deskripsi')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="form-group mt-3">
                <label class="form-label" for="harga">Harga</label>
                <input class="form-control" type="text" value="{{ $menu->harga }}" name="harga" id="harga">
                <span class="text-danger">
                    @error('harga')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="form-group mt-3">
                <label class="form-label" for="gambar">Gambar</label>
                <input class="form-control" type="file" value="{{ $menu->gambar }}" name="gambar" id="gambar">
                <span class="text-danger">
                    @error('gambar')
                        {{$message}}
                    @enderror
                </span>
            </div>

            <div class="form-group mt-2">
                <input class="btn btn-success mt-4" type="submit" name="submit" value="Submit" id="submit">
            </div>
        </form>
    </div>
</div>

@endsection
