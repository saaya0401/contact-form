<div>
    <div class="admin-form__button">
        <button wire:click="openModal({{$contact->id  ?? '' }})" type="button" class="admin-form__modal">
        詳細
    </button>
    </div>
    @if($showModal && $selectedContact)
        <div class="modal">
            <div class="modal-content">
                <div class="close-button__area">
                    <button wire:click="closeModal()" class="close-button" type="close">×</button>
                </div>
                <table class="modal-table">
                    <tr class="modal-table__row">
                        <th class="modal-table__header">お名前</th>
                        <td class="modal-form__detail">
                            <span class="modal-form__name">{{$selectedContact->first_name}}</span>
                            <span class="modal-form__name">{{$selectedContact->last_name}}</span>
                        </td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">性別</th>
                        <td class="modal-form__detail">{{$selectedContact->gender}}</td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">メールアドレス</th>
                        <td class="modal-form__detail">{{$selectedContact->email}}</td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">電話番号</th>
                        <td class="modal-form__detail">{{$selectedContact->tel}}</td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">住所</th>
                        <td class="modal-form__detail">{{$selectedContact->address}}</td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">建物名</th>
                        <td class="modal-form__detail">{{$selectedContact->building}}</td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">お問い合わせの種類</th>
                        <td class="modal-form__detail">{{$selectedContact->category->content}}</td>
                    </tr>
                    <tr class="modal-table__row">
                        <th class="modal-table__header">お問い合わせ内容</th>
                        <td class="modal-form__detail">{{$selectedContact->detail}}</td>
                    </tr>
                </table>
                <form wire:submit.prevent="deleteContact" class="modal-form">
                    @csrf
                    <input type="hidden" name="id" value="{{$selectedContact->id}}">
                    <button class="modal-form__button" type="submit">削除</button>
                </form>
            </div>
        </div>
    @endif
</div>