<?php

namespace App\Http\Controllers\Data;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    static function getAuthUserFavorites()
    {
        return Favorite::where('user_id', Auth::id())->get();
    }

    public function store(Request $request, $drinkId)
    {
        Favorite::create([
            'user_id' => Auth::user()->id,
            'drink_id' => $drinkId,
        ]);

        return back()->with('status', 'Drink added to favorites!');
    }

    public function destroy($drinkId)
    {
        Favorite::where([
            'user_id' => Auth::user()->id,
            'drink_id' => $drinkId
        ])->delete();

        return back()->with('status', 'Drink has been removed from favorites!');
    }
}
