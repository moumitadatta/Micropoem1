<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\PostCategory;
use App\Models\PostSubCategory;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = PostCategory::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{

    //return $request;
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $category = new PostCategory;
    $category->name = $validated['name'];

    
    $file = $request->file('image');
    $fileName = time() . "_" . $file->getClientOriginalName();
    
        // Define the upload location
    $uploadLocation = public_path('assets/uploads/categories');
    $path = 'assets/uploads/categories'.$fileName;
        // Move the file to the specified location
     $file->move($uploadLocation, $fileName);
     if ($request->hasFile('image')) {
        
        $category->image = $fileName;
    }


    $category->save();

    return redirect()->route('categories.index')->with('success', 'Category created successfully.');
}

   
    public function edit(PostCategory $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, PostCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category->name = $validated['name'];

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('categories', 'public');
        //     $category->image = $imagePath;
        // }

        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . "_" . $file->getClientOriginalName();
        
            // Define the upload location
            $uploadLocation = public_path('assets/uploads/categories');
        
            // Move the file to the specified location
            $file->move($uploadLocation, $fileName);
            $category->image = $fileName;
        }
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(PostCategory $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
