<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addFavorite($vendor)
    {
        $user = auth()->user();
        $vendorId = $vendor;
        $isBookmarked = $user->vendors->contains($vendorId);

        if ($isBookmarked) {
            $user->vendors()->detach($vendorId);
            return redirect()->back()->with('success', 'Vendor removed from favorites');
        }

        $favorite = Favorite::firstOrCreate([
            'user_id' => $user->id,
            'vendor_id' => $vendorId,
        ]);

        return redirect()->back()->with('success', 'vendor bookmarked successful');
    }

    public function getFavorites()
    {
        $user = auth()->user();
        $favorites = $user->vendors;

        return response()->json($favorites);
    }
}
