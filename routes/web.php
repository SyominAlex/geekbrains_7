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
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\FakeNewsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
Route::get('/logout', function() {
	\Auth::logout();
	return redirect()->route('login');
})->name('logout');
//for account
Route::get('/account', AccountController::class)
	   ->name('account');
//for admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function() {
  Route::resource('/categories', AdminCategoryController::class);
  Route::resource('/news', AdminNewsController::class);
});
});

//all
Route::get('/news', [NewsController::class, 'index'])
	->name('news');
Route::get('/news/show/{id}', [NewsController::class, 'show'])
	->where('id', '\d+')
	->name('news.show');


//guest

Route::get('/news/{news}', FakeNewsController::class);
Auth::routes();


