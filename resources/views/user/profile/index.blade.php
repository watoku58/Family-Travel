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
                        <div class="user-name">
                            <h4>{{ $profile->nickname }}さん</h4>
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
                            <img src="{{ $profile->my_image_path }}">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <hr color="#c0c0c0">
        @if (isset($favorites))
            <div class="posts col-md-8 mx-auto mt-3">
                <h3>お気に入り投稿</h3>
                @foreach($favorites as $favorite)
                    @if (is_null($favorite->topic)){{--topicが削除されていたら--}}
                        {{--@php
                            $favorite->delete();
                        @endphp--}}
                        @continue
                    @endif
                    <div class="post">
                        <div class="col-md-4" id="favorite-button">
                            <form action="{{ action('User\FavoriteController@toggle') }}" method="POST" class="mb-4" >
                                @csrf
                                <input type="hidden" name="topic_id" value="{{$favorite->topic_id}}">
                                <button type="submit">
                                    お気に入り解除
                                </button>
                            </form>
                        </div>
                        <a href="{{ action('User\TopicController@browse', ['id' => $favorite->topic_id ]) }}">
                            <div class="row">
                                <div class="text col-md-6">
                                    <div class="date">
                                        {{ $favorite->topic->updated_at->format('Y年m月d日') }}
                                    </div>
                                    <div class="title">
                                        {{ str_limit($favorite->topic->title, 50) }}
                                    </div>
                                    <div class="tavel_destination">
                                        旅行先：{{ $favorite->topic->travel_destination }}
                                    </div>
                                    <div class="body mt-3">
                                        {{ str_limit($favorite->topic->body, 100) }}
                                    </div>
                                </div>
                                <div class="image col-md-6 text-right mt-4">
                                    @if ($favorite->topic->image_path)
                                        <img src="{{ $favorite->topic->image_path }}">
                                    @endif
                                </div>
                            </div>
                        </a>
                        <div class="nickname">
                            @if (isset($favorite->topic->user->profile->nickname))
                                <a href="{{ action('User\ProfileController@index', ['id' => $favorite->topic->user->profile->id]) }}">
                                    by {{ $favorite->topic->user->profile->nickname }}さん
                                </a>
                            @else
                                    by {{ $favorite->topic->user->name }}さん
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
        
        @endif
    </div>
    <div>
        <hr color="#c0c0c0">
        <div class="posts col-md-8 mx-auto mt-3">
            <h3>{{ $profile->nickname}}さんの投稿</h3>
            @foreach($topics as $topic)
                <div class="post">
                    <a href="{{ action('User\TopicController@browse', ['id' => $topic->id ]) }}">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $topic->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($topic->title, 150) }}
                                </div>
                                <div class="tavel_destination">
                                    旅行先：{{ $topic->travel_destination }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($topic->body, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($topic->image_path)
                                    <img src="{{ $topic->image_path }}">
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            {{ $topics->appends(array('id' => $profile->id))->links() }}
        </div>
    </div>
@endsection