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
                        <h1 class="card-title">{{ $post->title }}</h1>
                        <h4 class="card-subtitle">{{ $post->created_at }}</h4>
                        <p class="card-text">{{ $post->content }}</p>
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
