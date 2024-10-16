@extends("layouts.app_blog")
@section("title", "Category Details")

@section("content")
<h2>Judul kategori :</h2>
<p style="font-weight: bolder;">
    {{ $category->name }}
</p>
<h4>Deskripsi kategori : </h4>
<p>
    {{ $category->description }}
</p>
<hr>
<a href="{{ route('categories.index') }}" class="btn btn-primary">Kembali</a>
@endsection
