<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\Request;
use Illuminate\Http\Request as HttpRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::join('pelanggans', 'orders.id_pelanggan', '=', 'pelanggans.id_pelanggan')
                            ->select(['orders.*', 'pelanggans.*'])
                            ->orderBy('status', 'ASC')
                            ->paginate(10);
        return view('backend.order.select', ['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id_order)
    {
        $order = Order::where('id_order', $id_order)->first();

        return view('Backend.order.edit', ['order'=>$order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id_order)
    {
        $orders = Order::join('order_details', 'orders.id_order', '=', 'order_details.id_order')
                        ->join('menus', 'order_details.id_menu', '=', 'menus.id_menu')
                        ->join('pelanggans', 'orders.id_pelanggan', '=', 'pelanggans.id_pelanggan')
                            ->where('orders.id_order', $id_order)
                            ->get(['orders.*', 'order_details.*', 'menus.*', 'pelanggans.*']);

        return view('backend.order.detail', ['orders'=>$orders]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(HttpRequest $request, $id_order)
    {
        $data = $request->validate([
            'bayar' => 'required',
        ]);

        $order = Order::where('id_order', $id_order)->first();
        $kembali = $data['bayar']-$order->total;

        Order::where('id_order', $id_order)
                    ->update([
                        'bayar' => $data['bayar'],
                        'kembali' => $kembali,
                        'status' => 1,
                    ]);

        return redirect('admin/order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
