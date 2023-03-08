@extends('backend.back')

@section('admincontent')

    <div>
        <h1>Order</h1>
    </div>

    <div class="mt-4">
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Pelanggan</td>
                    <td>Tanggal</td>
                    <td>Total</td>
                    <td>Bayar</td>
                    <td>Kembali</td>
                    <td>Status</td>
                </tr>
            </thead>
            @php
                $no=1;
            @endphp
            <tbody>
                @foreach ($orders as $order)

                <tr>
                    <td>{{$no++}}</td>
                    <td><a href="{{ url('admin/kasir/'.$order->id_order.'/edit') }}">{{$order->pelanggan}}</a></td>
                    <td>{{$order->tglOrder}}</td>
                    <td>Rp. {{number_format($order->total)}}</td>
                    <td>Rp. {{number_format($order->bayar)}}</td>
                    <td>Rp. {{number_format($order->kembali)}}</td>
                    @php
                        $status = "LUNAS";
                        if ($order->status == 0) {
                            $status = '<a href=" '.url('admin/kasir/'.$order->id_order).' ">BAYAR</a>';
                        }
                    @endphp
                    <td>{!! $status !!}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-5">
            {{$orders->WithQueryString()->links()}}
        </div>
    </div>

@endsection
