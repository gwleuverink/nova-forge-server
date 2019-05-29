<?php

use Illuminate\Support\Facades\Route;
use Leuverink\ForgeServer\Http\Controllers\GetSitesController;
use Leuverink\ForgeServer\Http\Controllers\DeploySitesController;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::get('/get-sites', GetSitesController::class);
Route::post('/deploy-sites', DeploySitesController::class);