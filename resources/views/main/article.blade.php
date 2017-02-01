@extends('layouts.main')

@section('metas')
    <meta name="description" content="{{$post->title}}">
    <meta name="keywords" content="{{$post->title}}">
    <meta property="og:url"           content="{{url('article')}}/{{$post->title_slug}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{$post->title}}" />
    <meta property="og:description"   content="{{strip_tags(str_limit($post->body,150))}}" />
    <meta property="og:image"         content="{{asset('').$post->photo->file}}" />
@stop
@section('title')

    {{$post->title}}

@stop

@section('content')

    <h1 style="margin-left: 40px; text-decoration: underline;margin-top: 70px;">{{$post->title}}</h1>
    <div style="width: 800px;margin-top: 50px;margin-left: 100px;">
        <div style="margin-top: 20px; max-width: 700px; max-height: 500px;">
            <img src="{{asset('').$post->photo->file}}" alt="{{$post->title}}" title="{{$post->title}}" style="max-width: 100%;max-height: 100%;">
        </div>

        <div style="margin-top: 100px; margin-left: 50px;">
           <h4 style="color: #5bc0de;">written By : {{$post->user->name}} </h4>
            <div style="margin-top: 50px;margin-bottom: 80px; font-size: 14px;">
                <?php echo $post->body; ?>
            </div>


            <div style="width: 450px;">
               Share Post : <br><br>
                <div class="fb-share-button" href="{{url('article/').$post->id}}" data-layout="button" data-size="large" data-mobile-iframe="true">

                </div>
                <br><br><br>
            </div>

        </div>
    </div>


    @stop

