<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bouquet;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $bouquets = Bouquet::where('name', 'LIKE', "%{$query}%")
                            ->orWhere('description', 'LIKE', "%{$query}%")
                            ->get();

        return view('frontend.pages.search-results', compact('bouquets', 'query'));
    }
}
