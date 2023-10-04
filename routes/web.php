<?php

use App\Http\Controllers\FileHandleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AttendeeController;

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return inertia('Home');
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::prefix('/users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'store']);
        Route::get('/create', [UserController::class, 'create'])->can('create', 'App\Model\User');
        Route::get('/{id}/edit', [UserController::class, 'edit']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
        Route::patch('/{id}', [UserController::class, 'update']);
        Route::get('/change-password', [UserController::class, 'changePassword']);
        Route::post('/update-password', [UserController::class, 'updatePassword']);
        Route::get('/settings', [UserController::class, 'settings']);
        Route::post('/change-name', [UserController::class, 'changeName']);
        Route::post('/change-photo', [UserController::class, 'changePhoto']);
    });


    //Avatar file upload
    Route::post('/files/upload', [FileHandleController::class, 'uploadAvatar']);
    Route::delete('/files/upload/delete', [FileHandleController::class, 'destroyAvatar']);


    //Municipalities
    Route::prefix('municipalities')->group(function () {
        Route::post('/', [MunicipalityController::class, 'index']);
    });

    //Barangays
    Route::prefix('barangays')->group(function () {
        Route::post('/', [BarangayController::class, 'index']);
    });

    Route::post('get-all-permissions', [PermissionController::class, 'getAllPermissions']);
    Route::post('update-user-permissions', [PermissionController::class, 'updateUserPermissions']);


    Route::prefix('/participants')->group(function () {
        Route::get('/', [AttendeeController::class, 'index']);
        Route::post('/import/file/data', [AttendeeController::class, 'importParticipants']);
        // Route::get('/create', [DivisionOutputController::class, 'create']);
        // Route::get('/{id}/edit', [DivisionOutputController::class, 'edit']);
        // Route::post('/store', [DivisionOutputController::class, 'store']);
        // Route::patch('/', [DivisionOutputController::class, 'update']);
        // Route::delete('/{id}', [DivisionOutputController::class, 'destroy']);
        // Route::get('/get/division_outputs/list', [DivisionOutputController::class, 'getDivOutput']);
    });
});

Route::prefix('/attendance')->group(function () {
    Route::get('/', [AttendeeController::class, 'direct']);
    Route::get('/qrscan', [AttendeeController::class, 'qrscan']);
});

Route::prefix('/printQR')->group(function () {
    Route::get('/qrcode', [AttendeeController::class, 'qrcode']);
    Route::get('/attendqr', [AttendeeController::class, 'attendqr']);
});
