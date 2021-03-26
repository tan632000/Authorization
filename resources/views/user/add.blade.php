@extends('layouts.app')
@section('content')
<div class="container">
    <form method="POST" action="">
        @csrf
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" placeholder="Enter name" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
        </div>
        <div class="form-group">
            <label>Re-password</label>
            <input type="password" name="confirm_password" class="form-control" placeholder="Re-Enter password">
        </div>
        <div class="form-group">
            <label>Roles:</label>
            <select class="form-control" name="roles[]" multiple="multiple">
                @foreach ($roles as $role)
                    <option value="{{$role->id}}">{{$role->display_name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
