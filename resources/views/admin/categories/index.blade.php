@extends('admin.layout.app')

@section('content')
   <main id="main" class="main">
     <section>
        <div class="container">
            <h1>Categories</h1>

            {{-- Add a new category button --}}
            <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add New Category</a>

            {{-- Display success message --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Display the list of categories --}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Actions</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if ($category->image)
                                    <img src="{{ asset('assets/uploads/categories/' . $category->image) }}" width="50" height="50" alt="Category Image">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POSt" style="display:inline-block;">
                                    @csrf
                                 
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <main>
@endsection
