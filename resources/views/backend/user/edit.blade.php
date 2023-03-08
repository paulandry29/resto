@extends('backend.back')

@section('admincontent')

<div>
    <h1>Edit Data</h1>
</div>
<div class="row">
    <div class="col-6">
        <form action="{{ url('/admin/user/'.$users->id) }}" method="post" >
            @csrf
            @method('PUT')

            <div class="form-group mt-3">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password">
                <span class="text-danger">
                    @error('password')
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
