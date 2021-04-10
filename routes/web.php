<?php

use App\Events\newevent;
use App\Models\User;
use App\Notifications\newnotyfy;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Notification;

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
    return view('welcome');
});

Route::get('ll', function () {
    return view('lision');
});
// Route::get('/send', function () {
//     $user = App\Models\User::find(1);
//     $kk= Auth::user()->name  ." was login now";
// //     Notification::route('mail','imteajsajid1@gmail')

// //     ->notify(new InvoicePaid($user));

// //  $user->notify(new InvoicePaid($user));

// event(new newevent($kk));


//     return back();

// });


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index1'])->name('home');
Route::get('/send', [App\Http\Controllers\HomeController::class, 'send'])->name('send');
Route::get('/catagory', [App\Http\Controllers\notification::class, 'index']);

Route::get('/show', [App\Http\Controllers\notification::class, 'index1']);


