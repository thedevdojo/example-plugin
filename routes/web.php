<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    Route::view('example', 'example::home')->name('example');
    Route::get('example/component', \Wave\Plugins\Example\Components\Example::class)->name('example.component');
});
