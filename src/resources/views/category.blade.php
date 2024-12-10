@extends('layouts/app')
@section('css')
<link rel="stylesheet" href="{{asset('css/category.css')}}">
@endsection

@section('content')
<div class="alert">
    @if(session('message'))
    <div class="alert-success">
        <p class="alert-success__text">{{session('message')}}</p>
    </div>
    @endif
    @if($errors->any())
    <div class="alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<div class="category">
    <form action="/categories" method="post" class="category-create">
        @csrf
        <input type="text" name="category_name" class="category-input" value="{{old('category_name')}}">
        <div class="create-button">
            <button class="create-button__submit" type="submit">作成</button>
        </div>
    </form>
    <table class="category-table">
        <tr class="table-row">
            <th class="table-header">category</th>
        </tr>
        @foreach($categories as $category)
        <tr class="table-row">
            <td class="table__category-update">
                <form action="" method="post" class="update-form">
                    @csrf
                    @method('patch')
                    <input type="text" class="category-name" name="category_name" value="{{$category['category_name']}}">
                    <div class="update-button">
                        <button class="update-button__submit" type="submit">更新</button>
                    </div>
                </form>
            </td>
            <td class="table__category-delete">
                <form action="" method="post" class="delete-form">
                    @csrf
                    @method('delete')
                    <button class="delete-button__submit" type="submit">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection