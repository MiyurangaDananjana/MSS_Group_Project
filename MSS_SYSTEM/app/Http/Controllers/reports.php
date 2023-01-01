<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Redirect;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\category;
use App\Models\item;
use App\Models\User;
use App\Models\inventoryBehaviour;
use Validator;


class reports extends Controller
{
    function reportAccess(){

        $items = DB::table('items')
        ->select(
        'items.itemId',
        'items.Name'
        )
        ->get();

        return view('reportAccess.index',compact('items'));
    }
}
