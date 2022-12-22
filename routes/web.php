<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsletterController;
use App\Models\Post;
use App\Services\Newsletter;
use Illuminate\Database\Eloquent\ModelNotFoundException;



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

Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])
    ->name('index');

require __DIR__ . '/auth.php';

Route::get('posts/{post:slug}', [\App\Http\Controllers\PostController::class, 'show']);
Route::get('/search', [\App\Http\Controllers\PostController::class, 'search'])->name('search');



Route::get('ping', function () {
    $mailchimp = new \MailchimpMarketing\ApiClient();


    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => ''

    ]);
    $response = $mailchimp->lists->getAllLists();

    ddd($response);
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');



    Route::get('profile', [\App\Http\Controllers\SiteController::class, 'profile'])
        ->middleware('password.confirm')
        ->name('profile');
});
