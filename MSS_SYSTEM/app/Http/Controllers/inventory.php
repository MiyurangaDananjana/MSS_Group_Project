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
use Validator;


class inventory extends Controller
{
    function Inventory(){
        return view('Inventory.index');
    }

    function ItemIndex(){
        $category = DB::table('categories')
        ->select(
        'categories.categoriesId',
        'categories.Name')
        ->get();

        $items = DB::table('items')
        ->select(
        'items.itemId',
        'items.Name',
        'items.category_id',
        'items.ItemPrice',
        'items.ReorderLevel',
        'items.Quantity',
        )
        ->get();


        return view('Inventory.Item',compact('category','items'));
    }

    function saveItem(Request $request){
        
        item::create([
            'Name' => $request->Name,
            'ItemPrice' => $request->ItemPrice,
            'ReorderLevel' => $request->ReorderLevel,
            'Quantity' => $request->Quantity,
            'category_id' => $request->categoryId,
            'user_id'=>(int)Auth::user()->id
        ]);

        return redirect('Items')->with('msg','successfully added');
    }

    function saveCategory(Request $request){
        category::create([
            'Name' => $request->categoryName,
            'user_id'=>(int)Auth::user()->id
        ]);
        return redirect('Items')->with('msg','successfully added');
    }


    


    function InventoryControle(){
        return view('finance.index');
    }


    function InventoryIndex(){
        return view('finance.index');
    }


    


}
