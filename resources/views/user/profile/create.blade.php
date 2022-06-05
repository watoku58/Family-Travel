@extends('layouts.admin')

@section('title', '利用者情報登録')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>利用者情報登録</h2>
                <form action="{{ action('User\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">ニックネーム</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="nickname" value="{{ old('nickname') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="my_image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">好きな旅行先</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="favorite_travel_destination" value="{{ old('favorite_travel_destination') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介</label>
                        <div class="col-md-10">
                            <textarea maxlength="500" class="form-control" onkeyup="ShowLength(value);" name="self_introduction" rows="20">{{ old('self_introduction') }}</textarea>
                            <p id="inputlength" style="margin-bottom:0px;">入力文字数0</p><p>（500字以内）</p>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
            </div>
        </div>
    </div>
@endsection