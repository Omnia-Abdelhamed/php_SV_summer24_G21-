<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/home',HomeController::class);
// Route::prefix('/admin')->name('admin.')->group(function(){
//     Route::get('/',function(){
//         return "welcome to admin";
//     })->name('home');
//     Route::controller(TestController::class)->name('test.')->group(function(){
//         Route::get('/test/test1','test1')->name('test1');
//         Route::get('/test/test2/{id}','test2')->where('id','[0-9]+')->name('test2');
//     });
// });

Route::prefix('/admin')->name('admin.')->group(function(){
    Route::get('/',AdminHomeController::class)->name('home');
    Route::controller(StudentController::class)->name('students.')->group(function(){
        Route::get('/students','index')->name('index');
        Route::get('/students/create','create')->name('create');
        Route::get('/students/{id}','show')->where(['id'=>'[0-9]+'])->name('show');
        Route::post('/students','store')->name('store');
        Route::delete('/students/{id}','destroy')->name('destroy');
        Route::get('/students/{id}/edit','edit')->name('edit');
        Route::put('/students/{id}','update')->name('update');
    });
});
