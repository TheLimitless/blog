<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <title>{{ $title }}</title>
    <meta name="keywords" content="Потапов, Евгений, веб-разработка, сайты, программирование, дизайн, заметки, проекты, портфолио, контакты, блог, статьи">
    <meta name="description" content="Евгений Потапов - разработка сайтов. Проекты, портфолию, статьи и заметки по веб-разработке">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!--<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
    <script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
</head>
<body>
@yield('content')
<div id="top"><i class="fa fa-angle-up"></i></div>
<footer>
    <p>&copy; 2014 Все права защищены</p>
</footer>

<script type="text/javascript">
    var topShow = 600, time = 500;
    $(function() {
        $(window).scroll(function () {
            $(this).scrollTop() > topShow
                ? $('#top').fadeIn()
                : $('#top').fadeOut();
        });
        $('#top').click(function () {
            $('body, html').animate({
                scrollTop: 0
            }, time);
        });
    });
</script>
</body>
</html>