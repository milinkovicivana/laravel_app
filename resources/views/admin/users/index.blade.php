@extends('layouts.admin')



@section('content')

  @if(Session::has('created_user'))

    <p class="alert alert-success">{{session('created_user')}}</p>

  @elseif(Session::has('updated_user'))

    <p class="alert alert-success">{{session('updated_user')}}</p>

  @elseif(Session::has('deleted_user'))

    <p class="alert alert-danger">{{session('deleted_user')}}</p>

  @endif

<h1>Users</h1>

    <table class="table">
       <thead>
         <tr>
           <th>ID</th>
           <th>Photo</th>
           <th>Name</th>
           <th>Email</th>
           <th>Role</th>
           <th>Active</th>
           <th>Created</th>
           <th>Updated</th>

         </tr>
       </thead>
       <tbody>

       @if($users)

         @foreach($users as $user)

         <tr>
           <td>{{$user->id}}</td>
           <td><img src="{{$user->photo ? $user->photo->file : '/profile.png'}}" alt="" height="50"></td>
           <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
           <td>{{$user->email}}</td>
           <td>{{$user->role_id == null ? 'User has no role' : $user->role->name}}</td>
           <td>{{$user->is_active == 1 ? 'Yes' : 'No'}}</td>
           <td>{{$user->created_at->diffForHumans()}}</td>
           <td>{{$user->updated_at->diffForHumans()}}</td>
         </tr>

         @endforeach

       @endif

      </tbody>
    </table>

  <div class="row">
    <div class="col-sm-6 col-sm-offset-5">

      {{$users->render()}}

    </div>
  </div>

@stop