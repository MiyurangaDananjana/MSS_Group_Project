<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Redirect;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\TaskList;
use App\Models\expences;
use App\Models\income;
use App\Models\User;
use Validator;
use PDF;


class finanace extends Controller
{
    function index(){
        return view('finance.index');
    }

    function income(){
        $income = DB::table('incomes')
        ->select(
        'incomes.incomeId',
        'users.name',
        'incomes.Amount',
        'incomes.Description',
        'incomes.created_at')
        ->join('users', 'users.id', '=', 'incomes.user_id')
       // ->where('task_lists.createdUser', (int)Auth::user()->id)
        ->orderBy('incomes.created_at','DESC')
        ->get();

        return view('finance.income',compact('income'));
    }

    function expence(){

        $expences = DB::table('expences')
        ->select(
        'expences.excencesId',
        'users.name',
        'expences.Amount',
        'expences.Description',
        'expences.created_at')
        ->join('users', 'users.id', '=', 'expences.user_id')
       // ->where('task_lists.createdUser', (int)Auth::user()->id)
        ->orderBy('expences.created_at','DESC')
        ->get();

        return view('finance.expences',compact('expences'));
    }

    function incomeExpencesSave(Request $request){

            $request->validate([
                'amount' => 'required',
                'description' => 'required'
            ]);

            if($request->type=="expences"){
                expences::create([
                    'Amount' => $request->amount,
                    'Description' => $request->description,
                    'user_id'=>(int)Auth::user()->id
                ]);
                return redirect('expence')->with('msg','successfully added');
            }else{

                income::create([
                    'Amount' => $request->amount,
                    'Description' => $request->description,
                    'user_id'=>(int)Auth::user()->id
                ]);
                return redirect('income')->with('msg','successfully added');
            }
           
    }

    function deleteIncomExpences(Request $request){

        if($request->type=="expences"){
            DB::table('expences')->where('excencesId', $request->excencesId)->delete();
            return redirect('expence')->with('msg','successfully deleted');
        }else{
            DB::table('incomes')->where('incomeId', $request->incomeId)->delete();
            return redirect('income')->with('msg','successfully deleted');
        }
    }


    function editIncomExpences(Request $request){

        if($request->type=="expencesAmount"){
            DB::table('expences') 
            ->where('excencesId', $request->excencesId)
            ->update(['Amount' =>$request->amount]); 
            return redirect('expence')->with('msg','successfully deleted');
        }
        
        else if($request->type=="incomeAmount"){
            DB::table('incomes') 
            ->where('incomeId', $request->incomeId)
            ->update(['Amount' =>$request->amount]); 
            
            return redirect('income')->with('msg','successfully deleted');
        }

        else if($request->type=="expencesDescription"){
            DB::table('expences') 
            ->where('excencesId', $request->excencesId)
            ->update(['Description' =>$request->description]); 
            return redirect('expence')->with('msg','successfully Changed');
        }
        
        else if($request->type=="incomeDescription"){
            DB::table('incomes') 
            ->where('incomeId', $request->incomeId)
            ->update(['Description' =>$request->description]); 
            
            return redirect('income')->with('msg','successfully Changed');
        }
    }


    function incomeExpencesReoprt(Request $request){

        if($request->type=="expences"){

            $expences = DB::table('expences')
            ->select(
            'expences.excencesId',
            'users.name',
            'expences.Amount',
            'expences.Description',
            'expences.created_at')
            ->join('users', 'users.id', '=', 'expences.user_id')
            ->whereBetween('expences.created_at', [$request->strDate, $request->endDate])
            ->orderBy('expences.created_at','DESC')
            ->get();

            $data = [
                'title' => 'Welcome to ItSolutionStuff.com',
                'dateStr' => $request->strDate,
                'dateEnd' => $request->endDate,
                'expences' => $expences
            ];


            $pdf = PDF::loadView('report.expencesReport',$data)->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled'=>true]);
            return $pdf->download('expencesReport.pdf');

        }else{

             $income = DB::table('incomes')
             ->select(
            'incomes.incomeId',
            'users.name',
            'incomes.Amount',
            'incomes.Description',
            'incomes.created_at')
            ->join('users', 'users.id', '=', 'incomes.user_id')
            ->orderBy('incomes.created_at','DESC')
            ->get();


            $data = [
                'title' => 'Welcome to ItSolutionStuff.com',
                'dateStr' => $request->strDate,
                'dateEnd' => $request->endDate,
                'expences' => $income
            ];


            $pdf = PDF::loadView('report.incomeReport',$data)->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled'=>true]);
            return $pdf->download('incomeReport.pdf');
        }
        

    }


    
}
