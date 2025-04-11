<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Bouquet;
use Illuminate\Http\Request;

class FrontendShopController extends Controller
{
    public function index(Request $request)
{
    $query = Bouquet::query();

    if ($request->filled('type')) {
        $query->where('type', $request->type);
    }

    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->min_price);
    }

    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->max_price);
    }

    $bouquets = $query->paginate(12);

    return view('frontend.pages.shop', compact('bouquets'));
}
}
