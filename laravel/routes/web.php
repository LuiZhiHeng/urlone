<?php

use Illuminate\Support\Facades\Route;
use App\urlonecs; 

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
    return view('urlone.create');
});

Route::get('{id}', function ($id) {
    //$content = DB::table('urlonecs')->where('link', '=', $id)->value('content');
    return view('urlone.show', compact('id'));
});

Route::get('urlone/indexx', function () {
    $sdurl = urlonecs::all()->toArray();
    return view('urlone.index', compact('sdurl'));
});

Route::resource('urlone','urlonecontrol');
