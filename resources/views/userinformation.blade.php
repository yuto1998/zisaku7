@extends('layouts.app')
@section('content')
<main class="py-4">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>ユーザー情報</h4>
            </div>
            <div class="card-body">
            <div class=card-body>
<div>
  <form action="{{ route('resource.index') }}" method="GET">
  </form>
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
         
          <tr>
            <th scope='col'> 
            <a href="{{route('userinformation.edit',['user'=>$users['id']])}}" class="btn btn-primary">編集</a>
          </th>    
            <th scope='col'>{{$users['name']}}</th>
            <th scope='col'>{{$users['email']}}</th>
        
          </tr>
        
        </tbody>
      </table> 
  </div>         




  @endsection