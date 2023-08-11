@extends('layouts.app')
@section('content')



    <div class="navbar navbar-expand-sm navbar-dark bg-success mt-3 mb-3">
       
        </button>
        <a class="navbar-brand" href="">MAISON★SATO</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ route('main.index') }}" method="GET"></a>
                  <input type="text" name="name" value="">
                  <input type="submit" value="検索">
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('history.index')}}">お気に入り</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('nice.index')}}">購入履歴</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('userinformation.index')}}">ユーザー情報</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('reviw.index')}}">レビュー</a>
                </li>
            </ul>
            
            </div>
            
</div>    
 
<div class="m-2 p-2">
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <div class='p-4 text-gray-500 text-center'>商品リスト</div>
        <thead class="bg-gray-50">
          <tr>
            <th class="p-4 text-gray-500 text-left">商品名</th>
            <th class="p-4 text-gray-500 text-left">商品説明</th>
            <th class="p-4 text-gray-500 text-left">金額</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @foreach($products as $product)
          <tr> 
          <td class="p-4 whitespace-nowrap">
          <a href="{{route('product.show',['product' =>$product['id']])}}" class="btn btn-primary">詳細<a>
            <td class="p-4 whitespace-nowrap">{{$product['name']}}</td>
            <td class="p-4 whitespace-nowrap">{{$product['text']}}</td>
            <td class="p-4 whitespace-nowrap">{{$product['amount']}}</td>
            <td class="p-4 whitespace-nowrap">
             <img class="w-12 h-9 rounded" src="{{asset('storage/images'.$product['image'])}}" />
          
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
          </tr>
          @endforeach
         
</tbody>
</table>
</div>  

 @endsection