<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bouquet;
use App\Models\Category;
use Illuminate\Http\Request;

class BouquetController extends Controller
{
    public function index()
    {
        $bouquets = Bouquet::latest()->paginate(10);
        return view('admin.bouquets.index', compact('bouquets'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.bouquets.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the form input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('bouquets', 'public');
            $validated['image'] = $imagePath;
        }

        // Create the bouquet
        Bouquet::create($validated);

        // Redirect back with a success message
        return redirect()->route('admin.bouquets.index')->with('success', 'Bouquet created successfully!');
    }
    public function show($id)
    {
        $bouquet = Bouquet::with(['reviews.user'])->findOrFail($id);

        $relatedBouquets = Bouquet::where('id', '!=', $bouquet->id)
                                    ->inRandomOrder()
                                    ->take(4)
                                    ->get();

        return view('frontend.bouquet.details', compact('bouquet', 'relatedBouquets'));
    }

    public function edit($id)
    {
        $bouquet = Bouquet::findOrFail($id);
        $categories = Category::all(); // in case you have a dropdown for categories
        return view('admin.bouquets.edit', compact('bouquet', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $bouquet = Bouquet::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('bouquets', 'public');
            $validated['image'] = $imagePath;
        }

        $bouquet->update($validated);

        return redirect()->route('admin.bouquets.index')
                         ->with('success', 'Bouquet updated successfully!');
    }



}
