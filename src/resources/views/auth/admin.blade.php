@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection
@section('button')
@if(Auth::check())
<form action="/logout" method="post" class="form">
    @csrf
    <button class="header-nav__button" type="submit">logout</button>
</form>
@endif
@endsection
@section('content')
<div class="admin__content">
    <div class="admin__heading">
        <h2>Admin</h2>
    </div>
    <div class="search-area">
        <form action="/search" method="get" class="admin__search-form">
        @csrf
            <div class="search-keyword">
                <input type="text" name="keyword" class="search-keyword__input" placeholder="名前やメールアドレスを入力してください">
            </div>
            <div class="search-gender">
                <select class="search-gender__select">
                    <option value="">性別</option>
                </select>
            </div>
            <div class="search-category">
                <select class="search-category__select">
                    <option value="">お問い合わせの種類</option>
                </select>
            </div>
            <div class="search-date">
                <input type="date" class="search-date__input">
            </div>
            <div class="search-button">
                <button class="search-button__submit" type="submit">検索</button>
            </div>
        </form>
        <div class="reset-button">
            <a href="/admin" class="reset__link">リセット</a>
        </div>
    </div>
    <div class="page-action">
        <div class="export-button">
            <a href="" class="export-link">エクスポート</a>
        </div>
        <div class="paginate-area"></div>
    </div>
    <table class="admin-form">
        <tr class="admin-form__row-header">
            <th class="admin-form__header-name">お名前</th>
            <th class="admin-form__header-gender">性別</th>
            <th class="admin-form__header-email">メールアドレス</th>
            <th class="admin-form__header-category" colspan="2">お問い合わせの種類</th>
        </tr>
        @foreach($contacts as $contact)
        <tr class="admin-form__row">
            <td class="admin-form__content">
                <span class="admin-form__name">{{$contact['first_name']}}</span>
                <span class="admin-form__name">{{$contact['last_name']}}</span>
            </td>
            <td class="admin-form__content">
                {{$contact['gender']}}
            </td>
            <td class="admin-form__content">
                {{$contact['email']}}
            </td>
            <td class="admin-form__content">
                <div class="admin-form__content-category">
                    {{$contact['category']['content']}}
                </div>
                <form class="admin-form__button">
                    <button class="admin-form__modal">詳細</button>
                </form>
            </td>
        </tr>
        @endforeach
@endsection