<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web','auth'])->group(function () {
	Route::get('/dashboard', \Thephpx\User\Http\Controllers\Dashboard::class)->name('dashboard.index');
});

Route::prefix('role')->middleware(['web','auth'])->group(function () {

	Route::get('/', \Thephpx\User\Http\Controllers\Role\Index::class)->name('role.index');
	Route::get('/create', \Thephpx\User\Http\Controllers\Role\Create::class)->name('role.create');
	Route::post('/create', \Thephpx\User\Http\Controllers\Role\Create::class)->name('role.create.post');
	Route::get('/edit/{role}', \Thephpx\User\Http\Controllers\Role\Edit::class)->name('role.edit');
	Route::put('/edit/{role}', \Thephpx\User\Http\Controllers\Role\Edit::class)->name('role.edit.put');
	Route::delete('/remove/{role}', \Thephpx\User\Http\Controllers\Role\Remove::class)->name('role.remove.delete');
	Route::get('/matrix/{role}', \Thephpx\User\Http\Controllers\Role\Matrix::class)->name('role.matrix');
	Route::put('/matrix/{role}', \Thephpx\User\Http\Controllers\Role\Matrix::class)->name('role.matrix.put');

});

Route::prefix('permission')->middleware(['web','auth'])->group(function () {

	Route::get('/', \Thephpx\User\Http\Controllers\Permission\Index::class)->name('permission.index');
	Route::get('/create', \Thephpx\User\Http\Controllers\Permission\Create::class)->name('permission.create');
	Route::post('/create', \Thephpx\User\Http\Controllers\Permission\Create::class)->name('permission.create.post');
	Route::get('/edit/{permission}', \Thephpx\User\Http\Controllers\Permission\Edit::class)->name('permission.edit');
	Route::put('/edit/{permission}', \Thephpx\User\Http\Controllers\Permission\Edit::class)->name('permission.edit.put');
	Route::delete('/remove/{permission}', \Thephpx\User\Http\Controllers\Permission\Remove::class)->name('permission.remove.delete');

});

Route::prefix('user')->middleware(['web','auth'])->group(function () {

	Route::get('/', \Thephpx\User\Http\Controllers\Index::class)->name('user.index');
	Route::get('/create', \Thephpx\User\Http\Controllers\Create::class)->name('user.create');
	Route::post('/create', \Thephpx\User\Http\Controllers\Create::class)->name('user.create.post');
	Route::get('/edit/{user}', \Thephpx\User\Http\Controllers\Edit::class)->name('user.edit');
	Route::put('/edit/{user}', \Thephpx\User\Http\Controllers\Edit::class)->name('user.edit.put');
	Route::delete('/remove/{user}', \Thephpx\User\Http\Controllers\Remove::class)->name('user.remove.delete');

});

