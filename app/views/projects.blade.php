@extends('layout')

@section('content')
<div class="wrapper">
    @include('header')
    <main role="main">

        <div class="blog" id="project-list">
            <h1>
                <span>Проекты</span>
                <i class="fa fa-cog"></i>
            </h1>
            @if (!isset($projects))
            <p class="error">{{ "Записи отсутствуют" }}</p>
            @else
            @foreach($projects as $project)
            <article>
                <figure>
                    <a href="{{ route('project.show', $project->id) }}">
                        <img src="{{ asset('img/uploaded/'.$project->link_cover) }}" width="680px" alt="обложка проекта">
                    </a>
                </figure>
                <h1>
                    <a href="{{ route('project.show', $project->id) }}">{{ $project->title }}</a>
                </h1>
                <time datetime="{{ explode(' ', $project->created_at)[0] }}">{{ $project->created_at_rus }}</time>
                <a class="more" href="{{ route('project.show', $project->id) }}">Подробнее...</a>
            </article>
            @endforeach
                {{ $projects->links() }}
            @endif
        </div>
    </main>
</div><!-- #wrapper -->
@stop