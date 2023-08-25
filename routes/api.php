<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::post('/login',[AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout',[AuthController::class, 'logout']);

    /*===========================
    =           reservation_statuses           =
    =============================*/

    Route::apiResource('/reservation_statuses', \App\Http\Controllers\API\Reservation_statusController::class);

    Route::group([
    'prefix' => 'reservation_statuses',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\Reservation_statusController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\Reservation_statusController::class, 'permanentDelete']);
    });
    /*=====  End of reservation_statuses   ======*/

    /*===========================
    =           reservations           =
    =============================*/

    Route::apiResource('/reservations', \App\Http\Controllers\API\ReservationController::class);

    Route::group([
    'prefix' => 'reservations',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\ReservationController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\ReservationController::class, 'permanentDelete']);
    });
    /*=====  End of reservations   ======*/

    /*===========================
    =           categories           =
    =============================*/

    Route::apiResource('/categories', \App\Http\Controllers\API\CategoryController::class);

    Route::group([
    'prefix' => 'categories',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\CategoryController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\CategoryController::class, 'permanentDelete']);
    });
    /*=====  End of categories   ======*/

    /*===========================
    =           fine_payments           =
    =============================*/

    Route::apiResource('/fine_payments', \App\Http\Controllers\API\Fine_paymentController::class);

    Route::group([
    'prefix' => 'fine_payments',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\Fine_paymentController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\Fine_paymentController::class, 'permanentDelete']);
    });
    /*=====  End of fine_payments   ======*/

    /*===========================
    =           books           =
    =============================*/

    Route::apiResource('/books', \App\Http\Controllers\API\BookController::class);

    Route::group([
    'prefix' => 'books',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\BookController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\BookController::class, 'permanentDelete']);
    });
    /*=====  End of books   ======*/

    /*===========================
    =           members           =
    =============================*/

    Route::apiResource('/members', \App\Http\Controllers\API\MemberController::class);

    Route::group([
    'prefix' => 'members',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\MemberController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\MemberController::class, 'permanentDelete']);
    });
    /*=====  End of members   ======*/

    /*===========================
    =           book_authors           =
    =============================*/

    Route::apiResource('/book_authors', \App\Http\Controllers\API\Book_authorController::class);

    Route::group([
    'prefix' => 'book_authors',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\Book_authorController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\Book_authorController::class, 'permanentDelete']);
    });
    /*=====  End of book_authors   ======*/

    /*===========================
    =           loans           =
    =============================*/

    Route::apiResource('/loans', \App\Http\Controllers\API\LoanController::class);

    Route::group([
    'prefix' => 'loans',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\LoanController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\LoanController::class, 'permanentDelete']);
    });
    /*=====  End of loans   ======*/

    /*===========================
    =           fines           =
    =============================*/

    Route::apiResource('/fines', \App\Http\Controllers\API\FineController::class);

    Route::group([
    'prefix' => 'fines',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\FineController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\FineController::class, 'permanentDelete']);
    });
    /*=====  End of fines   ======*/

    /*===========================
    =           member_statuses           =
    =============================*/

    Route::apiResource('/member_statuses', \App\Http\Controllers\API\Member_statusController::class);

    Route::group([
    'prefix' => 'member_statuses',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\Member_statusController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\Member_statusController::class, 'permanentDelete']);
    });
    /*=====  End of member_statuses   ======*/

    /*===========================
    =           authors           =
    =============================*/

    Route::apiResource('/authors', \App\Http\Controllers\API\AuthorController::class);

    Route::group([
    'prefix' => 'authors',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\AuthorController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\AuthorController::class, 'permanentDelete']);
    });
    /*=====  End of authors   ======*/

});

