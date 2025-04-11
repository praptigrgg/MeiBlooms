<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showBouquets($id)
    {
        $category = Category::findOrFail($id);
        $bouquets = $category->bouquets()->paginate(9);


        return view('frontend.pages.shop', compact('bouquets', 'category'));
    }


}
