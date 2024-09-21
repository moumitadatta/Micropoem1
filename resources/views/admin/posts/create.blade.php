@extends('admin.layout.app')

@section('content')
<main id="main" class="main">
<section>
    <div class="container">
        <h1>Add New posts</h1>
        
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
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

           <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="post_category_id"  id="category" class="form-control" required >
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            </div>
             <br>
                <!-- Subcategory Dropdown -->
            <div class="form-group">
            <label for="">SubCategory:</label>
            <select id="subcategory" name="post_subcategory_id" class="form-control" class="form-control">
                <option value="">Select Subcategory</option> 
                @foreach ($subCategories as $sub)
                    <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                @endforeach
            </select>
            </div>
            <br>
                <!-- Background Image Dropdown -->
            <div class="form-group">
                <label for="background_image">Background Image</label>
                <select id="background_image" name="post_background_image_id" class="form-control">
                    <option value="">Select Background Image</option>
                    @foreach($backgroundImages as $backgroundImage)
                        <option value="{{ $backgroundImage->id }}">{{ $backgroundImage->image }}</option>
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
                        <option value="{{ $postfile->id }}">{{ $postfile->image }}</option>
                    @endforeach
                </select>
            </div>
           <br>
            <div class="form-group">
                <label for="name">Post Name:</label>
                <input type="text" name="post_name" id="post_name" class="form-control" required>
            </div>
           <br>
            <div class="form-group">
                <label for="name">Post Content:</label>
                <textarea name="post_content" id="post_content" class="form-control" required></textarea>
            </div>
           <br>
            <div class="form-group">
                <label for="name">Post Point:</label>
                <textarea name="point" id="point" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Add</button>
        </form>
    </div>
</section>
</main>
 @endsection
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script type="text/javascript">
    function updateSubcategories(categoryId) {

    console.log(categoryId);
        let subcategoryDropdown = $('#subcategory');
        subcategoryDropdown.empty(); // Clear previous options
        subcategoryDropdown.append('<option value="">Select Subcategory</option>'); // Default option

        if (categoryId) {
            $.ajax({
                url: '/get-subcategories/' + categoryId,
                type: 'GET',
                success: function(data) {
                    if (data.length > 0) {
                        data.forEach(function(subcategory) {
                            subcategoryDropdown.append(
                                '<option value="' + subcategory.id + '">' + subcategory.name + '</option>'
                            );
                        });
                    } else {
                        subcategoryDropdown.append('<option value="">No Subcategories Available</option>');
                    }
                },
                error: function() {
                    alert('Error fetching subcategories');
                }
            });
        }
    }
</script>