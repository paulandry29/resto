@extends('backend.back')

@section('admincontent')

<div class="row">
    <div>
        <h2>Rp. {{number_format($order->total)}}</h2>
    </div>
    <div class="col-6">
        <form action="{{ url('/admin/order/'.$order->id_order) }}" method="post" class="">
            @csrf
            @method('PUT')

            <div class="form-group mt-2">
                <label class="form-label" for="total">Total</label>
                <input class="form-control" min="{{ $order->total }}" value="{{ $order->total }}" type="number" name="bayar" id="bayar">
                <span class="text-danger">
                    @error('bayar')
                        {{$message}}
                    @enderror
                </span>
            </div>
            <div class="form-group mt-2">
                <input class="btn btn-success mt-4" type="submit" name="submit" value="BAYAR" id="submit">
            </div>
        </form>
    </div>
</div>

@endsection
