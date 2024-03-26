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

<div class="header__menu menu index-header-menu d-none" id="header-for-footer">
    <nav class="header__menu-nav menu-nav">
        <ul class="header__menu-list menu-list">
            <li class="header__menu-item menu-item">
                <a href="#" data-goto=".about" class="header__menu-link menu-link">Как мы работаем</a>
            </li>
            <li class="header__menu-item menu-item">
                <a href="#popup" class="header__menu-link menu-link popup-link" id="open_popup">Оставить заявку</a>
            </li>
            <li class="header__menu-item menu-item">
                <a href="#" data-goto=".team" class="header__menu-link menu-link">О компании</a>
            </li>
            <li class="header__menu-item menu-item">
                <a href="{{route('mail.page')}}" class="header__menu-link menu-link">Почта</a>
            </li>
            <li class="header__menu-item menu-item header__menu-item_phone menu-item_phone">
                <a href="tel:{{__('site.tel')}}" class="header__menu-phone menu-phone">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                    </svg>
                </a>
                <a href="tel:{{__('site.tel')}}" class="header__menu-link menu-link header__menu-link_phone menu-link_phone">
                    8 967 555 71 43
                </a>
            </li>
        </ul>
    </nav>
</div>

<footer class="footer">
    <div class="footer__container container">
        <div class="footer__body">
            <div class="footer__top">
                <div class="footer__logo">
                    <a href="#">
                        <picture><source type="image/webp"><img src="img/first-screen/logo.png" alt="EightEx"></picture>
                    </a>

                    <button type="button" class="menu__icon" id="foot-btn-menu" onclick="openHeader()">
                        <span></span>
                    </button>
                </div>
                <div class="footer__menu menu">
                    <nav class="footer__menu-nav">
                        <ul class="footer__menu-list menu-list">
                            <li class="footer__menu-item menu-item">
                                <a href="#howWork" class="footer__menu-link menu-link">Как мы работаем</a>
                            </li>
                            <li class="footer__menu-item menu-item">
                                <a href="#popup" class="footer__menu-link menu-link" onclick="openPup()">Оставить заявку</a>
                            </li>
                            <li class="footer__menu-item menu-item">
                                <a href="#company" class="footer__menu-link menu-link">О компании</a>
                            </li>
                            <li class="footer__menu-item menu-item">
                                <a href="{{route('mail.page')}}" class="footer__menu-link menu-link">Почта</a>
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

            <script>
                function openPup(){
                    $('#popup').addClass('active')

                    $('#door').click(function () {
                        $('.check-1').addClass('show')
                        $('#door').addClass('hide')

                        if($('#sdek').hasClass('hide')) {
                            $('#sdek').removeClass('hide')
                            $('.check-2').removeClass('show')
                        }
                    })

                    $('#sdek').click(function () {
                        $('.check-2').addClass('show')
                        $('#sdek').addClass('hide')

                        if($('.check-1').hasClass('show')) {
                            $('.check-1').removeClass('show')
                            $('#door').removeClass('hide')
                        }
                    })
                }

                function openHeader() {
                    var headerMenu = document.getElementById('header-for-footer');
                    var footBtnMenu = document.getElementById('foot-btn-menu');
                    var phone = document.querySelector('.footer__phones');

                    headerMenu.classList.toggle('_active');
                    headerMenu.classList.toggle('d-none');
                    footBtnMenu.classList.toggle('_active');
                    phone.classList.toggle('d-none')
                }

                document.addEventListener('DOMContentLoaded', function() {
                    document.querySelector('.close-popup').addEventListener("click", function() {
                        document.getElementById('popup').classList.remove('active');
                    });
                });
            </script>

        </div>
    </div>
</footer>

<div class="popup" id="popup">
    <div class="popup__body">
        <div class="popup__content">
            <div class="popup__header">
                <h2 class="popup__title">Расчёт доставки груза</h2>
                <div class="popup__text mt-4">
                    Заполните форму и наш менеджер свяжется с вами, чтобы ответить на любые ваши вопросы
                </div>
                <div class="popup-close close-popup">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/></svg>
                </div>
            </div>
            <form class="popup__form" id="form_3">
                <div class="popup__item item-popup">
                    <h3 class="item-popup__title">Укажите трек номер отправителя</h3>
                    <input name="track_number" placeholder="Например: NP98473959327"  type="text" class="item-popup__field form__input  ">
                </div>

                <div class="popup__item item-popup">
                    <h3 class="item-popup__title">Выберите тип доставки</h3>
                    <div class="type-delivery-popup d-flex">
                        <div class="form-group">
                            <input type="radio" id="door" name="type_delivery" class="door-check">
                            <svg class="check-mark-popup check-1" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#14181F" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15 10L11 14L9 12" stroke="#14181F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            <label for="door">До двери 15-20 дней</label>
                        </div>
                        <div class="form-group">
                            <input type="radio" id="sdek" name="type_delivery" class="sdek-check">
                            <svg class="check-mark-popup check-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#14181F" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15 10L11 14L9 12" stroke="#14181F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            <label for="sdek">До пункта выдачи СДЭК 13-18 дней</label>
                        </div>
                    </div>
                </div>

                <div class="popup__item item-popup">
                    <h3 class="item-popup__title">Укажите полный адрес ПВЗ (Страна, область, город, улица, дом)</h3>
                    <input name="address" placeholder="Например: г. Москва, ул. Московская, д. 1." type="text" class="item-popup__field form__input">
                </div>

                <div class="popup__item item-popup">
                    <h3 class="item-popup__title">Укажите ФИО получателя</h3>
                    <input name="fio" placeholder="Например: Иванов Иван Иванович" type="text" class="item-popup__field form__input">
                </div>

                <div class="popup__item item-popup">
                    <h3 class="item-popup__title">Укажите номер телефона получателя</h3>
                    <input placeholder="Например: 30.000" type="text" class="item-popup__field form__input" name="phone">
                </div>

                <div class="popup__item item-popup">
                    <h3 class="item-popup__title">Укажите описание товара</h3>
                    <input name="description" placeholder="Например: Велосипед" type="text" class="item-popup__field form__input form__input_phone" >
                </div>

                <button id="btn-submit_form3"  type="submit" class="btn-submit_form3 item-popup__btn button popup-link">Оставить заявку</button>
            </form>
        </div>
    </div>
</div>

<div class="popup thanks" id="popup-thanks">
    <div class="popup__body thanks__body">
        <div class="popup__content thanks__content">
            <div class="popup-close close-popup thanks-popup-close">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/></svg>
            </div>
            <div class="thanks__info">
                <div class="thanks__icon"></div>
                <h2 class="thanks__title">
                    Спасибо, мы
                    уже обрабатываем вашу заявку!
                </h2>
                <p class="thanks__text">
                    А пока, подпишитесь на наш Telegram канал, там мы публикуем свежие новости о бизнесе с Китаем
                </p>
            </div>
            <div class="thanks__image">
                <picture><source srcset="img/telegram_channel.webp" type="image/webp"><img src="img/telegram_channel.png" alt="Телеграм канал 'Карго доставка из Китая'"></picture>
                <a href="https://t.me/eightex" target="_blank" class="thanks__btn button">Перейти на канал</a>
            </div>
        </div>
    </div>
</div>

<script src=" {{ asset('js/jquery-3.6.1.min.js') }}"></script>
<script src=" {{ asset('js/app.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>
@include('script')
