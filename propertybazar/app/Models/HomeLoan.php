<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeLoan extends Model
{
    use HasFactory;
    protected $fillable = ['loan_description', 'email', 'amount', 'term'];

}
