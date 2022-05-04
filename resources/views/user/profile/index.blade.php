@extends('layouts.admin')
@section('title', '登録済みの利用者情報')

@section('content')
    <div class="container">
        <div class="row">
            <h2>利用者情報</h2>
        </div>
        @if ($profile->user_id == Auth::id())
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('User\ProfileController@edit') }}" role="button" class="btn btn-primary">編集</a>
            </div>
            <div class="col-md-4">
                <a href="{{ action('User\ProfileController@delete') }}" role="button" class="btn btn-primary">削除</a>
            </div>
        </div>
        @endif
    </div>
    <div>
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <div class="row">
                    <div class="text col-md-6">
                        <div class="nickname">
                            <h4>ニックネーム： {{ $profile->nickname, 150 }}</h4>
                        </div>
                        <div class="favorite_travel_destination">
                            <h4>好きな旅行先： {{ $profile->favorite_travel_destination, 150 }}</h4>
                        </div>
                        <div class="self_introduction mt-3">
                            <h4>自己紹介： {{ $profile->self_introduction, 1500 }}</h4>
                        </div>
                    </div>
                    <div class="image col-md-6 text-right mt-4">
                        @if ($profile->my_image_path)
                            <img src="{{ asset('storage/my_image/' . $profile->my_image_path) }}">
                        @endif
                    </div>
                </div>
                <hr color="#c0c0c0">
            </div>
        </div>
    </div>
@endsection