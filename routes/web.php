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

// とりあえず追加フォームを表示
Route::get('/', function () {
    return view('book_list');

});

// 本追加
Route::post('/book_add', function(Request $request){
    // バリデーション
    $validator = Validator::make($request->all(),[
        'pro_name' => 'required |min:1 |max:255',
        'pro_name_en' => 'required |min:1 |max:255',
        'pro_price' => 'required |min:1 |max:255',
        'pro_thumbnail' => 'required |min:1 |max:255',
        'pro_genre' => 'required |min:1 |max:255',
        'pro_author' => 'required |min:1 |max:255',
        'pro_original_author' => 'required |min:1 |max:255',
        'pro_release_date' => 'required |min:1 |max:255',
        'pro_publisher' => 'required |min:1 |max:255',
        'pro_label' => 'required |min:1 |max:255',
        'pro_description' => 'required |min:1 |max:255',
        'pro_size' => 'required |min:1 |max:255',
        'pro_weight' => 'required |min:1 |max:255',
        'pro_stock' => 'required |min:1 |max:255',
        'pro_isbn' => 'required |min:1 |max:255',
    ]);

    if ($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $books = new Product;
    $books->pro_name = $request->pro_name;
    $books->pro_name_en = $request->pro_name_en;
    $books->pro_price = $request->pro_price;
    $books->pro_thumbnail = $request->pro_thumbnail;
    $books->pro_genre = $request->pro_genre;
    $books->pro_author = $request->pro_author;
    $books->pro_original_author = $request->pro_original_author;
    $books->pro_release_date = $request->pro_release_date;
    $books->pro_publisher = $request->pro_publisher;
    $books->pro_label = $request->pro_label;
    $books->pro_description = $request->pro_description;
    $books->pro_size = $request->pro_size;
    $books->pro_weight = $request->pro_weight;
    $books->pro_stock = $request->pro_stock;
    $books->pro_isbn = $request->pro_isbn;
    $books->save();
    return redirect('/');

});