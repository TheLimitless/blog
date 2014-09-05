@extends('layout')

@section('content')
<div class="wrapper">
    @include('header')
    <main role="main">

        <div class="blog page-full" id="admin-new">
            <h1>
                <span>Редактировать статью</span>
                <i class="fa fa-pencil"></i>
            </h1>

            <form action="{{ route('post.update', $post->id) }}" method="post">
                <label>Заголовок</label>
                <input value="{{ Input::old('title', $post->title) }}" class="input-full" required="required" type="text" id="title" name="title" placeholder="заголовок">

                <label>Категории (через пробел)</label>
                <input value="{{ Input::old('categories', $post->categories) }}" class="input-full" type="text" id="categories" name="categories" placeholder="категории">

                <label>Введите содержание </label>
                <textarea required="required" class="input-full full-size"  id="content" name="content">{{ Input::old('content', $post->content) }}</textarea>
                @if($errors->has())
                    @foreach ($errors->all() as $message)
                        <span class="alert">{{ $message }}</span>
                    @endforeach
                @endif
                <input type="submit" value="Внести изменения">
            </form>
        </div>
    </main>
</div><!-- #wrapper -->
@stop