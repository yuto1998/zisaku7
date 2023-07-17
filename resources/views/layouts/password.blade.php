@extends('layouts.app')
@section('content')
  <main class="py-4">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>パスワード再設定</h4>
            </div>
            <div class="card-body">
            <div class=card-body>
    <form action="" method="post">
        @csrf 
        <label for='name'>メールアドレス入力</label>
          <input type='text' class='form-control' name='name' value=""/>
          <div class="text-center">
            <a href="{{route('passwordform.index')}}" class="btn btn-primary">メール送信</a>
          </div>  
            </div>
            </div>
        </div>    
    </div>
@endsection

