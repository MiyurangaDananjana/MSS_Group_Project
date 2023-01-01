<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessLevels extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','Finanace_Module','purchasingModule','factoryModule','Reports'];
}
