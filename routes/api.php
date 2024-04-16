<?php


use App\Http\Controllers\PandascoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return "hello from api";
});
Route::get('/game/{game}/tournaments', [PandascoreController::class, 'getGameTournament']);
