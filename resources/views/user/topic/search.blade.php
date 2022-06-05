@extends('layouts.admin')
@section('title', '検索結果')

@section('content')
    <div class="container">
        <div>
        @if(!empty($topics))
            <div class="row">
                <h3>「{{$cond_title}}」で検索しました</h3>
            </div>
            <hr color="#c0c0c0">
            <div class="row">
                <div class="posts col-md-8 mx-auto mt-3">
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
                            <div class="nickname">
                            @if (isset($topic->user->profile->nickname))
                                <a href="{{ action('User\ProfileController@index', ['id' => $topic->user->profile->id ]) }}">
                                    by {{ $topic->user->profile->nickname }}さん
                                </a>
                            @else
                                    by{{ $topic->user->name}}さん
                            @endif
                            </div>
                        </div>
                        <hr color="#c0c0c0">
                    @endforeach
                    {{ $topics->appends(array('cond_title' => $cond_title))->links() }}
                </div>
            </div>
        @else
            <h3>検索結果はありません</h3>
        @endif
    </div>
@endsection