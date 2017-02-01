@extends('layouts.admin')


@section('content')

    <h3>Edit User</h3>


    <div class="row">
        @include('includes.form-error')
    </div>

    <div class="row">

        <div class="col-sm-3">
            <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
        </div>




        <div class="col-sm-9">
            {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update' , $user->id],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name','Name : ') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email','E-Mail : ') !!}
                {!! Form::text('email',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active','Status : ') !!}
                {!! Form::select('is_active',array(1 => 'Active',0 => 'Not Active'),null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password','Password : ') !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id','Photo : ') !!}
                {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id','Role : ') !!}
                {!! Form::select('role_id',[''=>'Choose an option'] + $roles ,null,['class'=>'form-control']) !!}
            </div>


            <div class="row">

            <div class="col-sm-3">
                <div class="form-group">
                    {!! Form::submit('Update User',['class'=>'btn btn-primary','style'=>'width:150px']) !!}
                </div>

                {!! Form::close() !!}
            </div>
            <div class="col-sm-3">
                {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete  User',['class'=>'btn btn-danger','style'=>'width:150px']) !!}
                </div>
                {!! Form::close() !!}

            </div>
            </div>



        </div>

        <!---------------- DELETE FORM ---------------------->


















    </div>




@stop