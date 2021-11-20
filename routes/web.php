<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('Welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects');

Route::get('/projects_finish', [App\Http\Controllers\ProjectController::class, 'finish'])->name('projects_finish');

Route::get('/projects_details/{id}', [App\Http\Controllers\ProjectController::class, 'details'])->name('projects_details');

Route::get('/etatprojet/{id}', [App\Http\Controllers\UserChartController::class, 'index'])->name('charts');

Route::get('/lands', [App\Http\Controllers\TerrainsController::class, 'index'])->name('terrains');

Route::get('/land_details/{id}', [App\Http\Controllers\TerrainsController::class, 'details'])->name('terrain_details');

Route::get('/land_use', [App\Http\Controllers\TerrainsController::class, 'terrain_exploitation'])->name('terre_use');

Route::get('/add_land', [App\Http\Controllers\TerrainsController::class, 'getLand'])->name('getLand');

Route::get('/add_owner', [App\Http\Controllers\TerrainsController::class, 'getOwner'])->name('addOwner');

Route::get('/add_croquis', [App\Http\Controllers\TerrainsController::class, 'getCroquis'])->name('addCroquis');

Route::get('/add_projet', [App\Http\Controllers\ProjectController::class, 'getProjetForm'])->name('addProjetForm');

Route::post('/add_land', [App\Http\Controllers\TerrainsController::class, 'addLand'])->name('addLand');

Route::post('/add_coordonnee', [App\Http\Controllers\TerrainsController::class, 'addCoordonnee'])->name('addCoordonnee');

Route::post('/add_owner', [App\Http\Controllers\TerrainsController::class, 'addOwner'])->name('addOwner');

Route::post('/add_croquis', [App\Http\Controllers\TerrainsController::class, 'addCroquis'])->name('addCroquis');

Route::post('/add_projet', [App\Http\Controllers\ProjectController::class, 'addProjetForm'])->name('addProjet');

Route::post('/add_promoteur', [App\Http\Controllers\ProjectController::class, 'addPromoteur'])->name('addPromoteur');

