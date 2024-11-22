<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

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

Route::get('/dashboard', function () {
    return view('back.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// frontend pages
Route::get('/', 'PageController@index')->name('home');
Route::get('/posts', 'PageController@posts')->name('posts');
Route::get('/company/{company}', 'CompanyController@show')->name('company.show');   
Route::get('/companies', [CompanyController::class, 'listing'])->name('company.listing');
Route::get('/posts/{post:slug}', 'PageController@showPost')->name('posts.view');
Route::get('/category/{category}', 'PageController@showCategory')->name('categories.view');

// admin pages
Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function () {
    Route::resource('posts','PostController');
    Route::resource('categories','CategoryController')->except('show');
    Route::resource('authors','AuthorController');
    Route::resource('companies','CompanyController');
    Route::get('company/{company}/{image}', 'CompanyController@removeImage')->name('company.remove-img');
});



Route::get('admin', 'Admin\AdminController@index')->name('admin');
Route::resource('admin/roles', 'Admin\RolesController');
Route::resource('admin/permissions', 'Admin\PermissionsController');
Route::resource('admin/users', 'Admin\UsersController');
Route::resource('admin/pages', 'Admin\PagesController');
Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')
    ->only(['index', 'show', 'destroy']);
Route::resource('admin/settings', 'Admin\SettingsController');
Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);

Route::get('/test', function () {
    return 'Test route is working';
});

