@extends('layouts.admin')
@section('title', '登録済み投稿の一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h1>投稿一覧</h1>
        </div>
        <div class="row">
            {{--<div class="col-md-4">
                <a href="{{ action('User\TopicController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>--}}
            <div class="col-md-8">
                <form action="{{ action('User\TopicController@index') }}" method="get">
                    <div class="form-group row">
                        {{--<label class="col-md-2">タイトル</label>--}}
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="20%">タイトル</th>
                                <th width="10%">旅行先</th>
                                <th width="50%">投稿文</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $topic)
                                <tr>
                                    <th>{{ \Str::limit($topic->title, 100) }}</th>
                                    <td>{{ $topic->travel_destination }}</td>
                                    <td>{{ \Str::limit($topic->body, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('User\TopicController@edit', ['id' => $topic->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('User\TopicController@delete', ['id' => $topic->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection