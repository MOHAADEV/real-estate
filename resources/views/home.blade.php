@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron text-center">
        <h1 class="display-4">Welcome to Real Estate</h1>
        <p class="lead">Find your dream property with us.</p>
        <hr class="my-4">
        <p>Explore our wide range of properties or add your own.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('properties.index') }}" role="button">View Properties</a>
        <a class="btn btn-success btn-lg" href="{{ route('properties.create') }}" role="button">Add Property</a>
    </div>

    <!-- عرض العقارات الأخيرة -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h2>Latest Properties</h2>
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
    </div>
</div>
@endsection