<nav id="admin-menu">
    <ul>
        <li><a href="{{ route('dash') }}">Главное меню</a></li>
        <li><a href="{{ route('post.new') }}">+ Создать запись</a></li>
        <li><a href="{{ route('project.new') }}">+ Создать проект</a></li>
        <li><a href="{{ action('BlogController@getLogout') }}">Выход</a></li>
    </ul>
</nav>