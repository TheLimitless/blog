@extends('layout')

@section('content')
<div class="wrapper">
    @include('header')
    <main role="main">

        <div class="blog page-full" id="admin">
            <h1>
                <span>Панель управления</span>
                <i class="fa fa-tachometer"></i>
            </h1>
            @if(Session::has('success'))
            <span class="success">
                {{Session::get('success')}}
            </span>
            @endif
            <section id="dash-board">
                <a class="more" href="{{ route('post.new') }}">+ Новая статья</a>
                <a class="more" href="{{ route('project.new') }}">+ Новый проект</a>
                <a class="more" href="{{ action('BlogController@getLogout') }}">Выход</a>

                <section>
                    <h2>Проекты</h2>
                    @if (!isset($projects))
                        <p class="error">{{ "Проекты отсутствуют" }}</p>
                    @else
                    @foreach($projects as $project)
                    <article>
                        <a class="more" href="{{ route('project.delete', $project->id) }}">- Удалить</a>
                        <a class="more" href="{{ route('project.edit', $project->id) }}"><i class="fa fa-pencil"></i> Изменить</a>
                        <time>{{ explode(' ', $project->created_at)[0] }}</time>
                        <span>{{ $project->title }}</span>
                    </article>
                    @endforeach
                    @endif
                </section>
                <section>
                    <h2>Записи</h2>
                    @if (!isset($posts))
                        <p class="error">{{ "Записи отсутствуют" }}</p>
                    @else
                    @foreach($posts as $post)
                    <article>
                        <a class="more" href="{{ route('post.delete', $post->id) }}">- Удалить</a>
                        <a class="more" href="{{ route('post.edit', $post->id) }}"><i class="fa fa-pencil"></i> Изменить</a>
                        <time>{{ explode(' ', $post->created_at)[0] }}</time>
                        <span>{{ $post->title }}</span>
                    </article>
                    @endforeach
                    @endif
                </section>
            </section>
        </div>
    </main>
</div><!-- #wrapper -->
@stop