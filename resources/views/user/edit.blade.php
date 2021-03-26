@extends('layouts.app')
@section('content')
<div class="container">
    <form method="POST" action="">
        @csrf
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{$user->name}}" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{$user->email}}" required>
        </div>
        <div class="form-group">
            <label>Roles:</label>
            <select class="form-control" name="roles[]" multiple="multiple">
                @foreach ($roles as $role)
                    <option 
                        {{$listRole->contains($role->id) ? 'selected' : ''}}
                        value="{{$role->id}}"
                    >{{$role->display_name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
