<!DOCTYPE html>
<html lang="en">
@extends('admin.layout.app')

@section('content')
<main id="main" class="main">
<section>
    <div class="container">
        <h1>Edit Category</h1>

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

        {{-- Form for editing a category --}}
        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="image">Category Image:</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($category->image)
                    <img src="{{ asset('assets/uploads/categories/' . $category->image) }}" width="100" class="mt-3" alt="Category Image">
                @endif
            </div>

            <button type="submit" class="btn btn-success mt-3">Update Category</button>
        </form>
    </div>
    </section>
</main>
    @endsection

