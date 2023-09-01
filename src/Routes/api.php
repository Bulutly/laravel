<?php

use Bulutly\Laravel\Http\Controllers\BulutController;
use Bulutly\Laravel\Http\Controllers\ENVController;
use Bulutly\Laravel\Http\Controllers\ImageController;
use Bulutly\Laravel\Http\Controllers\ProjectController;
use Bulutly\Laravel\Http\Controllers\Terminal\ExpertController;
use Bulutly\Laravel\Http\Controllers\Terminal\SettingController;
use Bulutly\Laravel\Http\Controllers\Terminal\TerminalController;
use Illuminate\Support\Facades\Route;

Route::prefix(config('bulutly.routes.prefix'))->group(function () {

    // Projects
    Route::prefix('Projects')->name('Projects.')->controller(ProjectController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{uuid}', 'show')->name('show');
        Route::put('/{uuid}', 'update')->name('show');
        Route::delete('/{uuid}', 'delete')->name('delete');
    });

    // Buluts
    Route::prefix('buluts')->name('buluts.')->controller(BulutController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{uuid}', 'show')->name('show');
        Route::put('/{uuid}', 'update')->name('update');
        Route::delete('/{uuid}', 'delete')->name('delete');

        // ENVs
        Route::prefix('{uuid}/envs')->name('envs.')->controller(ENVController::class)->group(function (){
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::put('/{env_uuid}', 'update')->name('update');
            Route::delete('/{env_uuid}', 'delete')->name('delete');
        });

    });

    // Images
    Route::prefix('images')->name('images.')->controller(ImageController::class)->group(function(){
        Route::get('/', 'index')->name('index');
    });

    // Terminals
    Route::prefix('terminals')->controller(TerminalController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::delete('/{uuid}', 'delete')->name('delete');
        Route::prefix('{uuid}')->group(function(){
            Route::prefix('setting')->controller(SettingController::class)->group(function(){
                Route::get('/', 'show')->name('setting');
                Route::put('/', 'update')->name('setting.update');
            });
            Route::prefix('experts')->controller(ExpertController::class)->group(function(){
                Route::get('/', 'index')->name('experts');
                Route::post('/', 'store')->name('experts.store');
                Route::delete('/{expert_uuid}', 'delete')->name('experts.delete');
            });
        });
    });
});