@extends('layouts.admin')



@section('content')

    @if(Session::has('created_category'))

        <p class="alert alert-success">{{session('created_category')}}</p>

    @elseif(Session::has('updated_category'))

        <p class="alert alert-success">{{session('updated_category')}}</p>

    @elseif(Session::has('deleted_category'))

        <p class="alert alert-danger">{{session('deleted_category')}}</p>

    @endif

  <h1>Categories</h1>


  <div class="col-sm-6">

      {!! Form::open(['action'=>'AdminCategoriesController@store']) !!}

      <div class="form-group">

          {!! Form::label('name', 'Name:') !!}
          {!! Form::text('name', null, ['class'=>'form-control']) !!}

      </div>
      <div class="form-group">

          {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}

      </div>

      {!! Form::close() !!}


      @include('includes.formError')


  </div>

  <div class="col-sm-6">

      <table class="table">
          <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Created</th>
              <th>Updated</th>
          </tr>
          </thead>
          <tbody>

          @if($categories)

              @foreach($categories as $category)

                  <tr>
                      <td>{{$category->id}}</td>
                      <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                      <td>{{$category->created_at != null? $category->created_at->diffForHumans() : ""}}</td>
                      <td>{{$category->updated_at != null? $category->updated_at->diffForHumans() : ""}}</td>
                  </tr>

              @endforeach

          @endif

          </tbody>
      </table>

  </div>





@stop