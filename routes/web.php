<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\PHPMailerController;
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

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
    Route::get('/profile', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('media/{id}/delete', [Controllers\TicketController::class, 'mediaDelete']);
    Route::prefix('ticket')->controller(Controllers\TicketController::class)->group(function(){

        Route::get('{ticket}/edit', 'getMain');
        Route::post('{ticket}', 'postMain');



        Route::get('', 'getIndex');
        Route::post('', 'PostIndex');

        Route::get('main', 'myTicket');
        Route::get('main/{id}/delete', 'deleteMain');

        // Route::post('main/{id}', 'postMain');
        Route::get('add', 'ticketAdd');
        Route::get('{ticket}/favorite', 'addFavorite')->where('ticket','[0-9]+');
        Route::get('favorite', 'myFavorite');
        // Route::get('{ticket}/favorite/{id}', 'getOne');
        Route::get('favorite/{id}/delete', 'deleteFavorite');

        Route::get('message', 'myMessage');

        Route::post('/{ticket}/message', [Controllers\TicketController::class, 'postMessage']);
    });
    Route::get('ticket_favorite/{ticket_id}/delete', [Controllers\TicketController::class,'deleteFavoriteTicket']);
});

Route::get('tickets', [Controllers\TicketController::class, 'getAll']);

Route::get('ticket/{ticket}', [Controllers\TicketController::class, 'getOne']);

Route::get('catalog/{catalog}', [Controllers\CatalogsController::class, 'getOne'],);
Route::get('catalog/{id}/subcatalog', [Controllers\CatalogsController::class, 'subcatalog'],);

Route::get('search', [Controllers\SearchController::class, 'getSearch'],);

// Route::get('help',[Controllers\HelpController::class, 'getForm']);
// Route::post('help',[Controllers\HelpController::class, 'postForm']);



Route::post("send-email", [PHPMailerController::class, "sendMail"]);
Route::get("help", [PHPMailerController::class, "email"])->name("email");
// Route::post("send-email", [PHPMailerController::class, "composeEmail"])->name("send-email");
// маршрут для статической страницы, он всегда последний
require __DIR__ . '/auth.php';
Route::get('/{url}', [Controllers\BaseController::class, 'getText']);
