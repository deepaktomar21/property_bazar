<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyRequire extends Model
{
    use HasFactory;
    protected $fillable = [

        'require_description',

    ];
}
