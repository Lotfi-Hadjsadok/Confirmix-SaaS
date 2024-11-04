<?php

use App\Livewire\Guest\Home;
use App\Livewire\Login;
use App\Livewire\Page\Orders;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class);
Route::get('/orders', Orders\Index::class);
Route::get('/login', Login::class)->name('login')->middleware('guest');
Route::get('/register', Register::class)->name('register')->middleware('guest');
