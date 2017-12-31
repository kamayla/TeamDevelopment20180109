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

/**
 * 管理者側のルート定義
 */

// 登録一覧を表示
Route::get('/', 'ProductsController@top_view');

// 本登録フォームを表示
Route::get('/pro_add', 'ProductsController@add_view');

// 本追加
Route::post('/pro_add_done', 'ProductsController@add_done');

// 本削除
Route::post('/pro_delete_done/{product}', 'ProductsController@delete_done');

// 更新画面表示
Route::post('/pro_edit/{product}', 'ProductsController@edit_view');

// 本更新処理
Route::post('/pro_edit_done', 'ProductsController@edit_done');

/**
 * ユーザー側のルート定義
 */

// ショップトップページの表示
Route::get('/booquet', 'ShopController@top_view');
// 商品個別ページの表示
Route::get('/shop_item_page/{product}', 'shopController@shop_item_page_view');
// 検索結果の表示
Route::post('/shop_result_page', 'shopController@shop_result_page_view');
// カートに入れる処理
Route::post('/shop_cart_in/{product}', 'shopController@shop_cart_in');
// カートの表示
Route::get('/shop_cart_look','shopController@shop_cart_look');