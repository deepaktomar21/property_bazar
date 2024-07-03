<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
    protected $fillable = [
        'location',
        'property_type',
        'price',
        'area_sqrtFit',
        'user_name',
        'membership_id',
        'contact_number',
        'description',
    ];
}
