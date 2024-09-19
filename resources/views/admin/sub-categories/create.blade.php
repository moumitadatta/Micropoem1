@extends('admin.layout.app')

@section('content')
<main id="main" class="main">
<section>
    <div class="container">
        <h1>Add New Sub Category</h1>
        
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

        {{-- Form for creating a category --}}
        <form action="{{ route('sub-categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

           <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            </div>

            <div class="form-group">
                <label for="name">SubCategory Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="image">SubCategory Image:</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Add Sub Category</button>
        </form>
    </div>
</section>
</main>
 @endsection