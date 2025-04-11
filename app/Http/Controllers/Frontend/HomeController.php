<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Bouquet;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $bouquets = Bouquet::latest()->take(6)->get();
    $categories = Category::all();
    $testimonials = Testimonial::latest()->take(5)->get();

    return view('frontend.home', compact('bouquets', 'categories', 'testimonials'));
    }
}
