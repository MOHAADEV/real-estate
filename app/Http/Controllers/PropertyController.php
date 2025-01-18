<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
        // التحقق من صحة البيانات
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('properties', 'public');
        }
    
        Property::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'location' => $request->location,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'image' => $imagePath,
        ]);
    
        return redirect()->route('properties.index')->with('success', 'Property added successfully.');
    }

    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }
}