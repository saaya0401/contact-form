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
                <input type="text" name="keyword" class="search-keyword__input" placeholder="名前やメールアドレスを入力してください" value="{{old('keyword', request('keyword'))}}">
            </div>
            <div class="search-gender">
                <select class="search-gender__select" name="gender">
                    <option value="">性別</option>
                    <option value="男性" {{old('gender', request('gender'))== "男性" ? 'selected' : ''}}>男性</option>
                    <option value="女性" {{old('gender', request('gender'))== "女性" ? 'selected' : ''}}>女性</option>
                    <option value="その他" {{old('gender', request('gender'))== "その他" ? 'selected' : ''}}>その他</option>
                </select>
            </div>
            <div class="search-category">
                <select class="search-category__select" name="category_id">
                    <option value="">お問い合わせの種類</option>
                    @foreach($categories as $category)
                    <option value="{{$category['id']}}" {{old('category_id', request('category_id'))}}>{{$category['content']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="search-date">
                <input type="date" class="search-date__input" name="created_at" value="{{old('created_at', request('created_at'))}}">
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
        <form action="/export" method="post" class="export-button">
            @csrf
            <button type="submit" class="export-link">エクスポート</button>
            <input type="text">
        </form>
        <table class="paginate-area">
            <tr class="paginate-table__row">
                @if($contacts->onFirstPage())
                    <td class="previous"><span>&lt;</span></td>
                @else
                    <td class="previous"><a class="mark" href="{{$contacts->previousPageUrl()}}" rel="preview">&lt;</a></td>
                @endif
                @for($page=1; $page<= $contacts->lastPage(); $page++)
                @if($contacts->currentPage()== $page)
                    <td class="active"><span>{{$page}}</span></td>
                @else
                    <td class="other"><a href="{{$contacts->url($page)}}">{{$page}}</a></td>
                @endif
                @endfor
                @if($contacts->hasMorePages())
                    <td class="next"><a class="mark" href="{{$contacts->nextPageUrl()}}" rel="next">&gt;</a></td>
                @else
                    <td class="next"><span>&gt;</span></td>
                @endif
            </tr>
        </table>
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
                @livewire('modal', ['contact' => $contact], key($contact->id))
            </td>
        </tr>
        @endforeach
    </table>

 
    
</div>
@endsection