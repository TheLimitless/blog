@extends('layout')
@section('content')
<div class="wrapper" id="projects-single" style="background-color: #{{ $project->background }};">
    <main role="main" >

        <p><a class="project-back" href="{{ URL::previous() }}"><i class="fa fa-angle-left"></i> Назад</a></p>
        <p><img src="{{ asset('img/uploaded/' . $project->link_background) }}" alt="изображение со скриншотами из проекта"></p>
        <p class="project-description">
            {{ $project->description }}
        </p>        
        <p><a href="{{ 'http://' . $project->link }}" class="project-link">{{ $project->link }}</a></p>
        <p><a class="project-back" href="{{ URL::previous() }}"><i class="fa fa-angle-left"></i> Назад</a></p>
    </main>
</div><!-- #wrapper -->
@stop