<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/system/tools/{command}', function ($command) {
    try {
        Artisan::call($command);

        return response()->make("<pre>" . Artisan::output() . "</pre>");
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});
