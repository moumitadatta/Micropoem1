@extends('admin.layout.app')

@section('content')
   <main id="main" class="main">
     <section>
        <div class="container">
            <h1>Post Background Image</h1>

            {{-- Add a new category button --}}
            <a href="{{ route('post-background-images.create') }}" class="btn btn-primary mb-3">Add New Backgrounfd Image</a>

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
                        <img src="{{ asset('assets/uploads/background_images/' . $backgroundImage->image) }}" alt="{{ $backgroundImage->name }}" width="100">
                        
                    </td>
                    <td>
                        <a href="{{ route('post-background-images.edit', $backgroundImage->id) }}">Edit</a>
                        <form action="{{ route('post-background-images.destroy', $backgroundImage->id) }}" method="POST" style="display: inline-block;">
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
