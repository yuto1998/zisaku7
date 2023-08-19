<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Like;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $product = new Product;
        $like_model = new Like;
        $products=$product->all()->toArray();
        // dd($request->search);
        $products = Product::paginate(20);
        $search = $request->search;
        $query = Product::withCount('likes');
        if($search){
            $spaceConversion = mb_convert_kana($search, 's');
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            // dd($wordArraySearched);
            foreach($wordArraySearched as $value) {
                $query->where('name','LIKE','%'.$value.'%')->orWhere('text','LIKE','%'.$value.'%');
        }
        $products = $query->paginate(20);
    }
        return view("home",[
            'products'=>$products,
            'like_model'=>$like_model
        ]);
    }
    // public function amount(){
    //     Product::with(['id' => function ($query){
    //         $query->orderBy('amount');
    //       }])->get();
    // }
}
