<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Redirect;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\TaskList;
use App\Models\User;
use Validator;


class TaskController extends Controller
{
    function index(){
        return view('Task.index');
    }


    function taskShedule(){

        $tasks = DB::table('task_lists')
        ->select('task_lists.TaskDescription',
        'task_lists.TaskName',
        'users.name',
        'task_lists.TaskId',
        'task_lists.factory',
        'task_lists.Status',
        'task_lists.Progress',
        'task_lists.Deadline',
        'task_lists.supervicer')
        ->join('users', 'users.id', '=', 'task_lists.createdUser')
        //->where('countries.country_name', $country)
        ->orderBy('task_lists.created_at','DESC')
        ->get();


       

        return view('Task.taskSheadule',compact('tasks'));

    }


    function deleteTask(Request $request){
        DB::table('task_lists')->where('TaskId', $request->taskId)->delete();
        return redirect('Task-shedule')->with('msg','successfully Deleted');
    }
    
    

    function changeStstus(Request $request){
        
        $TaskList = TaskList::select('Status')->where('TaskId', $request->taskId)->first();
       
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

        $request->validate([
            'taskName' => 'required',
            'taskDescription' => 'required',
            'factory' => 'required',
            'supervicer' => 'required',
            'deadLine' => 'required',
            
        ]);

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
        //->where('countries.country_name', $country)
        ->orderBy('task_lists.created_at','DESC')
        ->get();

        return view('Task.TaskMonitor',compact('tasks'));
    }
}
