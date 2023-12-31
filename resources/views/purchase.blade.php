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
            <td class="p-4 whitespace-nowrap">{{$purchase['name']}}</td>
            <td class="p-4 whitespace-nowrap">{{$purchase['text']}}</td>
            <td class="p-4 whitespace-nowrap">{{$purchase['amount']}}</td>
          </tr>
          @endforeach
        </tbody>  
        <form action="{{route('purchase.store')}}" method="post" enctype="multipart/form-data">
      @csrf 
      <label for=''>氏名</label>
          <input type='text' class='form-control' name='name'/>
          <label for=''>電話番号</label>
          <input type='text' class='form-control' name='telephone'/>
          <label for=''>郵便番号</label>
          <input type='text' class='form-control' name='postcode'/>
          <label for=''>住所</label>
          <input type='text' class='form-control' name='address'/>
      @foreach($purchases as $purchase)
      <th scope='col'><img width="150" height="150" class="w-12 h-9 rounded" src="{{asset('storage/images/'.$purchase['image'])}}" /></th>
      <input type='hidden' class='form-control' name='quantity' value="{{$purchase['quantity']}}"/>
      <input type='hidden' class='form-control' name='user_id' value="{{$purchase['user_id']}}"/>
      <input type='hidden' class='form-control' name='product_id' value="{{$purchase['product_id']}}"/>
      @endforeach
            <button type="submit" class="btn btn-primary w-25 mt-3">購入確定</button>
            </div>
            </div>
        </div>    
    </div>
@endsection