<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Builder extends Model
{
    use HasFactory;
    protected $fillable = [
        'builder_name',
        'membership_id',
        'rera_no',
        'city',
        'zones',
        'area',
        'company',
        'working_area',
        'deal_in',
        'email',
        'phone',
        'end_date',
    ];
}
