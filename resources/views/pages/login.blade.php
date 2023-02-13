@extends('layout.front')

@section('content')

<div class="row">
    <div class="col-6">
        <form action="{{ url('/postlogin') }}" method="post" class="">
            @csrf

            @if(Session::has('pesan'))

                <div class="alert alert-danger">
                    {{ Session::get('pesan') }}
                </div>

            @endif

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
                <input class="btn btn-success mt-4" type="submit" name="submit" value="Login" id="submit">
            </div>
        </form>
    </div>
</div>

@endsection
