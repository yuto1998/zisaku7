@extends('layouts.app')
@section('content')
<thead class="bg-gray-50">
              <div class='p-4 text-gray-500 text-center'>購入履歴</div>
        <thead class="bg-gray-50">
        <table class='table'>
        <thead>
          <tr>
            <th></th>
            <th scope='col'>商品名</th>
            <th scope='col'>金額</th>
            <th scope='col'>商品説明</th>
            <th scope='col'>日時</th>
          </tr>
        </thead>
        <tbody>
        @foreach($purchases as $purchase)
          <tr>
          <th scope='col'><img width="150" height="150" class="w-12 h-9 rounded" src="{{asset('storage/images/'.$purchase['image'])}}" /></th>
            <td class="p-4 whitespace-nowrap">{{$purchase['quantity']}}</td>
            <td class="p-4 whitespace-nowrap">{{$purchase['user_id']}}</td>
            <td class="p-4 whitespace-nowrap">{{$purchase['name']}}</td>
          </tr>
          @endforeach
        </tbody>
      </table> 
@endsection