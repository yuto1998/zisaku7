@extends('layouts.app')
@section('content')
  <main class="py-4">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>ユーザー編集</h4>
            </div>
            <div class="card-body">
            <div class=card-body>
    <form action="{{route('product.update',['product'=>$products['id']])}}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf 
        <label for='name'>ユーザー名</label>
          <input type='text' class='form-control' name='name' value="{{old('name',$products['name'])}}"/>
        <label for='amount'>メールアドレス</label>
          <input type='text' class='form-control' name='email' value="{{old('email',$products['email'])}}"/>              
        <div class='row justify-content-center'>   
            
            <button type="submit" class="btn btn-primary w-25 mt-3">登録</button>
            </div>
            </div>
        </div>    
    </div>
@endsection