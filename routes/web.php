<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Models\Kategori;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/users/{id}/{name}/', function($id, $name){
    return 'This is user '.$name.' with id '.$id;
});

Route::get('/index', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/services', [PagesController::class, 'services']);
Route::get('/', [FrontController::class, 'index']);
Route::get('show/{id}', [FrontController::class, 'show']);

Route::get('register', [FrontController::class, 'register']);
Route::post('postregister', [FrontController::class, 'store']);

Route::get('login', [FrontController::class, 'login']);
Route::post('postlogin', [FrontController::class, 'postlogin']);

Route::get('logout', [FrontController::class, 'logout']);


//Menu
Route::get('menu', [FrontController::class, 'menu']);


//Chart
Route::get('beli/{idmenu}', [ChartController::class, 'beli']);
Route::get('cart', [ChartController::class, 'cart']);
Route::get('hapuscart/{idmenu}', [ChartController::class, 'hapus']);
Route::get('batal', [ChartController::class, 'batal']);
Route::get('tambah/{idmenu}', [ChartController::class, 'tambah']);
Route::get('kurang/{idmenu}', [ChartController::class, 'kurang']);

Route::get('checkout', [ChartController::class, 'checkout']);

//admin
Route::get('admin', [AuthController::class, 'index']);
Route::post('admin/postlogin', [AuthController::class, 'postlogin']);
Route::get('admin/logout', [AuthController::class, 'logout']);

Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function(){

    Route::group(['middleware' => ['CekLogin:admin']], function(){
        Route::resource('user', UserController::class);
    });

    Route::group(['middleware' => ['CekLogin:kasir']], function(){
        Route::resource('order', OrderController::class);
    });

    Route::group(['middleware' => ['CekLogin:manager']], function(){
        Route::resource('kategori', KategoriController::class);
        Route::resource('menu', MenuController::class);
        Route::get('select', [MenuController::class, 'select']);
    });

});
