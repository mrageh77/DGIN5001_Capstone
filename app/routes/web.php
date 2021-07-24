<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('settings', [SettingController::class, 'index'])->name('settings.edit');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
    Route::resource('user', UserController::class);
    Route::post('job/import', [JobController::class, 'import'])->name('import.jobs');
    Route::get('/job-application/{job}', [JobController::class, 'application'])->name('job.application');

    Route::resource('job', JobController::class);
});


require __DIR__ . '/auth.php';

Route::get('/', [FrontendController::class, 'home'])->name('homepage');
Route::get('/job/{job}', [FrontendController::class, 'job'])->name('job.single');

Route::get('/company', [FrontendController::class, 'company'])->name('company');
Route::get('/upload-resume', [FrontendController::class, 'resume'])->name('resume');
Route::post('/upload-resume', [FrontendController::class, 'uploadResume'])->name('upload-resume');
Route::post('/upload-resume', [FrontendController::class, 'uploadResume'])->name('upload-resume');
Route::get('/job-applied', [FrontendController::class, 'application'])->name('applied-job');
Route::post('/job-apply', [FrontendController::class, 'applyJob'])->name('apply-job');
Route::get('/job-saved', [FrontendController::class, 'savedJob'])->name('saved-job');
Route::post('/job-save', [FrontendController::class, 'saveJob'])->name('save-job');
Route::delete('/{job}/job-remove', [FrontendController::class, 'removeSavedJob'])->name('remove-saved-job');

Route::delete('/{resume}/delete-resume', [FrontendController::class, 'destroy'])->name('resume.destroy');
Route::get('/profile', [FrontendController::class, 'profile'])->name('profile');
Route::post('/profile', [FrontendController::class, 'updateProfile'])->name('update-profile');
