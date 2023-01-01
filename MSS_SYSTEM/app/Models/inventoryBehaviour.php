<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventoryBehaviour extends Model
{
    use HasFactory;
    protected $fillable = ['itemId','Method','Description','quantity'];
}
