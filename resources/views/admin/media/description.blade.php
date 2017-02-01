@extends('layouts.admin')


@section('content')


    @if(session('updated'))
        <div class="alert alert-success"><p> {{session('updated')}} </p></div>
    @endif
    @if(session('deleted'))
        <div class="alert alert-danger"><p> {{session('deleted')}} </p></div>
    @endif


    <h2>Add Media Description </h2>

    <br><br>

    @if($photos)
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Image</th>
                <th>Current title</th>
                <th>New title</th>

            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td><img width="250" height="150" src="{{asset('').$photo->file}}" alt=""></td>
                    <td>{{$photo->title ? $photo->title : 'No Title'}}</td>
                    <td>
                        {!! Form::open(array('action' => ['AdminMediaController@update', $photo->id],'method' => 'PATCH')) !!}
                        <div class="form-group">
                            <div class="form-group">
                                {!! Form::label('title','Title : ') !!}
                                {!! Form::text('title',null,['class'=>'form-control']) !!}
                            </div>
                            {!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endif

@stop