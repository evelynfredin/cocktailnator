<?php

namespace App\Http\Controllers\Data;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function store(Request $request, $drinkId)
    {
        Favorite::create([
            'user_id' => Auth::user()->id,
            'drink_id' => $drinkId,
        ]);

        return back()->with('status', 'Drink added to favorites!');
    }
}
