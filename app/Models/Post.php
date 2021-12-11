<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['Jewelery_ID','Jewelery_Title','Jewelery_Image','Price','Color','Gender','Filter'];
}
