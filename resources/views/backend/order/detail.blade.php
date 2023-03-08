@extends('backend.back')

@section('admincontent')

    <div>
        <h1>Order Detail</h1>
    </div>

    <div class="mt-4">
        <h4>Pelanggan: {{ $orders[0]['pelanggan'] }}</h4>
    </div>

    <div class="mt-4">
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Menu</td>
                    <td>Jumlah</td>
                    <td>Harga</td>
                    <td>Sub Total</td>
                </tr>
            </thead>
            @php
                $no=1;
            @endphp
            <tbody>
                @foreach ($orders as $order)

                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$order->menu}}</td>
                    <td>{{$order->jumlah}}</td>
                    <td>Rp. {{number_format($order->hargaJual)}}</td>
                    <td>Rp. {{number_format($order->jumlah * $order->hargaJual)}}</td>
                </tr>

                @endforeach
                <tr>
                    <td colspan="4"><b>Total</b></td>
                    <td><b>Rp. {{ number_format($orders[0]['total']) }}</b></td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
