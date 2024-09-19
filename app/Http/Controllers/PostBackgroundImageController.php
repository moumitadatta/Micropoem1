<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostBackgroundImage;

use Illuminate\Support\Facades\Storage;

class PostBackgroundImageController extends Controller
{
    public function index()
    {
        $backgroundImages = PostBackgroundImage::all();
        return view('admin.post-background-images.index', compact('backgroundImages')); 
    }

    public function create()
    {
        return view('admin.post-background-images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
           // $imagePath = $request->file('image')->store('assets/uploads/background_images', 'public');

            $file = $request->file('image');
            $fileName = time() . "_" . $file->getClientOriginalName();
        
            // Define the upload location
            $uploadLocation = public_path('assets/uploads/background_images');
        
            // Move the file to the specified location
            $file->move($uploadLocation, $fileName);
           
        }

        PostBackgroundImage::create([
            'name' => $request->name,
            'image' => $fileName,
        ]);

        return redirect()->route('post-background-images.index')->with('success', 'Background Image uploaded successfully');
    }

    public function edit($id)
    {
        $backgroundImage = PostBackgroundImage::findOrFail($id);
        return view('admin.post-background-images.edit', compact('backgroundImage'));
    }

    public function update(Request $request, $id)
    {
        $backgroundImage = PostBackgroundImage::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image
            // if ($backgroundImage->image) {
            // Storage::disk('public/assets/uploads/background_images')->delete($backgroundImage->image);
            // }

            // Upload new image
            $imagePath = $request->file('image')->store('assets/uploads/background_images', 'public');


            $file = $request->file('image');
            $fileName = time() . "_" . $file->getClientOriginalName();
        
            // Define the upload location
            $uploadLocation = public_path('assets/uploads/background_images');
        
            // Move the file to the specified location
            $file->move($uploadLocation, $fileName);
            $backgroundImage->image = $fileName;
        }

        $backgroundImage->name = $request->name;
        $backgroundImage->save();

        return redirect()->route('post-background-images.index')->with('success', 'Background Image updated successfully');
    }

    public function destroy($id)
    {
        $backgroundImage = PostBackgroundImage::findOrFail($id);

        // Delete the image file
        Storage::disk('public')->delete($backgroundImage->image);

        $backgroundImage->delete();

        return redirect()->route('post-background-images.index')->with('success', 'Background Image deleted successfully');
    }
}
