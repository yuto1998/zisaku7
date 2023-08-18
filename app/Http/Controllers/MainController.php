<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\controllers\ProductController;
use App\Product;
class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product = new Product;
        $products=$product->all()->toArray();
        // dd($request->search);
        $products = Product::paginate(20);
        $search = $request->search;
        $query = Product::query();
        if($search){
            $spaceConversion = mb_convert_kana($search, 's');
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            // dd($wordArraySearched);
            foreach($wordArraySearched as $value) {
                $query->where('name','LIKE','%'.$value.'%')->orWhere('text','LIKE','%'.$value.'%');
        }
        $products = $query->paginate(20);
    }
        return view("main",[
            'products'=>$products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd( $search);
        $products = Product::paginate(20);
        $search = $request->input('search');
        $query = Product::query();
        if($search){
            $spaceConversion = mb_convert_kana($search, 's');
            $wordArraySearched = preg_split('/[s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            foreach($wordArraySearched as $value) {
                $query->where('name', 'text','amount', '%'.$value.'%');
        }
        $products = $query->paginate(20);
    }
        return view('search')
        ->with([
            'produts' => $products,
            'search' => $search,
        ]);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("cart");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search()
    {
        // $search =$request->input('from');
        // if(isset($search))
    }
}
