@extends('layouts.admin')


@section('styles')
   {{--<link rel="stylesheet" href="{{asset('js/editor/dist/ui/trumbowyg.min.css')}}">--}}
@stop


@section('content')


   <h2>Create posts</h2>

   <div class="row">
      {!! Form::open(['method'=>'post','action'=>'AdminPostsController@store','files'=>true]) !!}

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
      <div class="form-group">
         {!! Form::label('body','Description : ') !!}
         {!! Form::textarea('body',null,['id'=>'#tiny','rows'=>18]) !!}
      </div>



      <div class="form-group">
         {!! Form::submit('Create',['class'=>'btn btn-primary','style'=>'width:150px;margin-top:25px;']) !!}
      </div>
      {!! Form::close() !!}
   </div>


   <div class="row">
      @include('includes.form-error')
   </div>


@stop


@section('footer')

@extends('includes.tinyscript')

@stop