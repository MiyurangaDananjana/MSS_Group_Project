<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expences extends Model
{
    use HasFactory;
    protected $fillable = ['Amount','Description','user_id'];
}
