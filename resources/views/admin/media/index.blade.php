@extends('layouts.admin')


@section('content')


    @if(session('updated'))
        <div class="alert alert-success"><p> {{session('updated')}} </p></div>
    @endif
    @if(session('deleted'))
        <div class="alert alert-danger"><p> {{session('deleted')}} </p></div>
    @endif
    @if(session('edited'))
        <div class="alert alert-success"><p> {{session('edited')}} </p></div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger"><p> {{session('error')}} </p></div>
    @endif
    @if(session('no titleness media'))
        <div class="alert alert-warning"><p> {{session('no titleness media')}} </p></div>
    @endif


    <h2>Media</h2>

    <br><br>

    @if($photos)
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Date Created</th>
            </tr>
            </thead>
                <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td>{{str_limit($photo->file,25)}}</td>
                    <td><img height="100" width="100" src="{{file_exists(public_path().$photo->file) ? $photo->file : 'http://placehold.it/150x150' }}" alt=""></td>
                    <td>{{$photo->created_at->diffForHumans()}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['AdminMediaController@destroy' , $photo->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                            </div>
                        {!! Form::close() !!}
                    </td>
                  </tr>
            @endforeach
                </tbody>
            </table>

    @endif

@stop