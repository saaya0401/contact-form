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
                    <input type="text" value="山田 太郎" class="confirm-table__input" readonly>
                    <input type="hidden" name="first_name" value="">
                    <input type="hidden" name="last_name" value="">
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">性別</th>
                <td class="confirm-table__content">
                    <input type="text" name="gender" value="男性" class="confirm-table__input" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">メールアドレス</th>
                <td class="confirm-table__content">
                    <input type="text" name="email" value="test@example.com" class="confirm-table__input" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">電話番号</th>
                <td class="confirm-table__content">
                    <input type="hidden" name="tel[0]" value="" >
                    <input type="hidden" name="tel[1]" value="" >
                    <input type="hidden" name="tel[2]" value=""  >
                    <input type="text"  value="08012345678" class="confirm-table__input" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">住所</th>
                <td class="confirm-table__content">
                    <input type="text" name="address" value="東京都渋谷区千駄ヶ谷1-2-3" class="confirm-table__input" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">建物名</th>
                <td class="confirm-table__content">
                    <input type="text" name="building" value="千駄ヶ谷マンション101" class="confirm-table__input" readonly>
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせの種類</th>
                <td class="confirm-table__content">
                    <input type="hidden" name="category_id" value="" >
                    <input type="text" value="商品の交換について" readonly class="confirm-table__input">
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせ内容</th>
                <td class="confirm-table__content">
                    <textarea name="detail" class="confirm-table__textarea" readonly>届いた商品が注文した商品ではありませんでした。商品の取り替えをお願いします</textarea>
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