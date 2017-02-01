@extends('layouts.main')

@section('title')

    MEDN | {{ucfirst($key)}}

@stop

@section('content')

    <br><br><h1 style="color: #00b3ee;margin-left: 100px;padding-bottom: 15px; width: 700px; border-bottom: 1px solid #00b3ee;">{{ucfirst($key)}}</h1>

    @foreach($articles as $article)

        <div style="margin-top: 100px; margin-left: 100px;width: 80%;">
            <div style="float: left;">
                <img width="150" src="{{asset('').$article->photo->file}}" alt="">
            </div>
            <div style="margin-left:18%;">
                <h3><a href="{{url('article').'/'.$article->title_slug}}">{{$article->title}}</a></h3>
                <p>{{str_limit(strip_tags($article->body),500)}}</p>
            </div>
        </div>

    @endforeach
    <br><br><br>
        {{$articles->links()}}
    <br><br>

@stop