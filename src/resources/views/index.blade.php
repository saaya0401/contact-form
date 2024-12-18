@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="content">
    <div class="title">
        <h2>お問い合わせ</h2>
    </div>
    <form action="/contacts/confirm" method="post" class="contact-form">
        @csrf
        <div class="contact-group">
            <div class="contact-item">
                <div class="contact-item__title">
                    <span class="contact-item__name">お名前</span>
                    <span class="contact-item__require">必須</span>
                </div>
                <div class="contact-item__input">
                    <input type="text" name="name" placeholder="テスト太郎" value="{{old('name')}}">
                    <div class="error">
                    @error('name')
                    {{$message}}
                    @enderror
                    </div>
                </div>
            </div>
            <div class="contact-item">
                <div class="contact-item__title">
                    <span class="contact-item__name">メールアドレス</span>
                    <span class="contact-item__require">必須</span>
                </div>
                <div class="contact-item__input">
                    <input type="text" name="email" placeholder="test@example.com" value="{{old('email')}}">
                    <div class="error">
                        @error('email')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="contact-item">
                <div class="contact-item__title">
                    <span class="contact-item__name">電話番号</span>
                    <span class="contact-item__require">必須</span>
                </div>
                <div class="contact-item__input">
                    <input type="text" name="tel" placeholder="09012345678" value="{{old('tel')}}">
                    <div class="error">
                        @error('tel')
                        {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="contact-item">
                <div class="contact-item__title">
                    <span class="contact-item__name">お問い合わせ内容</span>
                </div>
                <div class="contact-item__textarea">
                    <select class="category-select">
                        <option value="">カテゴリ</option>
                    </select>
                    <textarea name="content" placeholder="資料をいただきたいです" >{{old('content')}}</textarea>
                </div>
            </div>
        </div>
        <div class="contact-form__button">
            <button class="contact-form__button-submit" type="submit">送信</button>
        </div>
    </form>
</div>
@endsection