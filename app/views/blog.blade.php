@extends('layout')

@section('content')
<div class="wrapper">
    @include('header')
    <main role="main">

        <aside id="sidebar">
            <section id="widget-search">
                <form action="{{ action('BlogController@getSearch') }}" method="get" class="searchform" role="search">
                    <fieldset>
                        <button type="submit"><i class="fa fa-search"></i></button>
                        <input required="required" type="text" name="s" value="" placeholder="Поиск...">
                    </fieldset>
                </form>
            </section>
            <section id="widget-recent">
                <h2>Последние записи</h2>

                @if (!isset($recentPosts))
                    <p class="error">{{ "Записи отсутствуют" }}</p>
                @else
                <ul>
                @foreach($recentPosts as $post)
                    <li><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></li>
                @endforeach
                </ul>
                @endif
            </section>
            <section id="widget-categories">
                <h2>Категории</h2>

                @if (!isset($categories))
                <p class="error">{{ "Категории отсутствуют" }}</p>
                @else
                <ul>
                    @foreach($categories as $category)
                    <li><a href="{{ action('BlogController@getBlog', strtolower($category->name)) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
                @endif
            </section>
        </aside>

        <div class="blog">
            <h1>
                <span>Блог</span>
                <i class="fa fa-pencil"></i>
            </h1>
            <h2>{{ $pageTitle }}</h2>
            @if (!isset($posts))
                <p class="error">{{ "Записи отсутствуют" }}</p>
            @else
            @foreach($posts as $post)
                <article>
                    <header>
                        <h2><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h2>
                        <p><time pubdate datetime="{{ explode(' ', $post->created_at)[0] }}">{{ $post->created_at_rus }}</time></p>
                    </header>
                    <p>
                        {{{ $post->beginning }}}
                        <a href="{{ route('post.show', $post->id) }}">читать далее...</a>
                    </p>

                    @if (!empty($post->categories))
                    <div class="article-category-list">
                    @foreach($post->categories as $category)
                        <a href="{{ action('BlogController@getBlog', strtolower($category->name)) }}">{{ $category->name }}</a>
                    @endforeach
                    </div>
                    @endif
                </article>

            @endforeach
                {{ $posts->links() }}
            @endif
        </div>
    </main>
</div><!-- #wrapper -->
@stop