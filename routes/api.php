<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrolmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(EnrolmentController::class)->group(function () {
    Route::post('/invoice/pay', 'pay')->name('pay');
    Route::get('/enrolments/list', 'list')->name('list_enrolments');
    Route::post('/enrolments/list/{user}', 'listUserEnrolments')->name('list_user_enrolments');
})->middleware("auth:api");