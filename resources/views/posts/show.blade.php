@extends("layouts.app_blog")
@section("title", "Post Details")

@section("content")
<h1>Judul: {{ $post->title }}</h1>
<p>{{ $post->content }}</p>
<hr>
@if ($post->image)
    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" style="max-width: 300px;">
@endif
<a href="{{ route('posts.index') }}" class="btn btn-primary">Kembali</a>
@endsection
