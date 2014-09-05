@extends('layout')

@section('content')
<div class="wrapper">
    @include('header')
    <main role="main">

        <div class="blog page-full" id="admin-new">
            <h1>
                <span>Новый проект</span>
                <i class="fa fa-cog"></i>
            </h1>

            <form action="{{ route('project.update', $project->id) }}" enctype="multipart/form-data" method="post">
                <label>Заголовок</label>
                <input value="{{ Input::old('title', $project->title) }}" class="input-full" required="required" type="text" id="title" name="title" placeholder="заголовок">

                <label>Технологии (через пробел)</label>
                <input value="{{ Input::old('features', $project->features) }}" class="input-full" type="text" id="features" name="features" placeholder="технологии">

                <label>Ссылка на проект</label>
                <input value="{{ Input::old('link', $project->link) }}" class="input-full" type="text" id="link" name="link" placeholder="http://">

                <label>Загрузить миниатюру (440x270)</label>
                <img src="{{ asset('img/uploaded/' . $project->link_cover) }}" alt="обложка проекта" width="200px">
                <input value="{{ Input::old('image-cover') }}" type="file" name="image-cover" id="image-cover">


                <label>Загрузить полное изображение (962x1816)</label>
                <img src="{{ asset('img/uploaded/' . $project->link_background) }}" alt="полное изображение проекта" width="200px">
                <input value="{{ Input::old('image-full') }}" type="file" name="image-full" id="image-full">

                <label>Фоновый цвет (6 символов)</label>
                <input value="{{ Input::old('background', $project->background) }}" required="required" type="text" id="background" name="background" placeholder="#">

                <label>Введите описание </label>
                <textarea required="required" class="input-full"  id="description" name="description">{{ Input::old('description', $project->description) }}</textarea>
                @if($errors->has())
                    @foreach ($errors->all() as $message)
                        <span class="alert">{{ $message }}</span>
                    @endforeach
                @endif
                <input type="submit" value="Опубликовать">
            </form>
        </div>
    </main>
</div><!-- #wrapper -->
@stop