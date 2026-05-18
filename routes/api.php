<?php

use Illuminate\Support\Facades\Route;

// Endpoint pengujian API sederhana
Route::get('test', function () {
    return response()->json(['message' => 'OK']);
});