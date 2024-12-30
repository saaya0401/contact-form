@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/confirm.css')}}">
@endsection

@section('content')
<div class="contact__content">
    <div class="contact-form__heading">
        <h2>Confirm</h2>
    </div>
    <form class="confirm-form" method="post">
        @csrf
        <table class="confirm-table">
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お名前</th>
                <td class="confirm-table__content">
                    <input type="text" value="{{$full_name}}" class="confirm-table__input" readonly>
                    <input type="hidden" name="first_name" value="{{$contact['first_name']}}">
                    <input type="hidden" name="last_name" value="{{$contact['last_name']}}">
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">性別</th>
                <td class="confirm-table__content">
                    <input type="text" name="gender" value="{{$contact['gender']}}" class="confirm-table__input" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">メールアドレス</th>
                <td class="confirm-table__content">
                    <input type="text" name="email" value="{{$contact['email']}}" class="confirm-table__input" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">電話番号</th>
                <td class="confirm-table__content">
                    <input type="hidden" name="tel[0]" value="{{$contact['tel'][0]}}" >
                    <input type="hidden" name="tel[1]" value="{{$contact['tel'][1]}}" >
                    <input type="hidden" name="tel[2]" value="{{$contact['tel'][2]}}"  >
                    <input type="text"  value="{{$tel}}" class="confirm-table__input" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">住所</th>
                <td class="confirm-table__content">
                    <input type="text" name="address" value="{{$contact['address']}}" class="confirm-table__input" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">建物名</th>
                <td class="confirm-table__content">
                    <input type="text" name="building" value="{{$contact['building']}}" class="confirm-table__input" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせの種類</th>
                <td class="confirm-table__content">
                    <input type="hidden" name="category_id" value="{{$contact['category_id']}}" >
                    <input type="text" value="{{$category['content']}}" readonly class="confirm-table__input">
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせ内容</th>
                <td class="confirm-table__content">
                    <textarea name="detail" class="confirm-table__textarea" readonly>{{$contact['detail']}}</textarea>
                </td>
            </tr>
        </table>
        <div class="confirm-button">
            <div class="confirm-button__submit">
                <button class="confirm-submit" formaction="/thanks" type="submit">送信</button>
            </div>
            <div class="confirm-button__edit">
                <button class="confirm-edit" formaction="/edit" type="submit">修正</button>
            </div>
        </div>
    </form>
</div>
@endsection