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

Route::post('/cart_item/{id}','CartController@cart_item')->name('cart_item');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('passwordform','passwordformController');
Route::resource('password','passwordController');
Route::resource('resource','ResourceController');
Route::resource('productlist','ProductlistController');
Route::resource('userlist','UserlistController');
Route::resource('userinformation','UserinformationController');
Route::resource('product','ProductController');
Route::resource('main','MainController');
Route::resource('cart','CartController');
Route::resource('purchase','PurchaseController');
Route::resource('history','HistoryController');
Route::resource('nice','NiceController');
Route::resource('editproduct','EditproductController');





// Route::get('/',[DisplayController::class,'index']);
// Route::get('/',[RegistrationController::class,'index']);
// Route::get('/',[ResourceController::class,'index']);