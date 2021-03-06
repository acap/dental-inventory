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

//use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', 'DashboardController@dashboard');

Route::get('/orders/list', 'OrderController@list');
Route::get('/orders/add', 'OrderController@add');
Route::post('/orders/post_add', 'OrderController@post_add');
Route::get('/orders/edit/{orderNo}', 'OrderController@edit');
Route::post('/orders/post_edit', 'OrderController@post_edit');
Route::get('/orders/detail/{orderNo}', 'OrderController@detail');
Route::get('/orders/print/{orderNo}', 'OrderController@print');
Route::post('/orders/post_add_item/{orderNo}', 'OrderController@post_add_item');
Route::get('/orders/complete/{orderNo}', 'OrderController@complete');
Route::get('/orders/download', 'OrderController@download');

Route::get('/stocks/list', 'StockController@list');
Route::get('/stocks/add', 'StockController@add');
Route::post('/stocks/post_add', 'StockController@post_add');
Route::get('/stocks/download', 'StockController@download');
Route::get('/stocks/download_moq', 'StockController@download_moq');

Route::get('/stockCodes/list', 'StockCodeController@list');
Route::get('/stockCodes/add', 'StockCodeController@add');
Route::post('/stockCodes/post_add', 'StockCodeController@post_add');
Route::get('/stockCodes/edit/{code}', 'StockCodeController@edit');
Route::post('/stockCodes/post_edit', 'StockCodeController@post_edit');

Route::get('/clients/add','ClientController@add');
Route::post('/clients/post_add', 'ClientController@post_add');
Route::get('/clients/list', 'ClientController@list');
Route::get('/clients/detail/{ic_no}', 'ClientController@detail');
Route::get('/clients/download', 'ClientController@download');

Route::get('/calendars/calendar', 'CalendarController@calendar');

Route::get('/ownerConfigurations/add', 'ConfigurationController@add');
Route::post('/ownerConfigurations/post_add', 'ConfigurationController@post_add');
Route::get('/ownerConfigurations/detail', 'ConfigurationController@detail');
Route::get('/ownerConfigurations/edit', 'ConfigurationController@edit');
Route::post('/ownerConfigurations/post_edit', 'ConfigurationController@post_edit');

Route::get('/vendors/add','VendorController@add');
Route::post('/vendors/post_add','VendorController@post_add');
Route::get('/vendors/list','VendorController@list');
Route::get('/vendors/detail/{id}','VendorController@detail');
Route::get('/vendors/edit/{id}','VendorController@edit');
Route::post('/vendors/post_edit','VendorController@post_edit');


Route::get('/deliveries/list','DeliveryController@list');
Route::get('/deliveries/add','DeliveryController@add');
Route::post('/deliveries/post_add','DeliveryController@post_add');
Route::get('/deliveries/detail{id}','DeliveryController@detail');







Route::get('/login', function (){
    return view('login');

});


Route::post('/auth/login', 'LoginController@login');

Route :: get('/auth/registration', function (){
   return view('auth.registration');
});



