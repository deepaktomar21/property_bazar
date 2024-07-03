<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{
    use HasFactory;
    protected $fillable = [
        'broker_name',
        'membership_id',
        'location',
        'contact_number',
        'deals_description',
    ];
}
