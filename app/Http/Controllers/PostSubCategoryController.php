<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\PostCategory;
use App\Models\PostSubCategory;



class PostSubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = PostSubCategory::with('category')->get();

       
        return view('admin.sub-categories.index', compact('subCategories'));
    }

    public function create()
    {
        $categories = PostCategory::all(); // Get all categories for dropdown
        return view('admin.sub-categories.create', compact('categories'));
    }

    public function store(Request $request)
    {

    
        //return $request;
        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:post_category,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('uploads/sub-categories', 'public');
        // } else {
        //     $imagePath = null;
        // }

        
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $fileName = time() . "_" . $file->getClientOriginalName();
            
                // Define the upload location
            $uploadLocation = public_path('assets/uploads/subcategories');
            $path = 'assets/uploads/subcategories'.$fileName; 
                // Move the file to the specified location
            $file->move($uploadLocation, $fileName);
            
            $image = $fileName;

         
        }else{
            $image = null;
        }
    

        
        $subcategory = new PostSubCategory;
        $subcategory->name =$request->name;
        $subcategory->category_id =$request->category_id;
        $subcategory->image =$request->image;

      
        $subcategory->save();
        
        // PostSubCategory::create([
        //     'name' => $request->name, 
        //     'category_id' => $request->category_id,
        //     'image' => $image,
        // ]);

        return redirect()->route('sub-categories.index')->with('success', 'Subcategory created successfully.');
    }

    public function edit($id)
    {
        $subCategory = PostSubCategory::findOrFail($id);
        $categories = PostCategory::all(); // For the dropdown
        return view('admin.sub-categories.edit', compact('subCategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $subCategory = PostSubCategory::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:post_category,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($subCategory->image) {
                \Storage::delete('public/assets/uploads/subcategories' . $subCategory->image);
            }
            //$imagePath = $request->file('image')->store('uploads/sub-categories', 'public');

            $file = $request->file('image');
            $fileName = time() . "_" . $file->getClientOriginalName();
            
                // Define the upload location
            $uploadLocation = public_path('assets/uploads/subcategories');
            $path = 'assets/uploads/categories'.$fileName;
                // Move the file to the specified location
            $file->move($uploadLocation, $fileName);
            
            $image = $fileName;
        } else {
           // $imagePath = $subCategory->image;
           $image = $subCategory->image;

        }

        $subCategory->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $image,
        ]);

        return redirect()->route('sub-categories.index')->with('success', 'Subcategory updated successfully.');
    }

    public function destroy($id)
    {
        $subCategory = PostSubCategory::findOrFail($id);

        if ($subCategory->image) {
            \Storage::delete('public/assets/uploads/subcategories' . $subCategory->image);
        }

        $subCategory->delete();

        return redirect()->route('sub-categories.index')->with('success', 'Subcategory deleted successfully.');
    }
}
