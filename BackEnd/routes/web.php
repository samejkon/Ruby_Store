<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;



Route::get('/', [ClientController::class, 'home']);
Route::get('detail/{id}', [ClientController::class, 'show']);

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //Category
    Route::prefix('category')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('admin.category.index'); //list màu
        Route::post('/store', 'store')->name('admin.category.store'); //thêm màu

        Route::get('/edit/{id}', 'edit')->name('admin.category.edit'); // lấy ra danh mục để sửa
        Route::post('/update/{id}', 'update')->name('admin.category.update'); // post lại dữ liệu lên

        Route::get('/destroy/{id}', 'destroy')->name('admin.category.destroy'); //xoá màu
    });
    //product
    Route::prefix('product')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('admin.product.index');
        Route::post('/store', 'store')->name('admin.product.store'); //thêm sản phẩm

        Route::get('/edit/{id}', 'edit')->name('admin.product.edit'); //thêm sản phẩm
        Route::post('/update/{id}', 'update')->name('admin.product.update'); //thêm sản phẩm

        Route::get('/destroy/{id}', 'destroy')->name('admin.product.destroy'); //xoá sản phẩm

        //variant
        //create
        Route::get('variant/{id}', 'variant')->name('product.variant');
        Route::post('variant/{id}/store', 'createVariant')->name('variant.store');
        //update
        Route::get('variant/{id}/edit/{variantId}', 'editVariant')->name('variant.edit');
        Route::post('variant/{id}/update/{variantId}', 'updateVariant')->name('variant.update');
        Route::get('variant/{id}/delete/{variantId}', 'deleteVariant')->name('variant.delete');
    });

    //size
    Route::prefix('size')->controller(SizeController::class)->group(function () {
        Route::get('/', 'index')->name('admin.size.index');
        Route::post('/store', 'store')->name('admin.size.store'); //thêm size

        Route::get('/edit/{id}', 'edit')->name('admin.size.edit'); // lấy ra danh mục để sửa
        Route::post('/update/{id}', 'update')->name('admin.size.update'); // post lại dữ liệu lên

        Route::get('/destroy/{id}', 'destroy')->name('admin.size.destroy'); //xoá size
    });

    //color
    Route::prefix('color')->controller(ColorController::class)->group(function () {
        Route::get('/', 'index')->name('admin.color.index'); //list màu
        Route::post('/store', 'store')->name('admin.color.store'); //thêm màu

        Route::get('/edit/{id}', 'edit')->name('admin.color.edit'); // lấy ra danh mục để sửa
        Route::post('/update/{id}', 'update')->name('admin.color.update'); // post lại dữ liệu lên

        Route::get('/destroy/{id}', 'destroy')->name('admin.color.destroy'); //xoá màu
    });


    //user
    Route::prefix('user')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('admin.user.index'); //list user

    });


    //role
    Route::prefix('role')->controller(RoleController::class)->group(function () {
        Route::get('/', 'index')->name('admin.role.index'); //list quyền
        Route::post('/store', 'store')->name('admin.role.store'); //thêm quyền

        Route::get('/destroy/{id}', 'destroy')->name('admin.role.destroy'); //xoá quyền
    });


    //order
    Route::prefix('order')->controller(OrderController::class)->group(function () {
        Route::get('/', 'index')->name('admin.order.index'); //list đơn hàng
    });
});
