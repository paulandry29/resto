<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title' => 'Welcome to Warung Pak Pau',
            'description' => 'Menyediakan makanan dan minuman yang nggak logis',
            'author' => 'admin'
        );

        $kategories = Kategori::all();

        return view('pages.index')
            ->with($data)
            ->with('kategories', $kategories);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'pelanggan'=>'required',
            'alamat'=>'required',
            'telp'=>'required',
            'jenisKelamin'=>'required',
            'email'=>'required | email | unique:pelanggans',
            'password'=>'required | min:3',
        ]);

        Pelanggan::create([
            'pelanggan'=>$data['pelanggan'],
            'alamat'=>$data['alamat'],
            'jenisKelamin'=>$data['jenisKelamin'],
            'telp'=>$data['telp'],
            'email'=>$data['email'],
            'password'=> Hash::make($data['password']),
        ]);

        return redirect('/menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategories = Kategori::all();
        $menus = Menu::where('id_kategori', $id)->paginate(4);
        return view('pages.kategori', [
            'kategories'=>$kategories,
            'menus'=>$menus
        ]);
    }

    public function menu()
    {
        $kategories = Kategori::all();
        $menus = Menu::paginate(4);

        return view('pages.menu', ['menus'=>$menus])->with('kategories', $kategories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function register()
    {
        $kategories = Kategori::all();

        return view('pages.register', [
            'kategories'=>$kategories,
        ]);
    }

    public function login()
    {
        $kategories = Kategori::all();
        return view('pages.login', [
            'kategories'=>$kategories,
        ]);
    }

    public function postlogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required | email ',
            'password' => 'required | min:3',
        ]);

        $pelanggan = Pelanggan::where('email',$data)->first();

        if ($pelanggan) {
            if (Hash::check($data['password'], $pelanggan['password'])) {
                $data = [
                    'id_pelanggan'=> $pelanggan['id_pelanggan'],
                    'email'=> $pelanggan['email'],
                ];
                $request->session()->put('id_pelanggan', $data);

                return redirect('/menu');

            }else {
                return back()->with('pesan', 'Password Salah!');
            }
        }else{
            return back()->with('pesan', 'Email belum terdaftar!');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/menu');
    }
}
