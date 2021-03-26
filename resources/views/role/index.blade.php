@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{ route('role.add') }}">Add</a>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Name</th>
                <th scope="col">DisplayName</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($listRole as $role)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td>{{$role->name}}</td>
                        <td>{{$role->display_name}}</td>
                        <td>
                            <a class="btn btn-primary" href={{ route('role.edit', ['id' => $role->id])}}>Edit</a>
                            <a class="btn btn-danger" href={{ route('role.delete', ['id' => $role->id])}}>Delete</a>
                        </td>
                    </tr>
                @endforeach
              </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
