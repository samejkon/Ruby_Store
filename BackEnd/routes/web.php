<?php


use App\Livewire\Admin\Category\ListCategory;
use App\Livewire\Admin\Color\ListColor;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Size\ListSize;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/category', ListCategory::class)->name('category');
    Route::get('/color', ListColor::class)->name('color');
    Route::get('/size', ListSize::class)->name('size');
});
