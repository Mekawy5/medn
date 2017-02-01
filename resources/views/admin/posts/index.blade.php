@extends('layouts.admin')

@section('content')


@foreach(['created','updated'] as $msg)
    @if(Session::has($msg))

        <div class="alert alert-success">
            <p>{{session($msg)}}</p>
        </div>

    @endif
@endforeach
@if(Session::has('deleted'))

    <div class="alert alert-danger">
        <p>{{session('deleted')}}</p>
    </div>

@endif

    <table class="table table-hover">
    <thead>
      <tr>
          <th>Id</th>
          <th>Photo</th>
          <th>User</th>
          <th>Category</th>
          <th>Title</th>
          <th>Body</th>
          <th>Update</th>
          <th>created</th>
          <th>updated</th>
          
      </tr>
    </thead>
    <tbody>
     @if($posts)
         @foreach($posts as $post)
             <tr>
                 <td>{{$post->id}}</td>
                 <td> <img height="80" width="80" src="{{$post->photo ? asset('').$post->photo->file : 'http://placehold.it/150x150' }}" class="img-responsive img-rounded"> </td>
                 <td>{{$post->user->name}}</td>
                 <td>{{$post->category->name}}</td>
                 <td>{{str_limit($post->title,20)}}</td>
                 <td>{{str_limit($post->body,20)}}</td>
                 <td><a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-primary"> <span class="glyphicon glyphicon-edit"> Edit</span> </a></td>
                 <td>{{$post->created_at->diffForHumans()}}</td>
                 <td>{{$post->updated_at->diffForHumans()}}</td>
             </tr>
         @endforeach
     @endif
    </tbody>
    </table>


@stop