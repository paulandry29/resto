<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::all();
        $menus = Menu::join('kategoris', 'menus.id_kategori', '=', 'kategoris.id_kategori')->select(['menus.*', 'kategoris.*'])->paginate(5);
        return view('backend.menu.select', [
            'menus' => $menus,
            'kategories' => $kategoris
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategories = Kategori::all();
        return view('backend.menu.insert', [
            'kategories' => $kategories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'gambar' => 'required|max:2048',
            'menu' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);

        $id = $request->kategori;

        $namaGambar = $request->file('gambar')->getClientOriginalName();

        $request->gambar->move(public_path('gambar'), $namaGambar);

        Menu::create([
            'id_kategori' => $id,
            'menu' => $data['menu'],
            'deskripsi' => $data['deskripsi'],
            'harga' => $data['harga'],
            'gambar' => $namaGambar,
        ]);

        return redirect('admin/menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($id_menu)
    {
        Menu::where('id_menu', '=', $id_menu)->delete();

        return redirect('admin/menu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id_menu)
    {
        $kategoris = Kategori::all();
        $menu = Menu::where('id_menu', $id_menu)->first();
        return view('backend.menu.edit', [
            'menu' => $menu,
            'kategoris' => $kategoris,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }

    public function select(Request $request)
    {
        $id = $request->kategori;

        $kategoris = Kategori::all();
        $menus = Menu::join('kategoris', 'menus.id_kategori', '=', 'kategoris.id_kategori')
                            ->select(['menus.*', 'kategoris.*'])
                            ->where('menus.id_kategori', '=', $id)
                            ->paginate(3);
        return view('backend.menu.select', [
            'menus' => $menus,
            'kategories' => $kategoris
        ]);
    }
}
