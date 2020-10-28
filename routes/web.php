<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'expense'], function(){
    
    // Route for showing the expense form
    Route::get('/add', 'ExpenseController@addExpenseForm')->name('addExpenseForm');

    // Route for viewing the expense
    Route::get('/view', 'ExpenseController@viewExpense')->name('expense.view');

    // Route for displaying the updating expense form
    Route::get('/{id}/update', 'ExpenseController@updateExpenseForm')->name('expense.update');

    //Route for deleting an expense
    Route::get('/{id}/delete','ExpenseController@deleteExpense')->name('expense.delete');

    // Route for adding the expense
    Route::post('/add', 'ExpenseController@addExpense')->name('expense.add');

    //Route for updating the expense
    Route::post('/{id}/update', 'ExpenseController@updateExpense')->name('expense.update');


});
