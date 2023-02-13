@extends('layout.front')

@section('content')

<div class="row">
    <div class="col-6">
        <form action="{{ url('/postregister') }}" method="post" class="">
            @csrf
            <div class="form-group mt-2">
                <label class="form-label" for="pelanggan">Pelanggan</label>
                <input class="form-control" value="{{ old('pelanggan') }}" type="text" name="pelanggan" id="pelanggan">
                <span class="text-danger">
                    @error('pelanggan')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group mt-2">
                <label class="form-label" for="alamat">Alamat</label>
                <input class="form-control" value="{{ old('alamat') }}" type="text" name="alamat" id="alamat">
                <span class="text-danger">
                    @error('alamat')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group mt-2">
                <label class="form-label" for="telp">Telepon</label>
                <input class="form-control" value="{{ old('telp') }}" type="text" name="telp" id="telp">
                <span class="text-danger">
                    @error('telp')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group mt-2">
                <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control"  value="{{ old('jenisKelamin') }}" name="jenisKelamin" id="jenisKelamin">
                    <option value=""></option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <span class="text-danger">
                    @error('jenisKelamin')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group mt-2">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" value="{{ old('email') }}" type="email" name="email" id="email">
                <span class="text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group mt-2">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" value="{{ old('password') }}" type="password" name="password" id="password">
                <span class="text-danger">
                    @error('password')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group mt-2">
                <input class="btn btn-success mt-4" type="submit" name="submit" value="Register" id="submit">
            </div>
        </form>
    </div>
</div>

@endsection
