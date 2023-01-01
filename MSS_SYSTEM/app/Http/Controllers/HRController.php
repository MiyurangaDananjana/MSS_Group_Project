<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use App\Models\category;
use App\Models\User;
use App\Models\AccessLevels;
use App\Models\inventoryBehaviour;
use Validator;

class HRController extends Controller
{
   function hr_module(){
    return view('HR-Module.index');
   }


   function hr_users(){
        $users = DB::table('users')->select('id',
                                            'name',
                                            'Address',
                                            'Position',
                                            'Phone',
                                            'email',
                                            'created_at' )->get();
        return view('HR-Module.usersList',compact('users'));
   }


   function editUser(Request $request){
        $users = DB::table('users')
        ->select('id',
                 'name',
                 'Address',
                 'Position',
                 'Phone',
                 'email',
                 'created_at')
        ->where('id', $request->userId)->first();

        $usersAccesslevels = DB::table('access_levels')
        ->select('Finanace_Module',
                 'purchasingModule',
                 'factoryModule',
                 'Reports')
        ->where('user_id', $request->userId)->first();
        
        $msg = 'not-set';
        return view('HR-Module.edit',compact('users','usersAccesslevels','msg'));

   }


   function hr_new_user_create(Request $request){


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'Address' => $request->address,
            'Phone' => $request->Phone,
            'Position' => $request->position,
            'password' => Hash::make($request->password),
        ]);

        $accessLecels = AccessLevels::create([

            'user_id' =>(int)Auth::user()->id,
            'Finanace_Module'=>$request->has('Finanace_Module') ? 1 :0,
            'purchasingModule'=>$request->has('purchasingModule') ? 1 :0,
            'factoryModule'=>$request->has('factoryModule') ? 1 :0,
            'Reports'=>$request->has('Reports') ? 1 :0
        ]);

        return redirect('hr_create')->with('msg','successfully Added');

    }

    function hr_new_user_edit(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        $user = User::where("id",$request->userId)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'Address' => $request->address,
            'Phone' => $request->Phone,
            'Position' => $request->position,
        ]);

        $accessLecels = AccessLevels::where("user_id",$request->userId)
        ->update([
            'Finanace_Module'=>$request->has('Finanace_Module') ? 1 :0,
            'purchasingModule'=>$request->has('purchasingModule') ? 1 :0,
            'factoryModule'=>$request->has('factoryModule') ? 1 :0,
            'Reports'=>$request->has('Reports') ? 1 :0
        ]);


        $users = DB::table('users')
        ->select('id',
                 'name',
                 'Address',
                 'Position',
                 'Phone',
                 'email',
                 'created_at')
        ->where('id', $request->userId)->first();

        $usersAccesslevels = DB::table('access_levels')
        ->select('Finanace_Module',
                 'purchasingModule',
                 'factoryModule',
                 'Reports')
        ->where('user_id', $request->userId)->first();

        $msg = 'successfully updated';
        return view('HR-Module.edit',compact('users','usersAccesslevels','msg'));
    }

   function hr_create(){
     return view('HR-Module.createUser');
   }
}
