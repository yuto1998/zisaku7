<?php
use App\Http\controllers\ResourceController;
use App\Http\controllers\DisplayController;
use App\Http\controllers\RegistrationController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::post('/search/{id}','MainController@search')->name('search');
Route::post('/pay/{id}','PurchaseController@pay')->name('pay');
Route::post('/cart_item/{id}','CartController@cart_item')->name('cart_item');
Route::post('/pay/{id}','PurchaseController@pay')->name('pay');
Route::get('/reviwList','ReviwController@reviwList')->name('reviwList');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/amount/{id}','MainController@amount')->name('amount');
Route::post('ajaxlike', 'MainController@ajaxlike');
// Route::resource('passwordform','passwordformController');

Route::resource('resource','ResourceController');
Route::group(['middleware' => ['auth', 'can:admin_only']], function () {
    Route::get('account', 'HomeController@index')->name('account.index');
    Route::resource('productlist','ProductlistController');
    Route::resource('userlist','UserlistController');
    Route::resource('product','ProductController');
    Route::resource('editproduct','EditproductController');
    Route::resource('main','MainController');
    Route::get('delete/{id}','ProductlistController@delete')->name('delete');
});
Route::group(['middleware' => ['auth', 'can:user_only']], function () {
    Route::get('account', 'AccountController@index')->name('account.index');
    Route::resource('cart','CartController');
    Route::resource('purchase','PurchaseController');
    Route::resource('userinformation','UserinformationController');
    Route::resource('product','ProductController');
    Route::resource('main','MainController');
    Route::resource('cart','CartController');
    Route::resource('purchase','PurchaseController');
    Route::resource('history','HistoryController');
    Route::resource('nice','NiceController');
    Route::resource('reviw','ReviwController');
});




// Route::get('/',[DisplayController::class,'index']);
// Route::get('/',[RegistrationController::class,'index']);
// Route::get('/',[ResourceController::class,'index']);