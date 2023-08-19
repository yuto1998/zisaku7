@extends('layouts.app')
@section('content')
<div class='p-4 text-gray-500 text-center'>お気に入り一覧</div>
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
        @foreach($likes as $like)
          <tr>
          <th scope='col'><img width="150" height="150" class="w-12 h-9 rounded" src="{{asset('storage/images/'.$like['image'])}}" /></th>
            <td class="p-4 whitespace-nowrap">{{$like['name']}}</td>
            <td class="p-4 whitespace-nowrap">{{$like['text']}}</td>
            <td class="p-4 whitespace-nowrap">{{$like['amount']}}円</td>
          </tr>
          @endforeach
        </tbody>
      </table> 
@endsection