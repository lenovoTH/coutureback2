<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleVenteController;
use App\Http\Controllers\ArticleConfectionController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('promo', App\Http\Controllers\PromoController::class);


// Route::apiResource('article-confection', App\Http\Controllers\ArticleConfectionController::class);

// Route::apiResource('article-vente', App\Http\Controllers\ArticleVenteController::class);

// Route::apiResource('categorie', App\Http\Controllers\CategorieController::class);

Route::apiResource('article-confection', ArticleConfectionController::class);

Route::apiResource('article-vente', ArticleVenteController::class);

Route::apiResource('categorie', App\Http\Controllers\CategorieController::class);

Route::apiResource('fournisseur', App\Http\Controllers\FournisseurController::class);

