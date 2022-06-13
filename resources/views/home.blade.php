@extends('layouts.admin')

@section('title', 'Family Travel')

@section('content')
<div class="container">
    <div class="navigation">
        <ul class="navigation">
            <li><a href="{{ url('/') }}">トップ</a></li>
            <li><a href="{{ url('/user/topic/create') }}">新規投稿</a></li>
            <li><a href="{{ url('/user/topic') }}">投稿履歴</a></li>
            <li><a href="{{ url('/user/profile/browse') }}">利用者情報</a></li>
        </ul>
    </div>
    <div>
        <hr color="#c0c0c0">
        <h3 class="text-title">投稿を探す</h3>
        <div class="col-md-8">
            <form action="{{ action('User\TopicController@search') }}" method="get">
                <div class="form-group row">
                    <label class="col-md-2">キーワードで探す</label>
                    <div class="col-md-8">
                        <input type="text" id="input_text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                    </div>
                    <div class="col-md-2">
                        {{ csrf_field() }}
                        <input type="submit" id="button" class="btn btn-primary" value="検索">
                    </div>
                </div>
            </form>
            <form action="{{ action('User\TopicController@search') }}" method="get">
                <div class="form-group row">
                    <label class="col-md-2">エリアから探す</label>
                    <div class="col-md-8">
                        <select type="text" class="form-control" name="travel_destination">                          
                            @foreach(config('pref') as $pref_id => $pref_name)
                                <option value="{{ $pref_name }}">{{ $pref_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="検索">
                    </div>
                </div>
            </form>
        </div>
    </div>            
    <div>
        <hr color="#c0c0c0">
        <h3 class="text-title">最新の投稿</h3>
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
                                        {{ str_limit($post->title, 50) }}
                                    </div>
                                    <div class="tavel_destination">
                                        旅行先：{{ $post->travel_destination }}
                                    </div>
                                    <div class="body mt-3">
                                        {{ str_limit($post->body, 100) }}
                                    </div>
                                </div>
                                <div class="image col-md-6 text-right mt-4">
                                    @if ($post->image_path)
                                        <img src="{{ $post->image_path }}">
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
                @endforeach
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
