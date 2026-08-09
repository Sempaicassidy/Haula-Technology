<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\SoftwareProductController;
use App\Http\Controllers\StrategicPartnerController;
use App\Http\Controllers\CorporateSettingController;

// Web Views
Route::get('/', function () {
    return view('index');
});

Route::get('/transportation', function () {
    return view('transportation');
});

Route::get('/trading', function () {
    return view('trading');
});

Route::get('/security', function () {
    return view('security');
});

Route::get('/technologies', function () {
    return view('technologies');
});

Route::get('/techhub', function () {
    return view('techhub');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('admin');
});


// REST API Endpoints
Route::prefix('api')->group(function () {
    // Contact Messages
    Route::get('/messages', [ContactMessageController::class, 'index']);
    Route::post('/messages', [ContactMessageController::class, 'store']);
    Route::delete('/messages/{id}', [ContactMessageController::class, 'destroy']);
    Route::post('/messages/clear', [ContactMessageController::class, 'clear']);

    // Divisions
    Route::get('/divisions', [DivisionController::class, 'index']);
    Route::post('/divisions', [DivisionController::class, 'update']);
    Route::post('/divisions/custom', [DivisionController::class, 'addCustom']);

    // Ecosystem Products
    Route::get('/products', [SoftwareProductController::class, 'index']);
    Route::post('/products', [SoftwareProductController::class, 'update']);
    Route::post('/products/custom', [SoftwareProductController::class, 'addCustom']);

    // Strategic Partners
    Route::get('/partners', [StrategicPartnerController::class, 'index']);
    Route::post('/partners', [StrategicPartnerController::class, 'store']);
    Route::delete('/partners/{id}', [StrategicPartnerController::class, 'destroy']);

    // Corporate Branding
    Route::get('/branding', [CorporateSettingController::class, 'show']);
    Route::post('/branding', [CorporateSettingController::class, 'update']);
});
