<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //Görev Route'ları
    Route::get('/dashboard', [\App\Http\Controllers\TaskController::class, "tasksPage"])->name('dashboard');

    Route::get("/tasks/create", [\App\Http\Controllers\TaskController::class, "createTaskPage"])->name('createTaskPage');

    Route::post("/tasks/create/save", [\App\Http\Controllers\TaskController::class, "createTask"])->name('createTask');

    //Kategori Route'ları
    Route::get("/categories", [\App\Http\Controllers\CategoryController::class, "categoriesPage"])->name('categoriesPage');

    Route::get("/categories/create", [\App\Http\Controllers\CategoryController::class, "createCategoryPage"])->name('createCategoryPage');

    Route::post("/categories/create/save", [\App\Http\Controllers\CategoryController::class, "createCategory"])->name('createCategory');

    Route::get("/category/update/{id}", [\App\Http\Controllers\CategoryController::class, "updateCategoryPage"])->name('updateCategoryPage');

    Route::post("/category/update/save/{id}", [\App\Http\Controllers\CategoryController::class, "updateCategory"])->name('updateCategory');

    Route::get("/category/delete/{id}", [\App\Http\Controllers\CategoryController::class, "deleteCategory"])->name('deleteCategory');
});

Route::get("/testTemplate", function (){
    return view("front.layouts.app");
});
