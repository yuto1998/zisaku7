<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\controllers\ProductController;
use App\Product;
use App\Like;
use Illuminate\Support\Facades\Auth;
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
        return view("main",[
            'products'=>$products,
            'like_model'=>$like_model
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
    public function amount(){
        Product::with(['id' => function ($query){
            $query->orderBy('amount');
          }])->get();
    }
    public function nice(Request $request){
        $data = [];
        // ユーザの投稿の一覧を作成日時の降順で取得
        //withCount('テーブル名')とすることで、リレーションの数も取得できます。
        $products = Product::withCount('likes')->orderBy('created_at', '')->paginate(10);
        $like_model = new Like;

        $data = [
                'products' => $products,
                'like_model'=>$like_model,
            ];

        return view('posts.index', $data);
    }
    public function ajaxlike(Request $request){
        $id = Auth::user()->id;
        $product_id = $request->product_id;
        $like = new Like;
        $product = Product::findOrFail($product_id);

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $product_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('product_id', $product_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->product_id = $request->product_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $postLikesCount = $product->loadCount('likes')->likes_count;

        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'postLikesCount' => $postLikesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    
    }
}
