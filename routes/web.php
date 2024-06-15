<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->middleware('auth');

Route::get('/', 'HomeController@index')->middleware(['idtask'])->name('index');
Route::get('/profile', 'HomeController@profile')->middleware(['idtask'])->name('user_profile');
Route::post('/update-profile', 'HomeController@updateProfile')->middleware(['idtask'])->name('update_user_profile');

Route::redirect('/home', '/')->name('home')->middleware(['auth', 'idtask']);

Route::get('/task', 'TaskController@index')->middleware(['auth', 'idtask']);

Route::get('/game/{id}', 'GameController@index')->middleware('auth');
Route::get('/game', 'GameController@game')->middleware(['auth', 'idtask']);
Route::get('/content', function () {
    return view("front.game.content");
})->middleware('auth');
Route::get('/content2', function () {
    return view("front.game.multiplication");
})->middleware('auth');
Route::get('/content3', function () {
    return view("front.game.division");
})->middleware('auth');
Route::get('/content4', function () {
    return view("front.game.traditionalMultiplication");
})->middleware('auth');
Route::get('/content5', function () {
    return view("front.game.traditionalDivision");
})->middleware('auth');
Route::get('/content6', function () {
    return view("front.game.variado");
})->middleware('auth');
Route::get('/finish', function () {
    return view("front.game.finish");
})->middleware('auth');
Route::post('/saveData', 'GameController@saveData')->middleware('auth');

Route::get('admin/home', 'Admin\HomeController@index')->middleware(['auth', 'teacher', 'idtask']);
Route::get('admin', 'Admin\HomeController@index')->middleware(['auth', 'teacher', 'idtask']);
Route::get('admin/profile', 'Admin\ProfileController@index')->middleware(['auth', 'teacher', 'idtask']);
Route::post('admin/profile', 'Admin\ProfileController@index')->middleware(['auth', 'teacher', 'idtask']);

Route::get('admin/user', 'Admin\UserController@index')->middleware(['auth', 'admin', 'idtask']);
Route::get('admin/user/add', 'Admin\UserController@add')->middleware(['auth', 'admin', 'idtask']);
Route::post('admin/user/add', 'Admin\UserController@add')->middleware(['auth', 'admin', 'idtask']);
Route::get('admin/user/edit/{id}', 'Admin\UserController@edit')->middleware(['auth', 'admin', 'idtask']);
Route::post('admin/user/edit/{id}', 'Admin\UserController@edit')->middleware(['auth', 'admin', 'idtask']);
Route::get('admin/user/delete/{id}', 'Admin\UserController@delete')->middleware(['auth', 'admin', 'idtask']);
Route::get('admin/user/change/{id}', 'Admin\UserController@change')->middleware(['auth', 'admin', 'idtask']);

Route::get('admin/degree', 'Admin\DegreeController@index')->middleware(['auth', 'admin', 'idtask']);
Route::get('admin/degree/add', 'Admin\DegreeController@add')->middleware(['auth', 'admin', 'idtask']);
Route::post('admin/degree/add', 'Admin\DegreeController@add')->middleware(['auth', 'admin', 'idtask']);
Route::get('admin/degree/edit/{id}', 'Admin\DegreeController@edit')->middleware(['auth', 'admin', 'idtask']);
Route::post('admin/degree/edit/{id}', 'Admin\DegreeController@edit')->middleware(['auth', 'admin', 'idtask']);
Route::get('admin/degree/delete/{id}', 'Admin\DegreeController@delete')->middleware(['auth', 'admin', 'idtask']);
Route::get('admin/degree/change/{id}', 'Admin\DegreeController@change')->middleware(['auth', 'admin', 'idtask']);

Route::get('admin/task', 'Admin\TaskController@index')->middleware(['auth', 'teacher', 'idtask']);
Route::get('admin/task/add', 'Admin\TaskController@add')->middleware(['auth', 'teacher', 'idtask']);
Route::post('admin/task/add', 'Admin\TaskController@add')->middleware(['auth', 'teacher', 'idtask']);
Route::get('admin/task/edit/{id}', 'Admin\TaskController@edit')->middleware(['auth', 'teacher', 'idtask']);
Route::post('admin/task/edit/{id}', 'Admin\TaskController@edit')->middleware(['auth', 'teacher', 'idtask']);
Route::get('admin/task/delete/{id}', 'Admin\TaskController@delete')->middleware(['auth', 'teacher', 'idtask']);
Route::get('admin/task/change/{id}', 'Admin\TaskController@change')->middleware(['auth', 'teacher', 'idtask']);

Route::get('admin/student', 'Admin\StudentController@index')->middleware(['auth', 'teacher', 'idtask']);
Route::get('admin/student/add', 'Admin\StudentController@add')->middleware(['auth', 'teacher', 'idtask']);
Route::post('admin/student/add', 'Admin\StudentController@add')->middleware(['auth', 'teacher', 'idtask']);
Route::get('admin/student/edit/{id}', 'Admin\StudentController@edit')->middleware(['auth', 'teacher', 'idtask']);
Route::post('admin/student/edit/{id}', 'Admin\StudentController@edit')->middleware(['auth', 'teacher', 'idtask']);
Route::get('admin/student/delete/{id}', 'Admin\StudentController@delete')->middleware(['auth', 'teacher', 'idtask']);
Route::get('admin/student/change/{id}', 'Admin\StudentController@change')->middleware(['auth', 'teacher', 'idtask']);

Route::get('admin/report', 'Admin\ReportController@index')->middleware(['auth', 'teacher', 'idtask']);
Route::post('admin/report', 'Admin\ReportController@index')->middleware(['auth', 'teacher', 'idtask']);
Route::post('admin/report/notify', 'Admin\ReportController@notify')->middleware(['auth', 'teacher', 'idtask']);
