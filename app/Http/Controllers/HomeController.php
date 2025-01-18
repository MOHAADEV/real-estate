<?php

namespace App\Http\Controllers;
use App\Models\Property;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $properties = Property::latest()->take(6)->get();
        return view('home', compact('properties'));
    }
}