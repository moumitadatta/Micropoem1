<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostBackgroundImage extends Model
{
    use HasFactory;
    // Specify the table name
    protected $table = 'post_background_images';

    protected $fillable = ['name', 'image'];
}
