@extends('layouts.admin')



@section('content')


    <div class="col-sm-8">
        <h3>Create Category</h3><hr>

        {!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoryController@update',$category->id]]) !!}
        <div class="form-group">
            {!! Form::label('name','Category Name : ') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="col-md-3">
            <div class="form-group">
                {!! Form::submit('Edit Category',['class'=>'btn btn-primary','style'=>'width:100%']) !!}
            </div>
            {!! Form::close() !!}
        </div>

        <div class="col-md-3">
            {!! Form::open(['method'=>'delete','action'=>['AdminCategoryController@destroy',$category->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Category',['class'=>'btn btn-danger','style'=>'width:100%']) !!}
            </div>
            {!! Form::close() !!}
        </div>


        @include('includes.form-error')

    </div>


@stop