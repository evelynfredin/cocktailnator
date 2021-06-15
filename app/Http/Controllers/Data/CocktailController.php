<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Data\FavoriteController;

class CocktailController extends Controller
{
    public function limitResponse(array $res, int $setLimit): array
    {
        $newRes = [];
        if (count($res['drinks']) > $setLimit) {
            for ($drink = 0; $drink < $setLimit; $drink++) {
                $newRes[] = $res['drinks'][$drink];
            }
        }
        return $newRes;
    }

    public function index()
    {
        $key = config('services.cocktaildb.key');
        $rootUrl = config('services.cocktaildb.endpoint');
        $getRecentDrinks = Http::get($rootUrl . $key . '/recent.php')->json();
        $getPopularDrinks = Http::get($rootUrl . $key . '/popular.php')->json();
        $favorites = FavoriteController::getAuthUserFavorites();

        $recentDrinks = $this->limitResponse($getRecentDrinks, 3);
        $popularDrinks = $this->limitResponse($getPopularDrinks, 6);

        return view('pages.home', [
            'drinks' => $recentDrinks,
            'popularDrinks' => $popularDrinks,
            'favorites' => $favorites,
        ]);
    }

    public function show($drinkId)
    {
        $rootUrl = config('services.cocktaildb.endpoint');
        $key = config('services.cocktaildb.key');
        $requestUrl = $rootUrl . $key . '/lookup.php?i=' . $drinkId;
        $response = Http::get($requestUrl)->json();
        $drink = $response['drinks'][0];
        $totalIngredients = 15;
        $ingredients = [];

        for ($index = 1; $index <= $totalIngredients; $index++) {
            $ingredient = $drink['strIngredient' . $index];
            $measure = $drink['strMeasure' . $index];

            if ($ingredient !== null && $ingredient !== '') {
                $ingredients[] = [
                    'measure' => $measure,
                    'item' => $ingredient
                ];
            }
        }

        return view('pages.drink', [
            'drink' => $drink,
            'ingredients' => $ingredients
        ]);
    }
}
