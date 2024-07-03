<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Select extends Model
{
    use HasFactory;
     protected $fillable = [
        'name', 'membership_id', 'rera_no', 'city', 'zones', 'area', 'company', 'working_area', 'deal_in', 'email', 'phone', 'end_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'membership_id, name');
    }
}
