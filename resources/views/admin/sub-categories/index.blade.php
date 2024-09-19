@extends('admin.layout.app')

@section('content')
   <main id="main" class="main">
     <section>
        <div class="container">
            <h1>Categories</h1>

            {{-- Add a new category button --}}
            <a href="{{ route('sub-categories.create') }}" class="btn btn-primary mb-3">Add New SubCategory</a>

            {{-- Display success message --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Display the list of categories --}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sub Category Name</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Actions</th> 
                    </tr>
                </thead>
                <tbody>
            @foreach ($subCategories as $subcategory)
                <tr>
                    <td>{{ $subcategory->name }}</td>
                    <td>{{ $subcategory->category->name }}</td>
                    <td>
                          @if ($subcategory->image)
                             <img src="{{ asset('assets/uploads/subcategories/' . $subcategory->image) }}" width="50" height="50" alt="SubCategory Image">
                          @endif
                    </td>
                    <!-- <td>
                        <a href="{{ route('sub-categories.edit', $subcategory->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('sub-categories.destroy', $subcategory->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        
                        </form>

                        
                    </td> -->

                    <td>
                                <a href="{{ route('sub-categories.edit', $subcategory->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                <form action="{{ route('sub-categories.destroy', $subcategory->id) }} style="display:inline-block;" method="POST">
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
