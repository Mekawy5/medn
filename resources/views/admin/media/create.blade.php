@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

@stop



@section('content')

    <h3>Upload Media </h3>


    <h1 class="page-header"></h1><br>



    {!! Form::open(['method'=>'post','action'=>'AdminMediaController@store','class'=>'dropzone','file'=>true]) !!}

    {!! Form::close() !!}

@stop


@section('footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

@stop