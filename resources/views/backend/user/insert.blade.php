@extends('backend.back')

@section('admincontent')

<div class="row">
    <div class="col-6">
        <form action="{{ url('/admin/user') }}" method="post" class="">
            @csrf

            <div class="form-group mt-2">
                <label class="form-label" for="name">Level</label>
                <select class="form-select" name="level" id="level">
                    <option value="kasir">Kasir</option>
                    <option value="manager">Manager</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="form-group mt-2">
                <label class="form-label" for="name">Nama</label>
                <input class="form-control" value="{{ old('name') }}" type="text" name="name" id="name">
                <span class="text-danger">
                    @error('name')
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
                <input class="form-control" value="{{ old('name') }}" type="password" name="password" id="password">
                <span class="text-danger">
                    @error('password')
                        {{$message}}
                    @enderror
                </span>
            </div>

            <div class="form-group mt-2">
                <input class="btn btn-success mt-4" type="submit" name="submit" value="Tambah" id="submit">
            </div>
        </form>
    </div>
</div>

@endsection
