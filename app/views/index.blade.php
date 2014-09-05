@extends('layout')

@section('content')
<div class="wrapper landing">

    <header>
        @include('menu')
        <p><img id="author-image" src="{{ asset('img/author.png') }}" alt="фотография автора блога - Евгения Потапова"></p>
        <h2 id="author-name">Евгений Потапов</h2>
        <small id="author-job">Web Developer</small>
        <div id="author-social">
            <a href="https://www.facebook.com/profile.php?id=100005330655097"><i class="fa fa-facebook"></i></a>
            <a href="PotapovEugene"><i class="fa fa-skype"></i></a>
            <a href="http://vk.com/id222088525"><i class="fa fa-vk"></i></a>
            <a href="mailto:840850@gmail"><i class="fa fa-google"></i></a>
        </div>
    </header>

    <div id="mission">
        <p>Make a future today </p>
    </div>

    <main role="main">
        <div id="contacts">
            <a id="contacts-linked" href="https://www.linkedin.com/in/eugenepotapov"></a>
            <a id="contacts-git" href="#"></a>
            <a id="contacts-hh" href="http://hh.ru/resume/c8e57974ff01cd5ba20039ed1f6f794a505a59"></a>
        </div>
        <div id="contacts-small">
            <a href="https://www.linkedin.com/in/eugenepotapo"><i class="fa fa-linkedin-square"> LinkedIn</i></a>
            <a href="#"><i class="fa fa-git-square"> GitHub</i></a>
            <a href="http://hh.ru/resume/c8e57974ff01cd5ba20039ed1f6f794a505a59"><i class="fa fa-pencil-square"> HeadHunter</i></a>
        </div>

        <section id="recent-project">
            <h1>
                <span>Последний проект</span><i class="fa fa-cog"></i>
            </h1>
            @if (!isset($recentProject))
                <p class="error">{{ "Записи отсутствуют" }}</p>
            @else
            <article>
                <figure>
                    <a href="{{ route('project.show', $recentProject->id) }}">
                        <img src="{{ asset('img/uploaded/'. $recentProject->link_cover) }}" alt="обложка последнего проекта">
                    </a>
                </figure>
                <h2>
                    <a href="{{ route('project.show', $recentProject->id) }}">{{ $recentProject->title }}</a>
                </h2>
                <time datetime="{{ explode(' ', $recentProject->created_at)[0] }}">{{ $recentProject->created_at_rus }}</time>
            </article>
            @endif
        </section>

        <section id="recent-article">
            <h1>
                <span>Последняя запись</span><i class="fa fa-pencil"></i>
            </h1>
            @if (!isset($recentPost))
                <p class="error">{{ "Записи отсутствуют" }}</p>
            @else
            <article>
                <header>
                    <h2>
                        <a href="{{ route('post.show', $recentPost->id) }}">{{ $recentPost->title }}</a>
                    </h2>
                    <time datetime="{{ explode(' ', $recentPost->created_at)[0] }}">{{ $recentPost->created_at_rus }}</time>
                </header>
                <p>
                    {{{ $recentPost->beginning }}}
                </p>
                <a href="{{ route('post.show', $recentPost->id) }}" class="more">Далее...</a>
            </article>
            @endif
        </section>

        <section id="technologies">
            <h1>
                <span>Технологии</span><i class="fa fa-shield"></i>
            </h1>
            <div>
            <section>
                <h3 id="technologies-php"><span>PHP</span></h3>
                <p>
                    Надежная основа масштабируемого веб-приложения - PHP 5.5+
                    и MVC-фреймворки.
                </p>
            </section>

            <section>
                <h3 id="technologies-html"><span>HTML</span></h3>
                <p>
                    Семантический, чистый и опрятный HTML5.
                    Новейшие стандарты на плечах обратной совместимости.
                </p>
            </section>

            <section>
                <h3 id="technologies-js"><span>JavaScript</span></h3>
                <p>
                    Богатая функциональность и ненавязчивый JavaScript на базе jQuery
                    и без него.
                </p>
            </section>

            <section>
                <h3 id="technologies-css"><span>CSS</span></h3>
                <p>
                    Адаптивный дизайн для любого экрана.
                    Отделение внешнего представления от содержания и структуры страницы.
                </p>
            </section>

            <section>
                <h3 id="technologies-git"><span>GitHub</span></h3>
                <p>
                    Роль систем
                    контроля версий Git и SVN в разработке
                    современных веб-приложений сложно
                    переоценить.
                </p>
            </section>
           </div>
        </section>
    </main>
</div><!-- #wrapper -->
@stop