<?php

use Illuminate\Support\Facades\Route;

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
    return view('landing-page.html');
})->name('welcome');
Route::get('/Politicas', function () {
    return view('landing-page.politics');
})->name('politics');

Route::get('/PDF_format', function () {
    return view('pdf-format');
})->name('pdf');

Route::get('/google25760a53bdc0e851.html', function () {
    return view('google25760a53bdc0e851');
});

Auth::routes();

Route::get('/budget/print-pdf/{id}', [ 'as' => 'budget.printpdf', 'uses' => 'BudgetController@printPDF']);
Route::resource('home','HomeController');
Route::get('/home', 'HomeController@index')->name('home.index');
//CONTROLLER FOR USERS
Route::resource('user','UserController');
Route::get('/costumer', 'UserController@costumer')->name('user.costumer');
Route::get('/settings', 'UserController@settings')->name('user.settings');
Route::get('/delete_user/{id}', 'UserController@delete_user');
Route::get('/delete_account/{id}', 'UserController@delete_account');
Route::get('/select_user/{id}', 'UserController@select_user');
Route::put('update/{id}', 'UserController@update');
Route::put('update_password/', 'UserController@update_password');
Route::any('/search', 'UserController@show');
//CONTROLLER FOR DASHBOARD

//CONTROLLER FOR ORDERS
Route::resource('order','OrderController');
Route::get('/delete_order/{id}', 'OrderController@destroy');
Route::get('/select_order/{id}', 'OrderController@select_order')->name('order.select_order');
Route::get('/accept_order/{id}', 'OrderController@accept_order');
Route::get('/complete_order/{id}', 'OrderController@complete_order');
Route::get('/budget_order/{id}', 'OrderController@budget_order');
Route::post('budget_create/{id}', 'OrderController@budget_create')->name('order.budget_create');
//CONTROLLER FOR ORDERS
Route::resource('noty','NotificationController');
Route::get('/delete_noty/{id}', 'NotificationController@destroy');

//CONTROLLER FOR INVENTORY
Route::resource('inventory','InventoryController');
Route::any('/search_item', 'InventoryController@show');
Route::get('/delete_item_from_intenvory/{id}', 'InventoryController@delete_item_from_intenvory');
Route::get('/delete_item/{id}', 'InventoryController@delete_item');

Route::get('/entries', 'InventoryController@entries_index')->name('entries.index');
Route::get('/departures', 'InventoryController@departures_index')->name('departures.index');
Route::get('/catalogue', 'InventoryController@catalogue_index')->name('catalogue.index');

Route::post('/new_category','InventoryController@new_category')->name('inventory.new_category');
Route::get('/delete_category/{id}', 'InventoryController@delete_category');
Route::put('update_category/{id}', 'InventoryController@update_category');

Route::post('/new_departure','InventoryController@new_departure')->name('inventory.new_departure');
Route::post('/new_item','InventoryController@new_item')->name('inventory.new_item');



//CONTROLLER FOR BUDGET
Route::resource('budget','BudgetController');
Route::get('/delete_budget/{id}', 'BudgetController@destroy')->name('budget.delete');
Route::get('/sendBudgetPDF/{id}', 'BudgetController@sendPDF')->name('budget.sendPDF');