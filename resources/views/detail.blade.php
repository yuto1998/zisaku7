@extends('layouts.app')
@section('content')
  <main class="py-4">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>商品詳細画面</h4>
            </div>
            <div class="card-body">
            <div class=card-body>
</div>
<div>
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
          <tr>
          <th scope='col'><img width="150" height="150" class="w-12 h-9 rounded" src="{{asset('storage/images/'.$products['image'])}}" /></th>
            <th scope='col'>{{$products['name']}}</th>
            <th scope='col'>{{$products['amount']}}</th>
            <th scope='col'>{{$products['text']}}</th>
          </tr>
        </tbody>
      </table> 
  </div>         
  <div class="text-center">
     <a href="{{route('reviw.edit',['reviw' =>$products['id']])}}" class="btn btn-primary">レビューする</a>
 </div>                 



  @endsection