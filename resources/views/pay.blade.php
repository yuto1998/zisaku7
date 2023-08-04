@extends('layouts.app')
@section('content')
  <main class="py-4">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>お買い上げありがとうござました。また買ってね</h4>
            </div>
            <div class="text-center">
                        <a href="{{route('reviw.index')}}" class="btn btn-primary">レビュー</a>
                        <a href="{{route('main.index')}}" class="btn btn-primary">メインへもどる</a>
                    </div>  
            </div>
            </div>
        </div>    
    </div>
@endsection