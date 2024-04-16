<?php

namespace App\Http\Controllers;


use http\Env;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class PandascoreController extends Controller
{
    public function getGameTournament(Response $response, Request $request, String $game, Http $http): JsonResponse
    {
        $pagination = $request->query('pagination') ?? 10;
        $tournaments = $http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.env('PANDASCORE_API_KEY')
        ])->withQueryParameters([
            'pagination' => $pagination
        ])->get(env('PANDASCORE_API_BASE_ROUTE').$game."/tournaments");

        return JsonResponse::fromJsonString($tournaments);
        //return JsonResponse::fromJsonString((string) $route);
    }
}
