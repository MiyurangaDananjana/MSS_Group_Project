<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Http\Request;

use App\Models\TaskList;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class kanbancardTool extends Controller
{
    function kanban(){

        $tasks = DB::table('task_lists')
        ->select('task_lists.TaskDescription',
        'task_lists.TaskName',
        'users.name',
        'task_lists.TaskId',
        'task_lists.factory',
        'task_lists.Status',
        'task_lists.Progress',
        'task_lists.Deadline',
        'task_lists.created_at',
        'task_lists.supervicer')
        ->join('users', 'users.id', '=', 'task_lists.createdUser')
        ->where('task_lists.createdUser', (int)Auth::user()->id)
        ->where('task_lists.Status', 1)
        ->orderBy('task_lists.created_at','DESC')
        ->get();

        return view('kanbancard.index',compact('tasks'));
    }

    function kanbanCards(){

        $tasks = DB::table('task_lists')
        ->select('task_lists.TaskDescription',
        'task_lists.TaskName',
        'users.name',
        'task_lists.TaskId',
        'task_lists.factory',
        'task_lists.Status',
        'task_lists.Progress',
        'task_lists.Deadline',
        'task_lists.created_at',
        'task_lists.supervicer')
        ->join('users', 'users.id', '=', 'task_lists.createdUser')
        ->where('task_lists.createdUser', (int)Auth::user()->id)
        ->where('task_lists.Status', 1)
        ->orderBy('task_lists.created_at','DESC')
        ->get();

        return  $tasks;
    }

    function saveprogress(Request $request){
        DB::table('task_lists') 
        ->where('TaskId', $request->taskID)
        ->update(['Progress' =>$request->val]); 
    }




}
