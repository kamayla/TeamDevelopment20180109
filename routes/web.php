<?php
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
use App\Product;
use Illuminate\Http\Request;

// 登録一覧を表示
Route::get('/', 'ProductsController@top_view');

// 本登録フォームを表示
Route::get('/pro_add', 'ProductsController@add_view');

// 本追加
Route::post('/pro_add_done', 'ProductsController@add_done');