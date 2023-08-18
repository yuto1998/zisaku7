<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\controllers\ReviwController;
use Illuminate\Support\Facades\Auth;
use App\Reviw;
use App\Product;
class ReviwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        dd($id);
        $product = new Product;
        $products = $product->find($id);
       
        return view('reviw',[
            'products'=>$products
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
        $reviw= new Reviw;
        $reviw->title = $request->title;
        $reviw->comment = $request->comment;
        $reviw->user_id = Auth::user()->id; 
        $reviw->product_id= $request->product_id;
        $reviw->save();
        return redirect()->route('product.show',['id'=>1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reviw= new Reviw;
        $reviws = $reviw->find($id);
        return view('reviw',[
            'reviws'=>$reviws
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = new Product;
        $products = $product->find($id);
        // dd($products);
        return view('reviw',[
            'products'=>$products
        ]); 
    }
    // <input type='hidden'を使う  value=''の中にproduct_idを入れる 
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
    public function reviwList($id){
        dd($id);
        $product = new Product;
        $products = $product->find($id);
       
        return view('reviw',[
            'products'=>$products
        ]);    
    }
}
