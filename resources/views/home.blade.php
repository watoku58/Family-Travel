@extends('layouts.admin')

@section('title', 'Family Travel')

@section('content')
<div class="container">
    <div class="navigation">
        <ul class="navigation">
            <li><a href="#">トップ</a></li>
            <li><a href="{{ url('/user/topic/create') }}">新規投稿</a></li>
            <li><a href="#">投稿履歴</a></li>
            <li><a href="#">利用者情報登録</a></li>
        </ul>
    </div>
    <div class="card-contents">
        <h3 class="text-title">最新の投稿</h2>
        <div class=topic-list-area>
            <div class="topic-list">
                <img src=".jpg" class="topic image">
            </div>
            

    </div>
</div>
@endsection
