<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\UserSettingController;
use App\Http\Controllers\user\UserPermissionController;
use App\Http\Controllers\frontend\LandingPageController;

/**
 * *********************************************
 * Front-End Routes
 * *********************************************
 */
Route::group(['namespace'=>'frontend'], function(){
    Route::get('/',[LandingPageController::class,'landingPage'])->name('frontend.landing');
});



/**
 * *********************************************
 * Back-End Routes
 * *********************************************
 */
Auth::routes([
    'logout'=>false
]);
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    /**
     * User Routes
     */
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('user-logout',[HomeController::class,'logout'])->name('logout');
    Route::get('user-profile/delete/{id}',[UserSettingController::class,'destroy'])->name('user-profile.destroy');
    Route::resource('user-profile',UserSettingController::class)->except('destroy');
    // permission routes
    Route::get('permission/create/{id}',[UserPermissionController::class,'create'])->name('permission.create');
    Route::get('permission/delete/{id}',[UserPermissionController::class,'destroy'])->name('permission.destroy');
    Route::resource('permission',UserPermissionController::class)->except('destroy','create');
    Route::match(['put','patch'],'user/assigned-permissions/update/{userID}',[UserPermissionController::class,'permissionUpdate'])->name('permission.user.update');
});
