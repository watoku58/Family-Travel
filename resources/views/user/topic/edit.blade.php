@extends('layouts.admin')

@section('title', '投稿の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>投稿編集</h2>
                <form action="{{ action('User\TopicController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $topic_form->title }}">
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-2" for="title">旅行先</label>
                        <div class="col-md-10">
                            {{--<input type="text" class="form-control" name="travel_destination" value="{{ $topic_form->travel_destination }}">--}}
                            <select type="text" class="form-control" name="travel_destination">                          
                                @foreach(config('pref') as $pref_id => $pref_name)
                                    <option value="{{ $pref_name }}">{{ $pref_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $topic_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">投稿文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" onkeyup="ShowLength(value);" name="body" rows="20">{{ $topic_form->body }}</textarea>
                            <p id="inputlength" style="margin-bottom:0px;">入力文字数</p><p>（10000字以内）</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $topic_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection