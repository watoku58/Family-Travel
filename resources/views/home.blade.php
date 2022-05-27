@extends('layouts.admin')

@section('title', 'Family Travel')

@section('content')
<div class="container">
    <div class="navigation">
        <ul class="navigation">
            <li><a href="{{ url('/') }}">トップ</a></li>
            <li><a href="{{ url('/user/topic/create') }}">新規投稿</a></li>
            <li><a href="{{ url('/user/topic') }}">投稿履歴</a></li>
            <li><a href="{{ url('/user/profile/view') }}">利用者情報</a></li>
        </ul>
    </div>
    <div class="card-contents">
        <h3 class="text-title">最新の投稿</h2>
    </div>
    <div>
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <a href="{{ action('User\TopicController@browse', ['id' => $post->id ]) }}">
                            <div class="row">
                                <div class="text col-md-6">
                                    <div class="date">
                                        {{ $post->updated_at->format('Y年m月d日') }}
                                    </div>
                                    <div class="title">
                                        {{ str_limit($post->title, 150) }}
                                    </div>
                                    <div class="body mt-3">
                                        {{ str_limit($post->body, 1500) }}
                                    </div>
                                </div>
                                <div class="image col-md-6 text-right mt-4">
                                    @if ($post->image_path)
                                        <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                    @endif
                                </div>
                            </div>
                        </a>
                        <div class="nickname">
                        @if (isset($post->user->profile->nickname))
                            <a href="{{ action('User\ProfileController@index', ['id' => $post->user->profile->id ]) }}">
                                by {{ $post->user->profile->nickname }}さん
                            </a>
                        @else
                                by{{ $post->user->name}}さん
                        @endif
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
