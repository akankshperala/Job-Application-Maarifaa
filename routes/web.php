<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::get("/",[ApplicationController::class,"index"])->name("application.index");
Route::get("/application/create",[ApplicationController::class,"create"])->name("application.create");
Route::post("/application/store",[ApplicationController::class,"store"])->name("application.store");
Route::get("/application/{id}/edit",[ApplicationController::class,"edit"])->name("application.edit");
Route::put('/application/{id}/update', [ApplicationController::class, 'update'])->name('application.update');
// Route::get('/application/{id}/delete', [ApplicationController::class, 'destroy'])->name('application.delete');
Route::delete('/application/{id}/delete', [ApplicationController::class, 'destroy'])->name('application.delete');