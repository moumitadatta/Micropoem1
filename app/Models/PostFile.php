<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostFile extends Model
{
    use HasFactory;
      // Specify the table name
      protected $table = 'post_file';

      protected $fillable = [
          'name',
          'image',
      ];
}
