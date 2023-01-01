<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Redirect;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\TaskList;
use App\Models\User;
use Validator;


class TaskController extends Controller
{

    //--This method call to show index on(resources\views\Task\index.blade.php)
    function index(){
        return view('Task.index');
    }


    //--This method call to show Task list  on(resources\views\Task\taskSheadule.blade.php)
    //--DB::table('task_lists') <- Using this no need to create a modal for table ,we can 
    //--directly access table column

    function taskShedule(){
        $tasks = DB::table('task_lists')
        ->select('task_lists.TaskDescription',
        'task_lists.TaskName',
        'users.name',
        'users.name',
        'task_lists.TaskId',
        'task_lists.factory',
        'task_lists.Status',
        'task_lists.Progress',
        'task_lists.Deadline',
        'task_lists.supervicer')
        ->join('users', 'users.id', '=', 'task_lists.createdUser')
        ->where('task_lists.createdUser', (int)Auth::user()->id)
        ->orderBy('task_lists.created_at','DESC')
        ->get();

        $supervicers = DB::table('users')
        ->select('users.name','users.id')
        ->where('users.Position', "superviser")
        ->get();


        return view('Task.taskSheadule',compact('tasks','supervicers'));
    //--with compact method we can pass table data the view

    }


    function deleteTask(Request $request){
        DB::table('task_lists')->where('TaskId', $request->taskId)->delete();
        return redirect('Task-shedule')->with('msg','successfully Deleted');

        //--with method is a tempory session ,when the same page  refresh (after first time)
        //--it will distroyrd
    }
    
    

    function changeStstus(Request $request){

        //Request $request -- used to collect  data comes from UI inside a form
        $TaskList = DB::table('task_lists')->select('Status')->where('TaskId', $request->taskId)->first();
       
        if($TaskList->Status == 1) {
             DB::table('task_lists') 
            ->where('TaskId', $request->taskId)
            ->update(['status' =>0]); 

        }else{
            DB::table('task_lists') 
            ->where('TaskId', $request->taskId)
            ->update(['status' =>1]);  
        }

        return redirect('Task-shedule')->with('msg','successfully Switched');
    }



    function taskSheadule(Request $request){
        
        //--this method use to validate all the inputs
        $request->validate([
            'taskName' => 'required',
            'taskDescription' => 'required',
            'factory' => 'required',
            'supervicer' => 'required',
            'deadLine' => 'required',
        ]);

        // TaskList <-modal like a bridge table and controller
        TaskList::create([
            'taskName' => $request->taskName,
            'taskDescription' => $request->taskDescription,
            'factory' => $request->factory,
            'supervicer' => $request->supervicer,
            'deadLine' => $request->deadLine,
            'Status'=>1,
            'Progress'=>0,
            'createdUser'=>$request->createdUser
        ]);

        return redirect('Task-shedule')->with('msg','successfully created');
        // -- redirect() use to redirect for a some route define on web.php
    }



    function TaskMonitor(){
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
        ->orderBy('task_lists.created_at','DESC')
        ->get();

        return view('Task.TaskMonitor',compact('tasks'));
    }


    
}
