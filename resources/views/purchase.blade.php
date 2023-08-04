@extends('layouts.app')
@section('content')
  <main class="py-4">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>購入画面</h4>
            </div>
            <div class="card-body">
            <div class=card-body>
            <tbody class="bg-white divide-y divide-gray-200">
          @foreach($purchases as $purchase)
          <tr> 
            <td class="p-4 whitespace-nowrap">{{$purchase['quantity']}}</td>
            <td class="p-4 whitespace-nowrap">{{$purchase['user_id']}}</td>
            <td class="p-4 whitespace-nowrap">{{$purchase->name}}</td>
           
            <td class="p-4 whitespace-nowrap">
          </tr>
          @endforeach
        </tbody>  
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf 
        <label for='image'>氏名</label>
        <input type='text' class='form-control' name='name' value=""/>
        <label for='name'>電話番号</label>
          <input type='text' class='form-control' name='name' value=""/>
        <label for='amount'>郵便番号</label>
          <input type='text' class='form-control' name='amount' value=""/>              
        <label for='text' class='mt-2'>住所</label>
          <textarea class='form-control' name='text'></textarea>
        <div class='row justify-content-center'>   
            
            <button type="submit" class="btn btn-primary w-25 mt-3">購入確定</button>
            </div>
            </div>
        </div>    
    </div>
@endsection