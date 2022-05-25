@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center mb-5">
            @if(session('message'))
                <div class="col-10">
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                </div>
            @endif
            <div class="col-4">
                <div class="card">
                    <img src="{{ $post->image_url }}" alt="image of {{ $post->title }}">
                    <div class="card-body">
                        <h1 class="card-title mb-3">{{ $post->title }}</h1>
                        <h4 class="card-subtitle mb-3">{{ $post->created_at }}</h4>
                        @foreach ($post->categories as $category)
                            <span class="badge rounded-pill bg-dark text-white mb-3">{{$category->name}}</span>
                        @endforeach
                        <p class="card-text">{{ $post->content }}</p>
                        <div class="d-flex justify-content-around">
                            <a href="{{ route("admin.posts.edit", $post) }}" class="btn btn-sm btn-success me-2">Edit</a>
                            <form action="{{route('admin.posts.destroy', $post)}}" method="POST" class="post-form-destroyer" post-title="{{$post->title}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="btn btn-sm btn-danger">Delete</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10">
                <h3 class="title">Altri post dello stesso autore:</h3>
                @forelse ($post->user->posts as $relatedPost)
                    <a href="{{route('admin.posts.show', $relatedPost)}}">
                        <h6> {{ $relatedPost->title }}</h6>
                    </a>
                @empty
                    <h5>L'utente non ha scritto post</h5>
                @endforelse
            </div>
        </div>
    </div>
@endsection
