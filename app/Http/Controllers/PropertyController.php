<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::query();
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('location', 'like', "%$search%")
                  ->orWhere('price', 'like', "%$search%");
        }
    
        $properties = $query->get();
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'location' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $property = new Property($request->except('image'));

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('properties', 'public');
            $property->image = $imagePath;
        }

        $property->save();

        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }

    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }
}