<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;
      // Specify the table name
    protected $table = 'post_category';

    protected $fillable = [
        'name',
        'image',
    ];

    public function subcategories()
    {
        return $this->hasMany(PostSubcategory::class);
    }
}
