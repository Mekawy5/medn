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





    <h2><span class="glyphicon glyphicon-wrench"></span> Categories</h2>


    <h1 class="page-header"></h1>


   <div class="row">

       <div class="col-sm-5">
           <h3>Create Category</h3><hr>

           {!! Form::open(['method'=>'post','action'=>'AdminCategoryController@store']) !!}
           <div class="form-group">
               {!! Form::label('name','Category Name : ') !!}
               {!! Form::text('name',null,['class'=>'form-control']) !!}
           </div>
           <div class="form-group">
               {!! Form::submit('Create',['class'=>'btn btn-primary']) !!}
           </div>
           {!! Form::close() !!}

           @include('includes.form-error')

       </div>

<div class="col-sm-1"><div style="border-left:1px solid #eee;height:250px;"></div></div>


       <div class="col-sm-6">

           <h3>Categories exists : </h3><hr>

           @if($categories)

               <table class="table table-hover">
                   <thead>
                   <tr>
                       <th>ID</th>
                       <th>Name</th>
                       <th>Created Date</th>
                   </tr>
                   </thead>
                   @foreach($categories as $category)
                       <tbody>
                       <tr>
                           <td>{{$category->id}}</td>
                           <td>{{$category->name}}</td>
                           <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No Date Found!!'}}</td>
                           <td><a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-primary"> <span class="glyphicon glyphicon-edit"> Edit</span> </a></td>
                       </tr>
                       </tbody>
                   @endforeach
               </table>

           @endif

       </div>

   </div>

@stop