@extends('layouts.admin')

@section('title', '利用者情報の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>利用者情報編集</h2>
                <form action="{{ action('User\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">ニックネーム</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="nickname" value="{{ $profile_form->nickname }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="my_image">
                            <div class="form-text text-info">
                                設定中: {{ $profile_form->my_image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">好きな旅行先</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="favorite_travel_destination" value="{{ $profile_form->favorite_travel_destination }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="body">自己紹介文</label>
                        <div class="col-md-10">
                            <textarea maxlength="500" class="form-control" onkeyup="ShowLength(value);" name="self_introduction" rows="20">{{ $profile_form->self_introduction }}</textarea>
                            <p id="inputlength" style="margin-bottom:0px;">入力文字数</p><p>（500字以内）</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection