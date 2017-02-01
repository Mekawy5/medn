@extends('layouts.main')

@section('title')

    MEDN | Search For {{$keyword}}

@stop


@section('content')


    <h1 style="color: #00b3ee; margin-left: 50px;">Results for {{$keyword}}: </h1>

    @foreach($posts as $post)

        <div style="width: 750px; height: 150px; margin-left: 100px; margin-top: 25px;">
            <div style="float: left;">
                <img width="200px;" src="{{asset('').$post->photo->file}}" alt="">
            </div>
            <div style="width: 500px; height: 100%; float: right;margin-left: -20px; ">
                <br><br><br>
                <a href="article/{{$post->title_slug}}"><h3>{{$post->title}}</h3></a>
            </div>
        </div>

    @endforeach

    <br><br>

    @stop