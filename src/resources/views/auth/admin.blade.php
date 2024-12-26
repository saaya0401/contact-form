@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection
@section('button')
@if(Auth::check())
<form action="/logout" method="post" class="form">
    @csrf
    <button class="header-nav__button" type="submit">ログアウト</button>
</form>
@endif
@endsection
@section('content')

@endsection