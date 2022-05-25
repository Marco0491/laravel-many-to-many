@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-10">
                <form action="{{ route('admin.posts.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="title">Titolo</label>
                        <input type="text" name="title" id="title">
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="title">Scegli la/le categorie del tuo nuovo post</label>
                        <br>
                        @foreach ($categories as $category)
                            <input class="form-check-input" type="checkbox" name="category[]" value="{{$category->id}}">
                            <label for="categories" class="me-3">{{$category->name}}</label>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label for="image_url">Inserisci un'immagine</label>
                        <input type="text" name="image_url" id="image_url">
                        @error('image_url')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Inserisci il contenuto del tuo nuovo post</label>
                        <textarea class="form-control" id="content" rows="10" name="content" id="decontentcription"></textarea>
                        @error('content')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Pubblica il tuo nuovo post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
