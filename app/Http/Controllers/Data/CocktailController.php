<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

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

        $recentDrinks = $this->limitResponse($getRecentDrinks, 3);
        $popularDrinks = $this->limitResponse($getPopularDrinks, 6);

        return view('pages.home', [
            'drinks' => $recentDrinks,
            'popularDrinks' =>  $popularDrinks
        ]);
    }
}
