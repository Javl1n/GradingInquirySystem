<?php

use App\Http\Controllers\AdminSubjectController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\ProfileController;
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
    if(auth()->user()->isAdmin())
    {
        return redirect(route('admin.dashboard'));
    }
})->middleware('auth');

Route::group(['middleware' => ['admin', 'auth', 'verified'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{student:school_id}', [AdminUserController::class, 'show'])->name('admin.users.show');
    
    Route::get('/subjects', [AdminSubjectController::class, 'index'])->name('admin.subjects.index');

    Route::get('/courses', [AdminCourseController::class, 'index'])->name('admin.courses.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
