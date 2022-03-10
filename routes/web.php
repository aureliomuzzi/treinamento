<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FullcalendarController;
use App\Models\FastEvent;

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
    return redirect('/fullcalendar');
});

Route::get('/fullcalendar', [FullcalendarController::class, 'index'])->name('index');

Route::get('/load-events', [EventController::class, 'loadEvents'])->name('routeLoadEvents');

Route::put('/event-update', [EventController::class, 'update'])->name('routeEventUpdate');

Route::post('/event-store', [EventController::class, 'store'])->name('routeEventStore');

Route::delete('/event-destroy', [EventController::class, 'destroy'])->name('routeEventDelete');
