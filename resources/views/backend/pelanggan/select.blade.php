@extends('backend.back')

@section('admincontent')

    <div>
        <h1>Pelanggan</h1>
    </div>

    <div>
    </div>

    <div class="mt-4">
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Pelanggan</td>
                    <td>Alamat</td>
                    <td>Email</td>
                    <td>Nomor Telepon</td>
                    <td>Jenis Kelamin</td>
                    <td>Status</td>
                </tr>
            </thead>
            @php
                $no=1;
            @endphp
            <tbody>
                @foreach ($pelanggans as $pelanggan)

                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$pelanggan->pelanggan}}</td>
                    <td>{{$pelanggan->alamat}}</td>
                    <td>{{$pelanggan->email}}</td>
                    <td>{{$pelanggan->telp}}</td>
                    @php
                        $jenis_kelamin = "Laki-Laki";
                        if ($pelanggan->jenisKelamin == "P") {
                            $jenis_kelamin = "Perempuan";
                        }

                        if ($pelanggan->aktif == 0) {
                            $aktif = '<a href=" '.url('admin/pelanggan/'.$pelanggan->id_pelanggan).' ">Banned</a>';
                        }else {
                            $aktif = '<a href=" '.url('admin/pelanggan/'.$pelanggan->id_pelanggan).' ">Aktif</a>';
                        }
                    @endphp
                    <td>{!! $jenis_kelamin !!}</td>
                    <td>{!! $aktif !!}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-5">
            {{$pelanggans->WithQueryString()->links()}}
        </div>
    </div>

@endsection
