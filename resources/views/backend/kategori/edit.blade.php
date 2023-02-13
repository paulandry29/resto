@extends('backend.back')

@section('admincontent')

<div class="row">
    <div class="col-6">
        <form action="{{ url('/admin/kategori/'.$kategori->id_kategori) }}" method="post" class="">
            @csrf
            @method('PUT')

            @if(Session::has('pesan'))

                <div class="alert alert-danger">
                    {{ Session::get('pesan') }}
                </div>

            @endif

            <div class="form-group mt-2">
                <label class="form-label" for="kategori">Kategori</label>
                <input class="form-control" value="{{ $kategori->kategori }}" type="text" name="kategori" id="kategori">
                <span class="text-danger">
                    @error('kategori')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group mt-2">
                <input class="btn btn-success mt-4" type="submit" name="submit" value="Simpan" id="submit">
            </div>
        </form>
    </div>
</div>

@endsection
