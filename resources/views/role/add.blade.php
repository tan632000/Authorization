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
            <label>Display Name</label>
            <input type="text" name="display_name" class="form-control" placeholder="Enter displayname" required>
        </div>
        @foreach ($listPermissions as $permission)
            <div class="form-check">
                <input type="checkbox" value="{{$permission->id}}" class="form-check-input" name="permissions[]">
                <label class="form-check-label">{{$permission->display_name}}</label>
            </div>
        @endforeach
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
