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

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/index/{company}', function ($company) {
	return redirect()->route('chart', ['company' => $company]);
})->name('index');

Route::get("/chart/{company}", 'ArticleController@chart')->name('chart');

Route::get("/articles/{company}/{label?}", 'ArticleController@articles')->name('articles');

Route::get("/priceprediction/{company}", function ($company) {
	return view('price-prediction', ['company' => $company]);
})->name('priceprediction');

Route::get("/wordscloud/{company}/{label}", function ($company, $label = 'positive') {
	return view('wordscloud', ['company' => $company, 'label' => $label]);
})->name('wordscloud');