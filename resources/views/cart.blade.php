@extends('layouts.app')
@section('content')
<div class="text-center">
     <a href="{{route('main.index')}}" class="btn btn-primary">買い物を続ける</a>
     <a href="{{route('purchase.index')}}" class="btn btn-primary">購入画面へ</a>
    </div>
    <tbody class="bg-white divide-y divide-gray-200">
          @foreach($carts as $cart)
          <tr> 
            <td class="p-4 whitespace-nowrap">{{$cart['quantity']}}</td>
            <td class="p-4 whitespace-nowrap">{{$cart['user_id']}}</td>
            <td class="p-4 whitespace-nowrap">{{$cart->name}}</td>
           
            <td class="p-4 whitespace-nowrap">
          </tr>
          @endforeach
        </tbody>  
@endsection