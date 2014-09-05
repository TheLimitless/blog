@extends('layout')

@section('content')
<div class="wrapper">
    @include('header')
    <main role="main">

        <div class="blog" id="blog-single">
            <h1>
                <span>Блог</span>
                <i class="fa fa-pencil"></i>
            </h1>
            <p>
                <a class="more" href="{{ URL::previous() }}">< Назад</a>
                <a class="more" href="{{ action('BlogController@getBlog') }}">Ко всем записям</a>
            </p>
            <article>
                <header>
                    <h2><a href="#">{{ $post->title }}</a></h2>
                    <p><time pubdate datetime="{{ explode(' ', $post->created_at)[0] }}">{{ $post->created_at_rus }}</time></p>
                </header>
                <p>
                    {{ $post->content }}
                </p>
                @if (!empty($post->categories))
                <div class="article-category-list">
                    @foreach($post->categories as $category)
                    <a href="{{ action('BlogController@getBlog', strtolower($category->name)) }}">{{ $category->name }}</a>
                    @endforeach
                </div>
                @endif
            </article>
        </div>

    </main>
</div><!-- #wrapper -->
@stop