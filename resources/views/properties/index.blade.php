@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Properties</h1>
    <form action="{{ route('properties.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by location or price" value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    <a href="{{ route('properties.create') }}" class="btn btn-primary mb-3">Add Property</a>
    <div class="row">
        @foreach($properties as $property)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $property->image) }}" class="card-img-top" alt="{{ $property->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $property->title }}</h5>
                        <p class="card-text">{{ $property->description }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ number_format($property->price, 2) }}</p>
                        <a href="{{ route('properties.show', $property) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection