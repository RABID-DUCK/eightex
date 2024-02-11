<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EightEx</title>
    <link type="image/x-icon" href="img/icon/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/other.css') }}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(94788124, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/94788124" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    {!! htmlScriptTagJsApi() !!}

</head>

<body>

@yield('content')

<footer class="footer">
    <div class="footer__container container">
        <div class="footer__body">
            <div class="footer__top">
                <div class="footer__logo">
                    <a href="#">
                        <picture><source type="image/webp"><img src="img/first-screen/logo.png" alt="EightEx"></picture>
                    </a>

                    <button type="button" class="menu__icon" id="footer-btn-menu">
                        <span></span>
                    </button>
                </div>
                <div class="footer__menu menu">
                    <nav class="footer__menu-nav">
                        <ul class="footer__menu-list menu-list">
                            <li class="footer__menu-item menu-item">
                                <a href="#" class="footer__menu-link menu-link">Как мы работаем</a>
                            </li>
                            <li class="footer__menu-item menu-item">
                                <a href="#" class="footer__menu-link menu-link">Оставить заявку</a>
                            </li>
                            <li class="footer__menu-item menu-item">
                                <a href="#" class="footer__menu-link menu-link">О компании</a>
                            </li>
                            <li class="footer__menu-item menu-item">
                                <a href="#" class="footer__menu-link menu-link">Почта</a>
                            </li>
                        </ul>

                        <div class="footer__phones">
                            <a href="tel:{{__('site.tel')}}" class="footer__menu-link menu-link footer__menu-link_phone menu-link_phone">
                                8 967 555 71 43
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
            <a href="#" class="footer__policy">Политика конфиденциальности</a>
        </div>
    </div>
</footer>
<script src=" {{ asset('js/jquery-3.6.1.min.js') }}"></script>
<script src=" {{ asset('js/app.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>
@include('script')
