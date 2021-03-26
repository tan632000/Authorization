@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{ route('create_post') }}">Add</a>
        </div>
        @foreach($posts as $post)
        <div class="col-md-4">
            <h2>{{ $post->title }}</h2>
            <p>{{ \Illuminate\Support\Str::limit($post->body, 100) }}</p>
            <p>
                <a class="btn btn-success" 
                href="{{ route('edit_post', ['post' => $post]) }}" 
                role="button">Chỉnh sửa</a>
                @can('post.publish')
                    <a class="btn btn-success" href="{{ route('publish_post', ['post' => $post]) }}" role="button">Xuất bản</a>
                @endcan
            </p>
        </div>
        @endforeach
    </div>
</div>
@endsection