<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
    {
        $items = Item::where(function($query) use($request){
            if ($request->filled('s')) {
                $query->where('name', 'Like', '%'.$request->s.'%');
            }
        })->paginate(20);
        return view('home', compact('items'));
    }
}
