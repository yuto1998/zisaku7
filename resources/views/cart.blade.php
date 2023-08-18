@extends('layouts.app')
@section('content')
<div class="text-center">
     <a href="{{route('main.index')}}" class="btn btn-primary">買い物を続ける</a>
     <a href="{{route('purchase.index')}}" class="btn btn-primary">購入画面へ</a>
    </div>
        <table class='table'>
        <thead>
          <tr>
            <th></th>
            <th scope='col'>商品名</th>
            <th scope='col'>金額</th>
            <th scope='col'>商品説明</th>
          </tr>
        </thead>
        <tbody>
        @foreach($carts as $cart)
          <tr>
          <th scope='col'><img width="150" height="150" class="w-12 h-9 rounded" src="{{asset('storage/images/'.$cart['image'])}}" /></th>
            <td class="p-4 whitespace-nowrap">{{$cart['quantity']}}</td>
            <td class="p-4 whitespace-nowrap">{{$cart['user_id']}}</td>
            <td class="p-4 whitespace-nowrap">{{$cart->name}}</td>
          </tr>
          @endforeach
        </tbody>
      </table> 
@endsection