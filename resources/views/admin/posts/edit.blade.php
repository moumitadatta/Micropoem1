<!DOCTYPE html>
<html lang="en">
@extends('admin.layout.app')

@section('content')
<main id="main" class="main">
<section>
    <div class="container">
        <h1>Edit Posts</h1>

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
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" required class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->post_category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
            <label for="category_id">Sub-Category:</label>
            <select name="category_id" required class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->post_category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            </div>

           

                <!-- Background Image Dropdown -->
            <div class="form-group">
                <label for="background_image">Background Image</label>
                <select id="background_image" name="post_background_image_id" class="form-control">
                    <option value="">Select Background Image</option>
                    @foreach($backgroundImages as $backgroundImage)
                      
                    
                        <option value="{{ $backgroundImage->id }}" {{ $post->post_background_image_id == $backgroundImage->id ? 'selected' : '' }}>
                    @endforeach
                </select>
            </div>
            <br>
             <!-- Background Image Dropdown -->
             <div class="form-group">
                <label for="background_image">Post file</label>
                <select id="post_file_id" name="post_file_id" class="form-control">
                    <option value="">Select Post File</option>
                    @foreach($postfiles as $postfile)
                      
                        <option value="{{ $postfile->id }}" {{ $post->post_file_id == $postfile->id ? 'selected' : '' }}>
                    @endforeach
                </select>
            </div>
           <br>
            <div class="form-group">
                <label for="name">Post Name:</label>
                <input type="text" name="post_name" value="{{ $post->post_name }}" id="post_name" class="form-control" required>
            </div>
           <br>
            <div class="form-group">
                <label for="name">Post Content:</label>
                <textarea name="post_content" id="post_content" class="form-control" required>{{ $post->post_content }}</textarea>
            </div>
           <br>
            <div class="form-group">
                <label for="name">Post Point:</label>
                <textarea name="point" id="point"  class="form-control" required>{{ $post->point }}</textarea>
            </div>

            <button type="submit" class="btn btn-success mt-3">Update </button>
        </form>
    </div>
    </section>
</main>
    @endsection

