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

use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    $user = User::find(10);
    return view('mail.reg_info')->with(['user' => $user]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
