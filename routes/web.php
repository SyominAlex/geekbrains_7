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
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

Route::get('/', function () {
    return view('welcome');
});

//for admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
  Route::resource('/categories', AdminCategoryController::class);
  Route::resource('/news', AdminNewsController::class);
});

Route::get('/news', [NewsController::class, 'index'])
	->name('news');
Route::get('/news/show/{id}', [NewsController::class, 'show'])
	->where('id', '\d+')
	->name('news.show');


Route::get('/collections', function() {
	$collect = collect([
		'string',
		'age',
		'name',
		4
	]);

	dd($collect->last(function($last) {
		 if(is_numeric($last)) {
		 	 dd($last * 2);
		 }

		 return $last;
	}));
});