@if(Auth::check())
    @include('admin-menu')
@endif
<header>
    <div id="top-picture"></div>
    @include('menu')
</header>