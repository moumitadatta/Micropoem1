<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostCategory;
use App\Models\PostSubCategory;
use App\Models\PostBackgroundImage;
use App\Models\PostFile;

class Post extends Model
{
    

    use HasFactory;
    // Specify the table name
    protected $table = 'posts';

    protected $fillable = [
        'post_category_id',
        'post_sub_category_id',
        'post_background_id',
        'post_file_id',
        'user_id',
        'point',
        'post_content',
        'post_name',
        'status',
    ];

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(PostCategory::class);
    }

    // Relationship with Subcategory
    public function subcategory()
    {
        return $this->belongsTo(PostSubcategory::class);
    }

    // Relationship with BackgroundImage
    public function backgroundImage()
    {
        return $this->belongsTo(PostBackgroundImage::class);
    }

    // Relationship with postfile
    public function postfile()
    {
        return $this->belongsTo(PostFile::class);
    }
}
