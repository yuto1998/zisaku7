<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\controllers\purchaseController;
use App\User;
use App\Purchase;
use App\Cart;
use Illuminate\Support\Facades\Auth;
class purchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase= new Purchase; 
        $auth= auth()->id(); 
        $cart= new Cart;
           $purchases=$cart->join('products','carts.product_id','products.id')->where('user_id',$auth)->get();
           
        return view('purchase',[
            'purchases'=>$purchases,
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
    public function store(Request $request )
    {
        $purchase= new Purchase; 
        $auth= auth()->id(); 
           $purchase->quantity=  $request->quantity;
           $purchase->user_id= $auth;
           $purchase->product_id= $id;
           $purchase->save();
           $purchases=$purchase->join('products','carts.product_id','products.id')->where('user_id',$auth)->get();
           
        return view('purchase',[
            'purchases'=>$purchases,
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
        //
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
        $purchase= new Purchase; 
        $auth= auth()->id(); 
           $purchase->quantity=  $request->quantity;
           $purchase->user_id= $auth;
           $purchase->product_id= $id;
           $purchase->save();
           $purchases=$purchase->join('products','carts.product_id','products.id')->where('user_id',$auth)->get();
           
        return view('purchase',[
            'purchases'=>$purchases,
        ]);
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
}
