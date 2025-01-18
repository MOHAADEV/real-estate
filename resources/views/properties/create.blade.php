@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Property</h1>

    <!-- عرض رسائل الخطأ -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- نموذج إضافة عقار -->
    <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" value="{{ old('location') }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="latitude">Latitude</label>
            <input type="number" step="any" name="latitude" class="form-control" value="{{ old('latitude') }}">
        </div>
        <div class="form-group mb-3">
            <label for="longitude">Longitude</label>
            <input type="number" step="any" name="longitude" class="form-control" value="{{ old('longitude') }}">
        </div>
        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Add Property</button>
    </form>
</div>
@endsection