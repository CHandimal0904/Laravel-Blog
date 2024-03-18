<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\post_Controller;
use App\Http\Controllers\welcomeController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [welcomeController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post_id}/show', [post_Controller::class, 'show'] )->name('post.show');

Route::group(['middleware' => 'auth'], function(){
Route::post('/Post/store', [post_Controller::class, 'store'])->name('Post.store');  
Route::get('post/all',[HomeController::class, 'allpost'])->name('post.all');
Route::get('post/{post_id}/edit',[post_Controller::class, 'edit'])->name('post.edit');
Route::post('post/{post_id}/update',[post_Controller::class, 'update'])->name('post.update');
Route::get('post/{post_id}/delete',[post_Controller::class, 'delete'])->name('post.delete');
});

Route::group(['middleware' => 'admin'], function(){
Route::get('/admin/dashboard' , [DashboardController::class, 'index'])->middleware('admin')->name('admin.dashboard');
});
