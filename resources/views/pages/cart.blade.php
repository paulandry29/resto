@extends('layout.front')

@section('content')

    @if (session('cart'))
        <div>
            @php
                $no=1;
                $total=0;
            @endphp
            <a href="{{ url('batal') }}" class="btn btn-danger mb-3">Batal</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (session('cart') as $id_menu=>$menu)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $menu['menu'] }}</td>
                            <td>{{ $menu['harga'] }}</td>
                            <td>
                                <span><a href="{{ url('tambah/'.$menu['id_menu']) }}">[+]</a></span>
                                {{ $menu['jumlah'] }}
                                <span><a href="{{ url('kurang/'.$menu['id_menu']) }}">[-]</a></span>
                            </td>
                            <td>{{ $menu['jumlah'] * $menu['harga'] }}</td>
                            <td><a href="{{ url('hapuscart/'.$menu['id_menu']) }}">Hapus</a></td>
                        </tr>

                        @php
                            $total += ($menu['jumlah']*$menu['harga']);
                        @endphp
                    @endforeach
                    <tr>
                        <td colspan="4">Total Pembayaran</td>
                        <td colspan="2">{{$total}}</td>
                    </tr>
                </tbody>
            </table>
            <div>
                <a href="{{ url('checkout')}}" class="btn btn-success mt-3">Checkout</a>
            </div>
        </div>

    @else

        <script>
            window.location.href="/";
        </script>

    @endif

@endsection
