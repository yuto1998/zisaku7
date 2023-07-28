@extends('layouts.app')
@section('content')
  <main class="py-4">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>商品編集</h4>
            </div>
            <div class="card-body">
            <div class=card-body>
    <form action="{{route('product.update',['product'=>$products['id']])}}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf 
        <label for='image'>画像</label>
          <input type='file' class='form-control' name='image' value="old('image')"/>
        <label for='name'>商品名</label>
          <input type='text' class='form-control' name='name' value="{{old('name',$products['name'])}}"/>
        <label for='amount'>金額</label>
          <input type='text' class='form-control' name='amount' value="{{old('amount',$products['amount'])}}"/>              
        <label for='text' class='mt-2'>商品説明</label>
          <textarea class='form-control' name='text'>{{old('text',$products['text'])}}</textarea> 
        <div class='row justify-content-center'>   
            
            <button type="submit" class="btn btn-primary w-25 mt-3">登録</button>
            </div>
            </div>
        </div>    
    </div>
@endsection