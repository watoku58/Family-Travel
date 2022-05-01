@extends('layouts.admin')
@section('title', '登録済みの利用者情報')

@section('content')
    <div class="container">
        <div class="row">
            <h2>利用者情報</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('User\ProfileController@create') }}" role="button" class="btn btn-primary">新規登録</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('User\ProfileController@edit') }}" role="button" class="btn btn-primary">編集</a>
            </div>
        </div>
        <div class="row">
            <ul class="card-contents">
                @foreach($posts as $profile)
                    <li>写真, {{ $profile->my_image_path, 100 }}</li>
                    <li>ニックネーム, {{ $profile->nickname, 100 }}</li>
                    <li>好きな旅行先, {{ $profile->favorite_travel_destination, 100 }}</li>
                    <li>自己紹介文, {{ $profile->self_introduction, 250 }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection