<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutStatController;
use App\Http\Controllers\SaaSPlatformController;
use App\Http\Controllers\SuccessStoryController;
use App\Http\Controllers\PricingTierController;
use App\Http\Controllers\SupportTicketController;

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

// Public Authentication Action
Route::post('/login', [AuthController::class, 'login']);

// Public Read-Only Endpoints
Route::get('/about-stats', [AboutStatController::class, 'index']);
Route::get('/saas-platforms', [SaaSPlatformController::class, 'index']);
Route::get('/success-stories', [SuccessStoryController::class, 'index']);
Route::get('/pricing-tiers', [PricingTierController::class, 'index']);

// Public functionality
Route::post('/support-tickets', [SupportTicketController::class, 'store']); 

// Protected Admin Endpoints
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    // Auth Settings
    Route::post('/change-password', [AuthController::class, 'changePassword']);
    
    // About Stats
    Route::put('/about-stats/{id}', [AboutStatController::class, 'update']);
    
    // SaaS Platforms
    Route::post('/saas-platforms', [SaaSPlatformController::class, 'store']);
    Route::put('/saas-platforms/{id}', [SaaSPlatformController::class, 'update']);
    Route::delete('/saas-platforms/{id}', [SaaSPlatformController::class, 'destroy']);
    
    // Success Stories
    Route::post('/success-stories', [SuccessStoryController::class, 'store']);
    Route::put('/success-stories/{id}', [SuccessStoryController::class, 'update']);
    Route::delete('/success-stories/{id}', [SuccessStoryController::class, 'destroy']);
    
    // Pricing Tiers
    Route::post('/pricing-tiers', [PricingTierController::class, 'store']);
    Route::put('/pricing-tiers/{id}', [PricingTierController::class, 'update']);
    Route::delete('/pricing-tiers/{id}', [PricingTierController::class, 'destroy']);
    
    // Support Tickets
    Route::get('/support-tickets', [SupportTicketController::class, 'index']); // Admin sees all
    Route::put('/support-tickets/{id}', [SupportTicketController::class, 'update']);
    Route::delete('/support-tickets/{id}', [SupportTicketController::class, 'destroy']);
});
