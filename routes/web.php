<?php

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

Route::get('/', App\Livewire\Blogs\Index::class)->name('blogs.index');
Route::get('/create', App\Livewire\Blogs\Create::class)->name('blogs.create');
Route::get('/edit/{id}', App\Livewire\Blogs\Edit::class)->name('blogs.edit');
