<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', [Controllers\BaseController::class, 'getIndex']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    // 'isadmin',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return Inertia::render('Dashboard');
    // })->name('dashboard');
    // меняем на это!!!!!


});

Route::middleware('isadmin')->group(function(){
    Route::get('/dashboard',
        [Controllers\HomeController::class, 'getIndex']
    )->name('dashboard');
    Route::get('/dashboard/catalog/{catalog}', [Controllers\HomeController::class, 'getCatalog']);
    Route::get('/dashboard/catalog/{catalog}/delete', [Controllers\HomeController::class, 'getDelete']);
    Route::post('/dashboard/catalog/{catalog}', [Controllers\HomeController::class, 'postCatalog']);
    Route::post('/home', [Controllers\HomeController::class, 'postIndex']);
});






// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//     Route::prefix('admin')->group(function () {
//         Route::get('charts', [Controllers\UserController::class, 'getCharts']);
//         Route::get('users', [Controllers\UserController::class, 'getUsers']);
//     });
//     Route::post('/home', [Controllers\HomeController::class, 'postIndex']);
//     Route::prefix('ticket')->controller(Controllers\TicketController::class)->group(function(){
//         Route::get('', 'getIndex');
//         Route::post('', 'PostIndex');
//     });
// });
Route::middleware('auth')->group(function () {
Route::prefix('ticket')->controller(Controllers\TicketController::class)->group(function(){
    Route::get('', 'getIndex');
    Route::post('', 'PostIndex');
    Route::get('{ticket}/favorite', 'addFavorite')->where('ticket','[0-9]+');
    Route::get('favorite', 'myFavorite');
    Route::get('favorite/{id}/delete', 'deleteFavorite');
});
});
Route::get('tickets', [Controllers\TicketController::class, 'getAll']);
Route::get('ticket/{ticket}', [Controllers\TicketController::class, 'getOne']);
// маршрут для статической страницы, он всегда последний
require __DIR__ . '/auth.php';
Route::get('/{url}', [Controllers\BaseController::class, 'getText']);
