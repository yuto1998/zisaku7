@extends('layouts.app')
@section('content')

<div>
  <form action="{{ route('resource.index') }}" method="GET">
    <input type="text" name="keyword" value="">
    <input type="submit" value="検索">
  </form>
</div>

<h1>
  <span> ユーザーリスト</span>
  <a href="{{ route('resource.create') }}">[Add]</a>
</h1>

<table>
  <tr>
    <th>ユーザー名</th><th>メールアドレス</th><th>パスワード</th>
  </tr>
  @endsection