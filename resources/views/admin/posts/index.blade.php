@extends('admin.layout.app')

@section('content')
   <main id="main" class="main">
     <section>
        <div class="container">
            <h1>Posts</h1>

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
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                
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
