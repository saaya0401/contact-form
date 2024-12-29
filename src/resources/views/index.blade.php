@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection
@section('content')
<div class="contact__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form action="/confirm" class="contact-form" method="post" novalidate>
        @csrf
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">お名前</span>
                <span class="contact-form__label--require">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input--separate">
                    <div class="contact-form__name">
                        <input class="contact-form__name-input" type="text" name="first_name" placeholder="例: 山田" value="{{old('first_name')}}">
                        <div class="form__error">
                            @error('first_name')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="contact-form__name">
                        <input class="contact-form__name-input" type="text" name="last_name" placeholder="例: 太郎" value="{{old('last_name')}}">
                        <div class="form__error">
                            @error('last_name')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">性別</span>
                <span class="contact-form__label--require">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input--gender">
                    <label><input class="contact-form__item--gender" type="radio" name="gender"  value="男性" {{old('gender', '男性') == '男性' ? 'checked' : ''}} checked>男性</label>
                    <label><input type="radio" name="gender" class="contact-form__item--gender" value="女性" {{old('gender') == '女性' ? 'checked' : ''}}>女性</label>
                    <label>
                        <input class="contact-form__item--gender" type="radio" name="gender" value="その他" {{old('gender') == 'その他' ? 'checked' : ''}}>その他
                    </label>
                </div>
                <div class="form__error">
                    @error('gender')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">メールアドレス</span>
                <span class="contact-form__label--require">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input--text">
                    <input type="text" name="email" placeholder="例: test@example.com" value="{{old('email')}}">
                </div>
                <div class="form__error">
                    @error('email')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">電話番号</span>
                <span class="contact-form__label--require">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input--separate">
                    <input class="contact-form__input-tel" type="text" name="tel[0]" placeholder="080" value="{{old('tel.0')}}">
                    <span>-</span>
                    <input  class="contact-form__input-tel" type="text" name="tel[1]" placeholder="1234" value="{{old('tel.1')}}">
                    <span>-</span>
                    <input class="contact-form__input-tel" type="text" name="tel[2]" placeholder="5678" value="{{old('tel.2')}}">
                </div>
                <div class="form__error">
                    @error('tel.*')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">住所</span>
                <span class="contact-form__label--require">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input--text">
                    <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{old('address')}}">
                </div>
                <div class="form__error">
                    @error('address')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">建物名</span>
                <span class="contact-form__label--require"></span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input--text">
                    <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{old('building')}}">
                </div>
                <div class="form__error">
                </div>
            </div>
        </div>
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">お問い合わせの種類</span>
                <span class="contact-form__label--require">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input--category">
                    <select name="category_id" class="contact-form__category-select" required>
                        <option value="">選択してください</option>
                        @foreach($categories as $category)
                        <option value="{{$category['id']}}">{{$category['content']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__error">
                    @error('category_id')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="contact-form__group">
            <div class="contact-form__group-title">
                <span class="contact-form__label--item">お問い合わせ内容</span>
                <span class="contact-form__label--require">※</span>
            </div>
            <div class="contact-form__group-content">
                <div class="contact-form__input--textarea">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{old('detail')}}</textarea>
                </div>
                <div class="form__error">
                    @error('detail')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="contact-form__button">
            <button class="contact-form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection