@extends('layouts.admin')


@section('content')


    @if(Session::has('user_deleted'))
        <div class="alert alert-danger">
            <p>{{session('user_deleted')}}</p>
        </div>
    @endif
    @if(Session::has('user_updated'))
        <div class="alert alert-success">
            <p>{{session('user_updated')}}</p>
        </div>
    @endif
    @if(Session::has('user_created'))
        <div class="alert alert-success">
            <p>{{session('user_created')}}</p>
        </div>
    @endif
    @if(Session::has('email_exists'))
        <div class="alert alert-danger">
            <p>{{session('email_exists')}}</p>
        </div>
    @endif


    <h2>Users</h2>

    <table class="table table-hover">
    <thead>
          <tr>
              <th>User ID</th>
              <th>Photo</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Created</th>
              <th>Updated</th>
          </tr>
    </thead>
    <tbody>

    @if($users)
        @foreach($users as $user)
              <tr>
                  <td>{{$user->id}}</td>
                  <td><img height="80" width="80" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/150x150' }}" class="img-responsive img-rounded"></td>
                  <td><a href="{{ route('admin.users.edit',$user->id) }}">{{$user->name}}</a></td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->role->name}}</td>
                  <td>{{$user->is_active == 1 ?'Active' : 'Not Active'}}</td>
                  <td>{{$user->created_at->diffForHumans()}}</td>
                  <td>{{$user->updated_at->diffForHumans()}}</td>
              </tr>
        @endforeach
    @endif



    </tbody>
    </table>




@stop