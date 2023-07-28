<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\controllers\ProductController;
use App\Http\Requests\ProductData;
use App\Product;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("product");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product= new Product;
         // アップロードされたファイル名を取得
         $file_name = $request->file('image')->getClientOriginalName();
         // 取得したファイル名で保存
         $request->file('image')->storeAs('public/images',$file_name);
        // $record = $productlist->find($id);
        $product->name = $request->name;
        $product->amount = $request->amount;
        $product->text = $request->text;
        $product->image = $file_name;
       
        $product->save();
        return redirect('/');
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
        // productlistから編集したいリストを取得
        $product= new Product;
        $products = $product->find($id);
        return view('editproduct',[
             'products'=>$products

        ]);
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
        // productのidを取得しておりどのカラムを持ってくるか記述
        $product= new Product;
        $products = $product->find($id);
        $expends =['name','text','amount'];
        foreach($expends as $expend) {
            $products->$expend = $request->$expend;
        }
          // アップロードされたファイル名を取得
          $file_name = $request->file('image')->getClientOriginalName();
          // 取得したファイル名で保存
          $request->file('image')->storeAs('public/images',$file_name);
          $products->image = $file_name;
        $products->save();
        return redirect('/'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product= new Product;
        $products = $product->find($id);
        $products->delete();
        return redirect('/');
    }
}
