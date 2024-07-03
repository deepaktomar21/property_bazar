<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'location',
        'property_type',
        'price',
        'area',
        'description',
        'image',
    ];
}
