<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Http\Requests\StoreOrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = OrderDetail::join('orders', 'order_details.id_order', '=', 'orders.id_order')
                                ->join('menus', 'order_details.id_menu', '=', 'menus.id_menu')
                                ->join('pelanggans', 'orders.id_pelanggan', '=', 'pelanggans.id_pelanggan')
                                    ->select('order_details.*', 'orders.*', 'menus.*', 'pelanggans.*')
                                    ->paginate(5);
        return view('backend.detail.select', ['details' => $details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tgl_mulai = $request->tgl_mulai;
        $tgl_akhir = $request->tgl_akhir;

        $details = OrderDetail::join('orders', 'order_details.id_order', '=', 'orders.id_order')
                                ->join('menus', 'order_details.id_menu', '=', 'menus.id_menu')
                                ->join('pelanggans', 'orders.id_pelanggan', '=', 'pelanggans.id_pelanggan')
                                    ->whereBetween('orders.tglOrder', [$tgl_mulai, $tgl_akhir]) 
                                    ->select('order_details.*', 'orders.*', 'menus.*', 'pelanggans.*')
                                    ->paginate(5);

        return view('backend.detail.select', ['details' => $details]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderDetailRequest  $request
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderDetailRequest $request, OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetail $orderDetail)
    {
        //
    }
}
