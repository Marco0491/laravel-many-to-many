@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            @if(session('deleted-message'))
                <div class="col-10">
                    <div class="alert alert-danger">
                        {{session('deleted-message')}}
                    </div>
                </div>
            @endif

            @if(session('message'))
                <div class="col-10">
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                </div>
            @endif

            <div class="col-8">
                <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Nuovo post</a>
            </div>

            <div class="col-8">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Titolo</th>
                            <th>Autore</th>
                            <th>Creato il</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>
                                    <a href="{{route("admin.posts.show", $post)}}">
                                        {{ $post->title }}
                                    </a>
                                </td>
                                <td>
                                    {{ $post->user->name }}
                                </td>
                                <td>
                                    {{ $post->user->created_at }}
                                </td>
                                {{-- <td>
                                    @foreach ($post->categories as $category)
                                        <span class="badge rounded-pill" style="background-color: {{$category->color}}" >{{$category->name}}</span>
                                    @endforeach
                                </td> --}}
                                <td class="d-flex">
                                    <a href="{{ route("admin.posts.edit", $post) }}" class="btn btn-success btn-sm me-2">Edit</a>
                                    <form action="{{route('admin.posts.destroy', $post)}}" method="POST" class="post-form-destroyer" post-title="{{$post->title}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"  class="btn btn-danger btn-sm ">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Non ci sono post da mostrare</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection