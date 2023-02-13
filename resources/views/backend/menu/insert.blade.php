@extends('backend.back')

@section('admincontent')

<div>
    <h1>Insert Data</h1>
</div>
<div class="row">
    <div class="col-6">
        <form action="{{ url('/admin/menu') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group mt-2">
                <label class="form-label" for="kategori">Kategori</label>
                <select name="kategori" class="form-select">
                    @foreach ($kategories as $kategori)
                        <option value="{{ $kategori->id_kategori }}">{{ $kategori->kategori }}</option>
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
                <input class="form-control" type="Text" name="menu" id="menu">
                <span class="text-danger">
                    @error('menu')
                        {{$message}}
                    @enderror
                </span>
            </div>

            <div class="form-group mt-3">
                <label class="form-label" for="deskripsi">Deskripsi</label>
                <input class="form-control" type="Text" name="deskripsi" id="deskripsi">
                <span class="text-danger">
                    @error('deskripsi')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="form-group mt-3">
                <label class="form-label" for="harga">Harga</label>
                <input class="form-control" type="text" name="harga" id="harga">
                <span class="text-danger">
                    @error('harga')
                    {{$message}}
                    @enderror
                </span>
            </div>

            <div class="form-group mt-3">
                <label class="form-label" for="gambar">Gambar</label>
                <input class="form-control" type="file" name="gambar" id="gambar">
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
