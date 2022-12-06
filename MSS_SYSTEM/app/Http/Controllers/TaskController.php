<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

use Validator;

class TaskController extends Controller
{
    function index(){
        return view('Task.index');
    }


    function taskShedule(){
        return view('Task.taskSheadule');
    }
}
