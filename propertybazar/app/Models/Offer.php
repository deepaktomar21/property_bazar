<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
    'user_id',
    'description',
    'images',
    'want_to_list',
    'service_type',
    'property_type',
    'city',
    'zone',
    'location',
    'price',
    'configuration',
    'furnished_type',
    'sqft',
];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}