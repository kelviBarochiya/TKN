<?php

use App\Http\Controllers\Api\ApiController as ApiApiController;
use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/clear-cache',function(){
	Artisan::call('optimize');
	dd('donee');
});

// Route::post('/signup', [APIController::class, 'register']);
// Route::post('/login', [APIController::class, 'login']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/about-us-list', [ApiApiController::class, 'AboutUsListing']);
Route::get('/how-we-do-list', [ApiApiController::class, 'HowWeDoListing']);
Route::get('/testimonial-list', [ApiApiController::class, 'TestimonialListing']);
Route::get('/our-teams-list', [ApiApiController::class, 'OurTeamsListing']);



Route::middleware(['auth:sanctum'])->group(function(){
    // Route::get('/logged-user', [APIController::class, 'loggedUser']);
    // Route::post('/create-properties', [APIController::class, 'createProperty']);
    // Route::get('/list-properties', [APIController::class, 'listProperties']);
    // Route::post('/update-property', [APIController::class, 'updateProperty']);
    // Route::post('/delete-property', [APIController::class, 'deleteProperty']);
    // Route::post('/logout', [APIController::class, 'logout']);
});

