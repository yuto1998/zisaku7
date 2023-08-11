@extends('layouts.app')
@section('content')
  <main class="py-4">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>レビュー</h4>
            </div>
            <div class="card-body">
            <div class=card-body>
    <form action="{{route('review.store')}}" method="post" enctype="multipart/form-data">
        @csrf 
        <label for='name'>タイトル</label>
          <input type='text' class='form-control' name='title' value=""/>            
        <label for='text' class='mt-2'>コメント</label>
          <textarea class='form-control' name='comment'></textarea>
        <div class='row justify-content-center'>   
            
            <button type="submit" class="btn btn-primary w-25 mt-3">レビューする</button>
            </div>
            </div>
        </div>    
    </div>
@endsection