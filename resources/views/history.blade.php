@extends('layouts.app')
@section('content')
<div class='p-4 text-gray-500 text-center'>購入履歴</div>
        <table class='table'>
        <thead>
          <tr>
            <th></th>
            <th scope='col'>商品名</th>
            <th scope='col'>商品説明</th>
            <th scope='col'>金額</th>
          </tr>
        </thead>
        <tbody>
        @foreach($purchases as $purchase)
          <tr>
          <th scope='col'><img width="150" height="150" class="w-12 h-9 rounded" src="{{asset('storage/images/'.$purchase['image'])}}" /></th>
            <td class="p-4 whitespace-nowrap">{{$purchase['name']}}</td>
            <td class="p-4 whitespace-nowrap">{{$purchase['text']}}</td>
            <td class="p-4 whitespace-nowrap">{{$purchase['amount']}}円</td>
          </tr>
          @endforeach
        </tbody>
      </table> 
@endsection