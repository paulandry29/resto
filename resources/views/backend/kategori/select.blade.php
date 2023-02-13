@extends('backend.back')

@section('admincontent')

    <div>
        <h1>Kategori</h1>
    </div>

    <div>
        <a href="{{ url('admin/kategori/create') }}" class="btn btn-primary">Tambah</a>
    </div>

    <div class="mt-4">
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Kategori</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            @php
                $no=1;
            @endphp
            <tbody>
                @foreach ($kategories as $kategori)

                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$kategori->kategori}}</td>
                    <td>
                        <a href="{{ url('admin/kategori/'.$kategori->id_kategori.'/edit') }}" class="btn btn-success">Edit</a>
                        <a href="{{ url('admin/kategori/'.$kategori->id_kategori) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

@endsection
