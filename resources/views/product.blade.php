@extends('layouts.app')
@section('content')
  <main class="py-4">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>商品登録</h4>
            </div>
            <div class="card-body">
            <div class=card-body>
    <form action="" method="post">
        @csrf 
        <label for='name'>商品名</label>
          <input type='text' class='form-control' name='name' value=""/>
        <label for='amount'>金額</label>
          <input type='text' class='form-control' name='name' value=""/>              
        <label for='text' class='mt-2'>商品説明</label>
          <textarea class='form-control' name='text'></textarea>
        <div class='row justify-content-center'>   
            
            <a href="{{route('productlist.store')}}" class="btn btn-primary w-25 mt-3">登録</a>
            </div>
            </div>
        </div>    
    </div>
@endsection

