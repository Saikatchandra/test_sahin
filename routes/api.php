<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [HomeController::class, 'getdivision'])->name('home');
Route::post('add-division', [HomeController::class, 'addDivision'])->name('addDivision');
Route::post('delete-division/{id}', [HomeController::class, 'deleteDivision'])->name('deleteDivision');

Route::get('get-district/{id}', [HomeController::class, 'getdistrict']);
Route::post('add-district', [HomeController::class, 'addDistrict'])->name('addDistrict');
Route::post('delete-district/{id}', [HomeController::class, 'deleteDistrict'])->name('deleteDistrict');

Route::get('get-area/{divId}/{distId}', [HomeController::class, 'getArea']);