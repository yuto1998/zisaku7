<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\controllers\purchaseController;
use App\User;
use App\Purchase;
use App\Product;
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
        $user= new User;
        $purchase= new Purchase; 
        $auth= auth()->id(); 
        $users=$user->select('telephone','postcode','address')->where('id',$auth)->first();
        if($users->telephone==null){
            
            $cart= new Cart;
            $purchases=$cart->join('products','carts.product_id','products.id')->where('user_id',$auth)->get();
            
         return view('purchase',[
             'purchases'=>$purchases,
         ]);

        }else{
            $cart= new Cart;
            $purchases=$cart->join('products','carts.product_id','products.id')->where('user_id',$auth)->get();
            return view('purchase2',[
                'purchases'=>$purchases,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $purchase= new Purchase; 
        $purchases=$purchase->all()->toArray();
        return view("history",[
            'purchases'=>$purchases,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    
        $auth= auth()->id(); 
        if($request->name!=null){
            $auth= auth()->id(); 
            $user= new User;
            $users=$user->where('id',$auth)->first();
            $users->name= $request->name;
            $users->telephone= $request->telephone;
            $users->postcode= $request->postcode;
            $users->address= $request->address;
            $users->save();
        }
        $purchase= new Purchase; 
           $purchase->quantity=  $request->quantity;
        //    $purchase->user_id = Auth::user()->id; 
           $purchase->user_id= $auth;
           $purchase->product_id=  $request->product_id;
           $purchase->save();
        $cart =  Cart::where('user_id',$auth)->delete(); 

        return redirect ('home');
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
