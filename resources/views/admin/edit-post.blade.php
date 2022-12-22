@extends('layout')
@section('title')
    <title>adminpage</title>
@section('content')
    <section class="px-6 py-8 border border-gray-200 p-6 rounded-xl max-w-sm mx-auto">

        <form action="/admin/posts/{{ $post->id }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}



            <label for="country_name">Title:</label>
            <input type="text" class="form-control" name="title" value="{{ $post->title }}" />
            </div>
            <div class="form-group">
                <label for="cases">Slug :</label>
                <input type="text" class="form-control" name="slug" value="{{ $post->slug }}" />
            </div>
            <div class="form-group">
                <label for="cases">Excerpt:</label>
                <input type="text" class="form-control" name="excerpt" value="{{ $post->excerpt }}" />
            </div>
            <div class="form-group">
                <label for="cases">Body:</label>
                <input type="text" class="form-control" name="body" value="{{ $post->body }}" />
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </section>
@endsection
