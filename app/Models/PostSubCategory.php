<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostSubCategory extends Model
{
    use HasFactory;
      // Specify the table name
      protected $table = 'post_sub_categories';

      protected $fillable = [
          'name',
          'image',
          'category_id'
      ];

      public function category()
      {
          return $this->belongsTo(PostCategory::class);
      }
}
