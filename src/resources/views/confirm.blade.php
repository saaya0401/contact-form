@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/confirm.css')}}">
@endsection
@section('content')
<div class="content">
    <div class="title">
        <h2>お問い合わせ内容</h2>
    </div>
    <form action="/contacts" method="post" class="confirm-form">
        @csrf
        <table class="confirm-table">
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お名前</th>
                <td class="confirm-table__detail">
                    <input type="text" name="name" class="confirm-input" value="{{$contact['name']}}" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">メールアドレス</th>
                <td class="confirm-table__detail">
                    <input type="text" class="confirm-input" name="email" value="{{$contact['email']}}" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">電話番号</th>
                <td class="confirm-table__detail">
                    <input type="text" class="confirm-input" name="tel" value="{{$contact['tel']}}" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせ内容</th>
                <td class="confirm-table__detail">
                    <input type="text" class="confirm-input" name="content" value="{{$contact['content']}}" readonly>
                </td>
            </tr>
        </table>
        <div class="confirm-form__button">
            <button class="confirm-form__button-submit" type="submit">送信</button>
        </div>
    </form>
</div>
@endsection