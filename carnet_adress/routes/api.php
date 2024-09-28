<?php

use App\Http\Controllers\Api\CarnetAdressController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// La route aui permete au fontend de gerer notre api::

//recuperer
Route::get('/posts', [CarnetAdressController::class, 'index']);

// Ajouter les contacts des utilisateurs
Route::post('/posts/create', [CarnetAdressController::class, 'store']);
Route::put('/posts/edit/{post}', [CarnetAdressController::class, 'update']);
Route::delete('/posts/delete/{post}', [CarnetAdressController::class, 'supprimer']);
