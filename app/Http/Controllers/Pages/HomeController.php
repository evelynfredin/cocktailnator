<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $key = config('services.cocktaildb.key');
        $endPoint = 'https://www.thecocktaildb.com/api/json/v2/';
        $showLimit = 6;
        $response = Http::get($endPoint . $key . '/recent.php')->json();
        $newDrinks = [];

        if (count($response['drinks']) > $showLimit) {
            for ($drink = 0; $drink <= 5; $drink++) {
                $newDrinks[] = $response['drinks'][$drink];
            }
        }

        return view('pages.home', [
            'drinks' => $newDrinks
        ]);
    }
}
