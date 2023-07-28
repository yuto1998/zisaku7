@extends('layouts.app')
@section('content')
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
            <td class="p-4 whitespace-nowrap">{{$product['name']}}</td>
            <td class="p-4 whitespace-nowrap">{{$product['text']}}</td>
            <td class="p-4 whitespace-nowrap">{{$product['amount']}}</td>
            <td class="p-4 whitespace-nowrap">
             <img class="w-12 h-9 rounded" src="{{asset('storage/images'.$product['image'])}}" />
            </td>
            <td class="p-4 whitespace-nowrap">
            <a href="{{route('product.edit',['product'=>$product['id']])}}" class="btn btn-primary">編集</a>
            <a href="{{route('product.destroy',['product'=>$product['id']])}}" class="btn btn-primary">削除</a>
          </tr>
          @endforeach
        </tbody>
</table>
</div>   
@endsection       