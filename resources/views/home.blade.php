@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">管理者ページ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  
                   
                    @csrf
                    <div class="text-center">
                        <a href="{{route('resource.index')}}" class="btn btn-primary">ユーザーリスト</a>
                        <a href="{{route('productlist.index')}}" class="btn btn-primary">商品リスト</a>
                        <a href="{{route('product.create')}}" class="btn btn-primary">商品の編集・登録</a>
                        <a href="{{route('main.index')}}" class="btn btn-primary">メインページ</a>
                    </div>  
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
