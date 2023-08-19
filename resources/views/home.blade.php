@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @can('admin_only')
                <div class="card-header">管理者ページ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  
                   
                    @csrf
                    <div class="text-center">
                        <a href="{{route('userlist.index')}}" class="btn btn-primary">ユーザーリスト</a>
                        <a href="{{route('productlist.index')}}" class="btn btn-primary">商品リスト</a>
                        <a href="{{route('product.create')}}" class="btn btn-primary">商品登録</a>
          
                    </div>  
                   
                </div>
            </div>
        </div>
    </div>
</div>
@elsecan('user_only')
<div class="">
        <table class="">
          
            
        <thead class="text-center">
          <tr>
            <th class="">商品名</th>
            <th class="">商品説明</th>
            <th class="">金額</th>
          </tr>
        </thead>
        <tbody class="">
          @foreach($products as $product)
          <tr> 
          <td class="">
          <a href="{{route('product.show',['product' =>$product['id']])}}" class="btn btn-primary">詳細<a>
            <td class="p-4 whitespace-nowrap">{{$product['name']}}</td>
            <td class="p-4 whitespace-nowrap">{{$product['text']}}</td>
            <td class="p-4 whitespace-nowrap">{{$product['amount']}}</td>
            <td class="p-4 whitespace-nowrap">
             <img width="150" height="150" class="w-12 h-9 rounded" src="{{asset('storage/images/'.$product['image'])}}" />
          
             <label for="category-id">{{ __('数量') }}</label>
             <form action="{{route('cart_item',['id'=>$product['id']])}}" method="post" >
               @csrf 
                <select class="form-control" id="category-id" name="quantity">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
               <button type="submit" class="btn btn-primary">カート追加</button>
              
               
             </form>
            </td>
            @if($like_model->like_exist(Auth::user()->id,$product['id']))
            <td>
            <p class="favorite-marke">
  <a class="js-like-toggle loved" href="" data-postid="{{ $product['id']}}"><button class="btn">いいね解除</button></a>
  <span class="likesCount">{{$product['likes_count']}}</span>
</p>
            </td>
@else
<td>
<p class="favorite-marke">
  <a class="js-like-toggle" href="" data-postid="{{ $product['id'] }}"><button class="btn">いいね</button></a>
  <span class="likesCount">{{$product['likes_count']}}</span>
</p>
</td>
@endif​
          
          </tr>
          @endforeach
         
</tbody>
</table>
</div>  

@endcan
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script>
  $(function () {
var like = $('.js-like-toggle');
var likePostId;

like.on('click', function () {
    var $this = $(this);
    likePostId = $this.data('postid');
    $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/ajaxlike',  //routeの記述
            type: 'POST', //受け取り方法の記述（GETもある）
            data: {
                'product_id': likePostId //コントローラーに渡すパラメーター
            },
    })

        // Ajaxリクエストが成功した場合
        .done(function (data) {
//lovedクラスを追加
            $this.toggleClass('loved'); 

//.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
            $this.next('.likesCount').html(data.postLikesCount); 

        })
        // Ajaxリクエストが失敗した場合
        .fail(function (data, xhr, err) {
//ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
//とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
            console.log('エラー');
            console.log(err);
            console.log(xhr);
        });
    
    return false;
});
});
 </script>