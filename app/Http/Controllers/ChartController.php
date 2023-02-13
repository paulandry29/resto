<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function beli($idmenu)
    {

        if (session()->missing('id_pelanggan')) {
            return redirect('login');
        }

        $menu = Menu::where('id_menu', $idmenu)->first();

        $cart = session()->get('cart', []);

        if (isset($cart[$idmenu])) {
            $cart[$idmenu]['jumlah']++;
        }else {
            $cart[$idmenu] = [
                'id_menu' => $menu->id_menu,
                'menu' => $menu->menu,
                'harga' => $menu->harga,
                'jumlah' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect('/cart');
    }

    public function cart()
    {
        $kategories = Kategori::all();

        return view('pages.cart', [
            'kategories'=>$kategories
        ]);
    }

    public function hapus($idmenu)
    {
        $cart = session()->get('cart');
        if (isset($cart[$idmenu])) {
            unset($cart[$idmenu]);
            session()->put('cart', $cart);
        }

        return redirect('/cart');
    }

    public function batal()
    {
        session()->forget('cart');
        return redirect('/menu');
    }

    public function tambah($idmenu)
    {
        $cart = session()->get('cart');
        $cart[$idmenu]['jumlah']++;
        session()->put('cart', $cart);

        return redirect('/cart');
    }

    public function kurang($idmenu)
    {
        $cart = session()->get('cart');
        if ($cart[$idmenu]['jumlah'] > 1) {

            $cart[$idmenu]['jumlah']--;
            session()->put('cart', $cart);
        }else {
            unset($cart[$idmenu]);
            session()->put('cart', $cart);
        }

        return redirect('/cart');
    }

    public function checkout()
    {
        $idorder = date('YmdHms');
        $total=0;

        foreach (session('cart') as $key => $value) {
            $data = [
                'id_order' => $idorder,
                'id_menu' => $value['id_menu'],
                'jumlah' => $value['jumlah'],
                'hargaJual' => $value['harga'],
            ];

            $total += ($value['jumlah']*$value['harga']);
            OrderDetail::create($data);
        }

        $tanggal = date('Y-m-d');
        $data = [
            'id_order' => $idorder,
            'id_pelanggan' => session('id_pelanggan')['id_pelanggan'],
            'tglOrder' => $tanggal,
            'total' => $total,
            'bayar' => 0,
            'kembali' => 0,
        ];

        Order::create($data);

        return redirect('logout');
    }
}
