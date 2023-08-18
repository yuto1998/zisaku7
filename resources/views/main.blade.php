@extends('layouts.app')
@section('content')

<div class="">
        <table class="">
          
              <div class='p-4 text-gray-500 text-center'>商品リスト</div>
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
          </tr>
          @endforeach
         
</tbody>
</table>
</div>  

 @endsection