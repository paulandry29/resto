@extends('backend.back')

@section('admincontent')

    <div>
        <h1>Detail</h1>
    </div>

    <div>
        <form action="{{ url('/admin/orderdetail/create') }}" method="get" class="">

            <div class="row">

                <div class="form-group mt-2 col-4">
                    <label class="form-label" for="tgl_mulai">Tanggal Mulai</label>
                    <input class="form-control"type="date" name="tgl_mulai">
                </div>

                <div class="form-group mt-2 col-4">
                    <label class="form-label" for="tgl_akhir">Tanggal Akhir</label>
                    <input class="form-control" type="date" name="tgl_akhir">
                </div>

                <div class="form-group mt-3 col-4">
                    <button class="btn btn-success mt-4" type="submit">Cari</button>
                </div>

            </div>

        </form>
    </div>

    <div class="mt-4">
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Tanggal</td>
                    <td>Pelanggan</td>
                    <td>Menu</td>
                    <td>Harga</td>
                    <td>Jumlah</td>
                    <td>Total</td>
                </tr>
            </thead>
            @php
                $no=1;
            @endphp
            <tbody>
                @foreach ($details as $detail)

                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$detail->tglOrder}}</td>
                    <td>{{$detail->pelanggan}}</td>
                    <td>{{$detail->menu}}</td>
                    <td>{{$detail->hargaJual}}</td>
                    <td>{{$detail->jumlah}}</td>
                    <td>{{$detail->total}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-5">
            {{$details->WithQueryString()->links()}}
        </div>
    </div>

@endsection
