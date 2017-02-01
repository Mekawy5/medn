@extends('layouts.admin')

@section('content')


    <h2>Update posts</h2>

    <div class="row">
        <div class="col-sm-3">
            <img src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" class="img-responsive img-rounded" alt="">
        </div>
        
        
        <div class="col-sm-9">
            {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('title','Title : ') !!}
                {!! Form::text('title',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category_id','Category : ') !!}
                {!! Form::select('category_id',[''=>'Choose Category'] + $categories ,null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id','Photo : ') !!}
                {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
            </div>
            </div>
            <div class="form-group">
                {!! Form::label('body','Description : ') !!}
                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>18]) !!}
            </div>



            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::submit('Update Post',['class'=>'btn btn-primary','style'=>'width:100%']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>


                <div class="col-md-3">
                    {!! Form::open(['method'=>'delete','action'=>['AdminPostsController@destroy',$post->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete Post',['class'=>'btn btn-danger','style'=>'width:100%']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>






    <div class="row">
        @include('includes.form-error')
    </div>

@stop


@section('footer')

    @extends('includes.tinyscript')

@stop