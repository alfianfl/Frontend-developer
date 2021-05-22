<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgressBarUploadFileController;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;

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

Route::get('/', function () {
    return redirect('/unpad-icocome2021');
});
Route::get('/unpad-icocome2021', [App\Http\Controllers\HomeController::class, 'index'])->name('HomePage');

Route::get('/unpad-icocome2021/aboutUs', [App\Http\Controllers\AboutUsController::class, 'index']);
Route::get('/unpad-icocome2021/committee', [App\Http\Controllers\ScientificPageController::class, 'index']);
Route::get('/unpad-icocome2021/FullPaper', function () {
    return view('.pages.callofPaper');
});
Route::get('/unpad-icocome2021/download', [App\Http\Controllers\downloads::class, 'showPage']);

// download template
Route::get('/download/template/{file}', [App\Http\Controllers\downloads::class, 'downloadTemplate'])->name('download.template');

Route::get('/unpad-icocome2021/event', function () {
    return view('.pages.event');
});
Route::get('/unpad-icocome2021/contactUs', function () {
    return view('.pages.contactUs');
});
//register conference
Route::post('/unpad-icocome2021/register/{id}', [App\Http\Controllers\AudienceConferenceController::class, 'audience'])->name('register.conference');

// submission untuk participant
Route::get('/unpad-icocome2021/submissionsParticipant', [App\Http\Controllers\submission\AbstractController::class, 'index']);
Route::post('/uploadData', [App\Http\Controllers\submission\proofOfPaymentsController::class, 'UploadDatabase'])->name('upload');
Route::post('/Payments/{id}/Edit', [App\Http\Controllers\submission\proofOfPaymentsController::class, 'Edit']);
Route::post('/Payments/{id}/Update', [App\Http\Controllers\submission\proofOfPaymentsController::class, 'Update']);
Route::delete('/Payments/{id}/delete', [App\Http\Controllers\submission\proofOfPaymentsController::class, 'delete']);
// submission abstract
Route::post('/upload/Abstract', [App\Http\Controllers\submission\AbstractController::class, 'UploadDatabase'])->name('upload.abstract');
Route::post('/Abstract/{id}/Edit', [App\Http\Controllers\submission\AbstractController::class, 'Edit']);
Route::delete('/Abstract/{id}/delete', [App\Http\Controllers\submission\AbstractController::class, 'delete']);
// submission paper
Route::post('/upload/papers', [App\Http\Controllers\submission\paperSubmission::class, 'UploadDatabase'])->name('upload.paper');
Route::post('/papers/{id}/Edit', [App\Http\Controllers\submission\paperSubmission::class, 'Edit']);
Route::delete('/papers/{id}/delete', [App\Http\Controllers\submission\paperSubmission::class, 'delete']);
// submission member
Route::post('/upload/members', [App\Http\Controllers\submission\MemberController::class, 'UploadDatabase'])->name('upload.members');
Route::post('/members/{id}/Edit', [App\Http\Controllers\submission\MemberController::class, 'Edit']);
Route::delete('/members/{id}/delete', [App\Http\Controllers\submission\MemberController::class, 'delete']);

// submission untuk Non participant
Route::get('/unpad-icocome2021/submissionsNonParticipant', function () {
    return view('.pages.submissionsNonParticipant');
});
//downlaods 
Route::get('/downloads/payments/{id}', [App\Http\Controllers\downloads::class, 'payments'])->name('download.payments');
Route::get('/downloads/abstract/{id}', [App\Http\Controllers\downloads::class, 'abstract'])->name('download.abstract');
Route::get('/downloads/member/{id}', [App\Http\Controllers\downloads::class, 'members'])->name('download.member');
Route::get('/downloads/papers/{id}', [App\Http\Controllers\downloads::class, 'papers'])->name('download.papers');

Route::get('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/register', [App\Http\Controllers\AuthController::class, 'registerAction'])->name('register');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/login', [App\Http\Controllers\AuthController::class, 'loginAction'])->name('login');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
// Auth::routes();

Route::get('/unpad-icocome2021', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
