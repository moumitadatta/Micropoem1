<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostSubCategory;
use App\Models\PostBackgroundImage;
use App\Models\PostFile;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = PostCategory::all();
        $subCategories = PostSubCategory::with('category')->get();
        $backgroundImages = PostBackgroundImage::all();
        $postfiles = PostFile::all(); 
         
        return view('admin.posts.create', compact('categories', 'backgroundImages','postfiles'));

    }

    public function store(Request $request)
    {

        return $request;
        $request->validate([ 
            'post_name' => 'required|string|max:255',
            'post_content' => 'required|string',
            'post_category_id' => 'required|exists:post_category_id,id',
            'post_sub_category_id' => 'required|exists:post_sub_category_id,id',
            'post_background_id' => 'required',
            'post_file_id' => 'required',
            'post_content' => 'required',
            'point' => 'required'
            // Add other validations as necessary
        ]);

        Post::create($request->all());
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'post_name' => 'required|string|max:255',
            'post_content' => 'required|string',
            'post_category_id' => 'required|exists:post_category_id,id',
            'post_sub_category_id' => 'required|exists:post_sub_category_id,id',
            'post_background_id' => 'required',
            'post_file_id' => 'required',
            'post_content' => 'required',
            'point' => 'required'
        ]);

        $post->update($request->all());
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    public function getSubcategories($categoryId)
    {
        $subcategories = PostSubcategory::where('category_id', $categoryId)->get();
        return response()->json($subcategories);
    }
}
