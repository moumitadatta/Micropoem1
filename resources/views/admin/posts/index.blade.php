@extends('admin.layout.app')

@section('content')
   <main id="main" class="main">
     <section>
        <div class="container">
            <h1>Categories</h1>

            {{-- Add a new posts button --}}
            <a href="{{ route('posts.create') }}"" class="btn btn-primary mb-3">Add New posts</a>

            {{-- Display success message --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Display the list of categories --}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Posts Name</th>
                        <th>Actions</th> 
                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $post) 
                <tr>
                    <td><a href="{{ route('posts.show', $post) }}">{{ $post->post_name }}</a></td>
                    
                    <td>
                          @if ($subcategory->image) 
                             <img src="{{ asset('assets/uploads/subcategories/' . $subcategory->image) }}" width="50" height="50" alt="SubCategory Image">
                          @endif
                    </td>
                  

                    <td>
                                <a href="{{ route('sub-categories.edit', $subcategory->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
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
