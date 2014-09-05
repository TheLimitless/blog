@extends('layout')

@section('content')
<div class="wrapper">
    @include('header')
    <main role="main">

        <div class="blog page-full" id="login">
            <h1>
                <span>Вход</span>
                <i class="fa fa-info"></i>
            </h1>

            <form action="{{ action('BlogController@postLogin') }}" method="post">
                <label>Имя</label>
                <input id="username" type="text" name="username" value="{{ Input::old('username') }}" placeholder="Имя пользователя" required="required">
                <label>Пароль</label>
                <input id="password" type="password" name="password" value="" placeholder="Пароль пользователя" required="required">
                @if($errors->has())
                    @foreach ($errors->all() as $message)
                        <span class="alert">{{ $message }}</span>
                    @endforeach
                @endif
                @if(Session::has('failure'))
                    <span class="alert">{{ Session::get('failure') }}</span>
                @endif
                <input type="submit" value="Войти">
            </form>
        </div>
    </main>
</div><!-- #wrapper -->
@stop