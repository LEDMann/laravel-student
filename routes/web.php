<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(CourseController::class)->group(function () {
    Route::get('/course/all', 'listAll')->name('course.list.all');
    Route::get('/course/enrolled', 'listEnrolled')->name('course.list.user');
    Route::get('/course/new', 'new')->name('course.new');
    Route::post('/course/new', 'store')->name('course.store');
    Route::post('/course/enrol', 'enrol')->name('course.enrol');
    Route::post('/course/unenrol', 'unenrol')->name('course.unenrol');
})->middleware(['auth', 'verified']);

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
    Route::post('/profile', 'graduate')->name('profile.graduate');
})->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
