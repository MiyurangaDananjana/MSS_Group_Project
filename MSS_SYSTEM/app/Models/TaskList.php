<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    use HasFactory;
    protected $fillable = ['taskName','taskDescription','factory','supervicer','deadLine','Status','Progress','createdUser'];

}
