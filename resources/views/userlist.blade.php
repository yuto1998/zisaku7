@extends('layouts.app')
@section('content')
<main class="py-4">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>ユーザーリスト</h4>
            </div>
            <div class="card-body">
            <div class=card-body>
<div>
  
</div>
<div>
      <table class='table'>
        <thead>
          <tr>
          <th scope='col'>お客様情報</th>
          <th scope='col'>ユーザー名</th>
            <th scope='col'>メールアドレス</th>
           
          
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <th scope='col'> 
              <a herf="">＃<a>
          </th>    
            <th scope='col'>{{$user['name']}}</th>
            <th scope='col'>{{$user['email']}}</th>
     
          </tr>
          @endforeach  
        </tbody>
      </table> 
  </div>         




  @endsection