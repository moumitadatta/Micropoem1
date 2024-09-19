<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostFile;

class PostFileController extends Controller
{
    public function index()
    {
        $backgroundImages = PostFile::all();
        return view('admin.post-file-images.index', compact('backgroundImages')); 
    }

    public function create()
    {
        return view('admin.post-file-images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|mimes:mp4,avi,mov|max:20000', // 20MB limit
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
           // $imagePath = $request->file('image')->store('assets/uploads/post-file-images', 'public');

            $file = $request->file('image');
            $fileName = time() . "_" . $file->getClientOriginalName();
        
            // Define the upload location
            $uploadLocation = public_path('assets/uploads/post-file-images');
        
            // Move the file to the specified location
            $file->move($uploadLocation, $fileName);
           
        }

        PostFile::create([
            'name' => $request->name,
            'image' => $fileName,
        ]);

        return redirect()->route('post-file-images.index')->with('success', 'Background Image uploaded successfully');
    }

    public function edit($id)
    {
        $backgroundImage = PostFile::findOrFail($id);
        return view('admin.post-file-images.edit', compact('backgroundImage'));
    }

    public function update(Request $request, $id)
    {
        $backgroundImage = PostFile::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|mimes:mp4,avi,mov|max:20000', // 20MB limit
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image
            // if ($backgroundImage->image) {
            // Storage::disk('public/assets/uploads/post-file-images')->delete($backgroundImage->image);
            // }

            // Upload new image
            $imagePath = $request->file('image')->store('assets/uploads/post-file-images', 'public');


            $file = $request->file('image');
            $fileName = time() . "_" . $file->getClientOriginalName();
        
            // Define the upload location
            $uploadLocation = public_path('assets/uploads/post-file-images');
        
            // Move the file to the specified location
            $file->move($uploadLocation, $fileName);
            $backgroundImage->image = $fileName;
        }

        $backgroundImage->name = $request->name;
        $backgroundImage->save();

        return redirect()->route('post-file-images.index')->with('success', 'Background Image updated successfully');
    }

    public function destroy($id)
    {
        $backgroundImage = PostFile::findOrFail($id);

        // Delete the image file
        Storage::disk('public')->delete($backgroundImage->image);

        $backgroundImage->delete();

        return redirect()->route('post-file-images.index')->with('success', 'Background Image deleted successfully');
    }
}
