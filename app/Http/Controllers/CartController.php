<?php

namespace App\Http\Controllers;
use App\Cart;
use App\User;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\controllers\CartController;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart= new Cart;
        $auth= auth()->id();
        $carts=$cart->join('products','carts.product_id','products.id')->where('user_id',$auth)->get();
        return view('cart',[
            'carts'=>$carts,
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
    public function store($id,Request $request)
    {
        
        
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
    public function cart_item($id,Request $request)
    {
       $cart= new Cart; 
    //    $user=auth()->user();
       $auth= auth()->id(); 
    //    $users=User::where('user_id',Auth::id())->first();
       $cart->quantity=  $request->quantity;
       $cart->user_id= $auth;
       $cart->product_id= $id;
       $cart->save();
       $carts=$cart->join('products','carts.product_id','products.id')->where('user_id',$auth)->get();

        return view('cart',[
            'carts'=>$carts,
        ]);
    }
}
