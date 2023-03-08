@extends('backend.back')

@section('admincontent')

    <div>
        <h1>Users</h1>
    </div>

    <div>
        <a href="{{ url('admin/user/create') }}" class="btn btn-primary">Tambah</a>
    </div>

    <div class="mt-2">
        @if(session()->has('pesan'))

            <p class="alert alert-danger">{{ session()->get('pesan') }}</p>

        @endif
    </div>

    <div class="mt-4">
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Level</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            @php
                $no=1;
            @endphp
            <tbody>
                @foreach ($users as $user)

                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->level}}</td>
                    <td>
                        <a href="{{ url('admin/user/'.$user->id.'/edit') }}" class="btn btn-success">Edit</a>
                        <a href="{{ url('admin/user/'.$user->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

@endsection
