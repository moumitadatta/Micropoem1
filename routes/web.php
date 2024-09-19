<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostSubCategoryController;
use App\Http\Controllers\PostBackgroundImageController;
use App\Http\Controllers\PostFileController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});


Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('admin/dashboard', [HomeController::class, 'admindashboard'])->name('admin.dashboard');

   // Route for listing categories
 Route::get('/categories/index', [PostCategoryController::class, 'index'])->name('categories.index');
 Route::get('/categories/create', [PostCategoryController::class, 'create'])->name('categories.create');
 Route::post('/categories/store', [PostCategoryController::class, 'store'])->name('categories.store');
 Route::get('/categories/{category}/edit', [PostCategoryController::class, 'edit'])->name('categories.edit');
 Route::put('/categories/{category}', [PostCategoryController::class, 'update'])->name('categories.update');

 Route::post('/categories/destroy/{id}', [PostCategoryController::class, 'destroy'])->name('categories.destroy');

 // Route for listing sub categories
Route::get('/sub-categories/index', [PostSubCategoryController::class, 'index'])->name('sub-categories.index');
Route::get('/sub-categories/create', [PostSubCategoryController::class, 'create'])->name('sub-categories.create');
Route::post('/sub-categories/store', [PostSubCategoryController::class, 'store'])->name('sub-categories.store');
Route::get('/sub-categories/{category}/edit', [PostSubCategoryController::class, 'edit'])->name('sub-categories.edit');
Route::put('/sub-categories/{category}', [PostSubCategoryController::class, 'update'])->name('sub-categories.update');

Route::post('/sub-categories/destroy/{id}', [PostSubCategoryController::class, 'destroy'])->name('sub-categories.destroy');

}); 
// route for listing background images
Route::resource('post-background-images', PostBackgroundImageController::class);

  //for post file
  Route::resource('post-file-images', PostFileController::class);

Route::middleware(['auth', 'role:manager'])->group(function(){
    Route::get('manager/dashboard', [HomeController::class, 'managerdashboard'])->name('manager.dashboard');
});

 
require __DIR__.'/auth.php';
