<!DOCTYPE html>
<html lang="en">
@extends('admin.layout.app')

@section('content')
<main id="main" class="main">
<section>
    <div class="container">
        <h1>Edit SubCategory</h1>

        {{-- Display validation errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form for editing a subcategory --}}
        <form action="{{ route('sub-categories.update', $subCategory->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" required class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $subCategory->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
                <label for="name">SubCategory Name:</label>
                <input type="text" name="name" id="name" value="{{ $subCategory->name }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="image">Category Image:</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($subCategory->image)
                    <img src="{{ asset('assets/uploads/subcategories/' . $subCategory->image) }}" width="100" class="mt-3" alt="Category Image">
                @endif
            </div>

            <button type="submit" class="btn btn-success mt-3">Update SubCategory</button>
        </form>
    </div>
    </section>
</main>
    @endsection

