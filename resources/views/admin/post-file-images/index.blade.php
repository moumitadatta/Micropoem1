@extends('admin.layout.app')

@section('content')
   <main id="main" class="main">
     <section>
        <div class="container">
            <h1>Post File</h1>

            {{-- Add a new category button --}}
            <a href="{{ route('post-file-images.create') }}" class="btn btn-primary mb-3">Add Post File</a>

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
                @foreach ($backgroundImages as $backgroundImage)
                <tr>
                    <td>{{ $backgroundImage->name }}</td>
                    <td>
                        <!-- <img src="{{ asset('assets/uploads/post-file-images/' . $backgroundImage->image) }}" alt="{{ $backgroundImage->name }}" width="100"> -->

                        <video width="320" height="240" controls>
                            <source src="{{ asset('assets/uploads/post-file-images/' . $backgroundImage->image) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        
                    </td>
                    <td>
                        <a href="{{ route('post-file-images.edit', $backgroundImage->id) }}">Edit</a>
                        <form action="{{ route('post-file-images.destroy', $backgroundImage->id) }}" method="POST" style="display: inline-block;">
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
