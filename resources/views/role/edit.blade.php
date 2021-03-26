@extends('layouts.app')
@section('content')
<div class="container">
    <form method="POST" action="">
        @csrf
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{$role->name}}" required>
        </div>
        <div class="form-group">
            <label>Display Name</label>
            <input type="text" name="display_name" class="form-control" placeholder="Enter displayname" value="{{$role->display_name}}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
