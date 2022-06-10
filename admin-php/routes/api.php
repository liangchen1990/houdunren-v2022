<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\FansController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\InitController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiteController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('init', InitController::class);
Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);
Route::get('logout', LogoutController::class);
Route::post('account/forget-password', ForgetPasswordController::class);

Route::post('code/send', [CodeController::class, 'send']);
Route::post('code/not_exist_user', [CodeController::class, 'notExistUser']);
Route::post('code/exist_user', [CodeController::class, 'existUser']);
Route::post('code/user/{type}', [CodeController::class, 'user']);

Route::put('system', [SystemController::class, 'update']);
Route::get('system', [SystemController::class, 'get']);

Route::post('upload/avatar', [UploadController::class, 'avatar']);
Route::post('upload/image', [UploadController::class, 'image']);

Route::apiResource('permission', PermissionController::class);
Route::put('role/permission/{role}', [RoleController::class, 'permission']);
Route::apiResource('role', RoleController::class);

Route::get('user/info', [UserController::class, 'info']);
Route::apiResource('user', UserController::class);

Route::get('follower/{user}', [FollowerController::class, 'index']);
Route::get('follower/toggle/{user}', [FollowerController::class, 'toggle']);
Route::get('fans/{user}', [FansController::class, 'index']);

Route::apiResource('site', SiteController::class);
Route::apiResource('site.admin', AdminController::class);
