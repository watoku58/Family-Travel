@extends('layouts.admin')

@section('title', '投稿の閲覧')

@section('content')
    <div>
        <form action="{{ action('User\TopicController@favorite') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <input type="submit" class="btn btn-primary" value="登録">
        </form>
        
        
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <div class="row">
                    <div class="text col-md-6">
                        <div class="date">
                            {{ $post->updated_at->format('Y年m月d日') }}
                        </div>
                        <div class="title">
                            {{ $post->title, 150) }}
                        </div>
                        <div class="body mt-3">
                            {{ $post->body, 1500) }}
                        </div>
                        //<div class="nickname">
                            //{{ $profile->nickname, 150) }}
                        //</div>
                    </div>
                    <div class="image col-md-6 text-right mt-4">
                        @if ($post->image_path)
                            <img src="{{ asset('storage/image/' . $post->image_path) }}">
                        @endif
                    </div>
                </div>
                <hr color="#c0c0c0">
            </div>
        </div>
    </div>
@endsection