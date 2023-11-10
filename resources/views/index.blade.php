<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EightEx</title>
    <link type="image/x-icon" href="img/icon/favicon.ico" rel="shortcut icon">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}"/>
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
<header class="header">
    <div class="header__block"></div>
    <div class="header__wrapper">
        <div class="header__container container">
            <div class="header__body">
                <div class="header__logo">
                    <a href="#">
                        <picture><source type="image/webp"><img src="img/first-screen/logo.png" alt="EightEx"></picture>
                    </a>
                </div>
                <button type="button" class="menu__icon">
                    <span></span>
                </button>
                <div class="header__menu menu">
                    <nav class="header__menu-nav menu-nav">
                        <ul class="header__menu-list menu-list">
                            <li class="header__menu-item menu-item">
                                <a href="#" data-goto=".about" class="header__menu-link menu-link">Как мы работаем</a>
                            </li>
{{--                            <script--}}
{{--                                class="amocrm_oauth"--}}
{{--                                charset="utf-8"--}}
{{--                                data-client-id="89b44448-9d68-41fc-9140-5e383e6a43d0"--}}
{{--                                data-title="Button"--}}
{{--                                data-compact="false"--}}
{{--                                data-class-name="className"--}}
{{--                                data-color="default"--}}
{{--                                data-state="state"--}}
{{--                                data-error-callback="functionName"--}}
{{--                                data-mode="popup"--}}
{{--                                src="https://www.amocrm.ru/auth/button.min.js"--}}
{{--                            ></script>--}}
                            <li class="header__menu-item menu-item">
                                <a href="#popup" class="header__menu-link menu-link popup-link">Оставить заявку</a>
                            </li>
                            <li class="header__menu-item menu-item">
                                <a href="#" data-goto=".team" class="header__menu-link menu-link">О компании</a>
                            </li>
                            <!-- <li class="header__menu-item menu-item">
                                <a href="#" class="header__menu-link menu-link">Блог</a>
                            </li>
                            <li class="header__menu-item menu-item">
                                <a href="#" class="header__menu-link menu-link">Калькулятор</a>
                            </li> -->
                            <li class="header__menu-item menu-item header__menu-item_phone menu-item_phone">
                                <a href="tel:{{__('site.tel')}}" class="header__menu-phone menu-phone">
                                    <img src="img/first-screen/phone.svg" alt="Телефон: 8 (900) 999 99 99">
                                </a>
                                <a href="tel:{{__('site.tel')}}" class="header__menu-link menu-link header__menu-link_phone menu-link_phone">
                                    {{__('site.tel')}}
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<main class="page">
    <div class="page__wrapper">
        <section class="first-screen yellow-section">
            <div class="first-screen__image-wrapper">
                <div class="first-screen__container container">
                    <div class="first-screen__wrapper">
                        <div class="first-screen__content">
                            <div class="first-screen__offer">
                                <h1 class="first-screen__title">Доставка из Китая.</h1>
                                <p class="first-screen__text">Возвращаем 100% по страховке при задержке.</p>
                            </div>
                            <form action="#" class="first-screen__form form-first-screen form" id="form_1">
                                <div class="form__items" style="height: auto;">
                                    <a href="#popup" class="btn-submit_form1 form-first-screen__button
                                    form__button button header__menu-link menu-link popup-link" style="text-align: center; color: white;">Оставить заявку</a>
                                </div>
                                <p class="form-first-screen__text  form__text">
                                    Отправляя форму, вы соглашаетесь на обработку персональных
                                    данных, защищенных <a href="#">политикой конфиденциальности</a>
                                </p>
                            </form>
                        </div>
                        <div class="first-screen__image">
                            <picture><source srcset="img/first-screen/bg-image_sm.webp" type="image/webp"><img src="img/first-screen/bg-image_sm.png" alt=""></picture>
                        </div>
                    </div>
                    <div class="first-screen__contacts contacts-first-screen">
                        <div class="contacts-first-screen__items">
                            <h3 class="contacts-first-screen__title">Или просто напишите нам</h3>
                            <ul class="contacts-first-screen__list list-contacts">
                                <li class="list-contacts__item">
                                    <a href="https://telegram.me/{{__('site.telegram')}}" target="_blank" class="list-contacts__link">
                                        <picture><source srcset="img/first-screen/socials/01.webp" type="image/webp"><img src="img/first-screen/socials/01.png" alt=""></picture>
                                    </a>
                                </li>
                                <li class="list-contacts__item">
                                    <a href="https://wa.me/{{__('site.tel')}}" target="_blank" class="list-contacts__link">
                                        <picture><source srcset="img/first-screen/socials/02.webp" type="image/webp"><img src="img/first-screen/socials/02.png" alt=""></picture>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="video">
            <div class="video__card card card_single">
                <div class="card__info card__info_mobile">
                    <h3 class="card__title">
                        {{__('site.title_YouTube')}}
                    </h3>
                </div>

                <div class="card__image order-first">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/0-qTSM-Fvmw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="card__info card__info_full">
                    <h3 class="card__title">
                        {{__('site.title_YouTube')}}
                    </h3>
                </div>
            </div>
        </section>
        <section class="about">
            <div class="about__container container">
                <div class="about__label label">
                    <h2 class="label__title">Как мы работаем</h2>
                    <div class="accent">
                        <p>Прозрачность</p>
                    </div>
                </div>
            </div>
            <div class="about__container_b container container_b">
                <div class="about__items">
                    <div class="about__card card">
                        <div class="card__image">
                            <div class="card__stage accent">
                                <p>Этап 1</p>
                            </div>
                            <picture><source srcset="img/about/01.webp" type="image/webp"><img src="img/about/01.png" alt="{{__('site.stage_1')}}"></picture>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title">{{__('site.stage_1')}}</h3>
                            <h3 class="card__title">{{__('site.stage_1_2')}}</h3>
                        </div>
                    </div>
                    <div class="about__card card">
                        <div class="card__image">
                            <div class="card__stage accent">
                                <p>Этап 2</p>
                            </div>
                            <picture><source srcset="img/about/02.webp" type="image/webp"><img src="img/about/02.png" alt="{{__('site.stage_2')}}"></picture>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title">{{__('site.stage_2')}}</h3>
                            <div class="card__text">

                            </div>
                        </div>
                    </div>
                    <div class="about__card card">
                        <div class="card__image">
                            <div class="card__stage accent">
                                <p>Этап 3</p>
                            </div>
                            <picture><source srcset="img/about/03.webp" type="image/webp"><img src="img/about/03.png" alt="{{__('site.stage_3')}}"></picture>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title">{{__('site.stage_3')}}</h3>
                            <h3 class="card__title">{{__('site.stage_3_2')}}</h3>
                            <h3 class="card__title">{{__('site.stage_3_3')}}</h3>
                            <div class="card__text">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="scale">
            <div class="scale__container container">
                <div class="scale__label label">
                    <h2 class="label__title">Нам доверяют</h2>
                    <div class="accent">
                        <p>Масштабы</p>
                    </div>
                </div>
            </div>
            <div class="scale__container_b container_b container">
                <div class="scale__partners partners-scale">
                    <div class="partners-scale__items">
                        <div class="partners-scale__item">
                            <picture><source srcset="img/scale/01.webp" type="image/webp"><img src="img/scale/01.png" alt="Ozon"></picture>
                        </div>
                        <div class="partners-scale__item">
                            <picture><source srcset="img/scale/02.webp" type="image/webp"><img src="img/scale/02.png" alt="Wildberries"></picture>
                        </div>
                        <div class="partners-scale__item">
                            <picture><source srcset="img/scale/03.webp" type="image/webp"><img src="img/scale/03.png" alt="Яндекс Маркет"></picture>
                        </div>
                    </div>
                    <p class="partners-scale__text">
                        *наши клиенты продают товары
                        на этих маркетплейсах
                    </p>
                </div>
            </div>
        </section>
        <section class="team">
            <div class="team__container_b container_b container">
                <div class="team__card card card_single">
                    <div class="card__info card__info_full_team">
                        <h3 class="card__title">{{__('site.team_title')}}</h3>
                        <div class="card__text">
                            <p>
                                {{__('site.team_text')}}
                            </p>
                        </div>
                    </div>
                    <div class="card__image card__image_team" >
                        <picture><source srcset="img/about/team.webp" type="image/webp"><img src="img/about/team.png" alt="{{__('site.team_title')}}"></picture>
                    </div>
                    <div class="card__info card__info_mobile_team">
                        <h3 class="card__title">{{__('site.team_title')}}</h3>
                        <div class="card__text">
                            <p>
                                {{__('site.team_text')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="reviews">
            <div class="reviews__container container">
                <div class="reviews__label label">
                    <h2 class="label__title">Отзывы</h2>
                    <div class="accent">
                        <p>Доверие</p>
                    </div>
                </div>
            </div>
            <div class="reviews__container_b container_b container">
                <div class="reviews__items">
                    <div class="reviews__item">
                        <div class="reviews__trigger trigger">
                            <h2 class="trigger__title">Заслужили доверие не словами, а делом</h2>
                            <p class="trigger__text">
                                Помогли заработать селлерам на маркетплейсах более
                                <span>100 000 000 рублей</span>.
                            </p>
                        </div>
                    </div>
                    @if(count($reviews)>0)
                        @foreach($reviews as $reviewsModel)
                    <div class="reviews__item item-review">
                        <div class="item-review__wrapper">
                            <h2 class="item-review__title">{{$reviewsModel->name}}</h2>
                            <p class="item-review__text">
                                {{$reviewsModel->text}}
                            </p>
                            <button type="button" class="item-review__button">Смотреть полный отзыв</button>
                        </div>
                    </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        <section class="statistics yellow-section">
            <div class="statistics__container container container_b">
                <h2 class="statistics__title">Немного цифр:</h2>
                <div class="statistics__items">
                    <div class="statistics__item">
                        <div class="statistics__trigger trigger-statistics trigger trigger_black">
                            <h2 class="trigger-statistics__title">10</h2>
                            <p class="trigger-statistics__text">лет на рынке</p>
                        </div>
                    </div>
                    <div class="statistics__item">
                        <div class="statistics__trigger trigger-statistics trigger trigger_black">
                            <h2 class="trigger-statistics__title">2000+</h2>
                            <p class="trigger-statistics__text">довольных клиентов</p>
                        </div>
                    </div>
                    <div class="statistics__item">
                        <div class="statistics__trigger trigger-statistics trigger trigger_black">
                            <h2 class="trigger-statistics__title">100%</h2>
                            <p class="trigger-statistics__text">стоимости возвращаем при задержках</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact yellow-section">
            <div class="contact__container container container_b">
                <div class="contact__info">
                    <h2 class="contact__title">
                        Оставьте данные для связи прямо сейчас.
                    </h2>
                    <p class="contact__subtitle">
                        Наш менеджер свяжется с вами
                        и рассчитает стоимость
                        по всем маршрутам.
                    </p>
                </div>
                <form  class="contact__form form-contact form" id="form_2">

                    <input  name="name" oninput="this.value=this.value.replace(/[^a-zA-Zа-яА-Я\s]/g,'');" type="text" placeholder="Ваше имя" class="form-contact__input  form__input">
                    <input   name="phone" oninput="this.value=this.value.replace(/[^0-9\s]/g,'');" type="number" placeholder="{{__('site.tel')}}" class="form-contact__input  form__input">
                    <button  type="submit" class="btn-submit_form2 form-contact__button  form__button button popup-link">Оставить заявку</button>
                    <p class="form-contact__text  form__text">Отправляя форму, вы соглашаетесь на обработку персональных данных,
                        защищенных <a href="#">политикой конфиденциальности</a></p>
                </form>
            </div>
        </section>
    </div>
    <div class="popup" id="popup">
        <div class="popup__body">
            <div class="popup__content">
                <div class="popup__header">
                    <h2 class="popup__title">Расчёт доставки груза</h2>
                    <div class="popup__text">
                        Заполните форму и наш менеджер свяжется с вами, чтобы ответить на любые ваши вопросы
                    </div>
                    <div class="popup-close close-popup">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/></svg>
                    </div>
                </div>
                <form class="popup__form" id="form_3">
                    <div class="popup__item item-popup">
                        <h3 class="item-popup__title">Какой товар нужно привезти?</h3>
                        <p class="item-popup__text popup__text">Укажите наименование или категорию товара.</p>
                        <input name="product_name" placeholder="Например: брюки, зонт, комплектующие для станка."  type="text" name="product" class="item-popup__field form__input">
                    </div>
                    <div class="popup__item item-popup">
                        <h3 class="item-popup__title">Вес, кг</h3>
                        <p class="item-popup__text popup__text">
                            Укажите примерный общий вес товара с упаковкой. Если не знаете вес упаковки, укажите вес без её учета.
                        </p>
                        <input name="product_weight" placeholder="Например: 100" type="number" name="weight" class="item-popup__field form__input">
                    </div>
                    <div class="popup__item item-popup">
                        <h3 class="item-popup__title">Объём, м3</h3>
                        <p class="item-popup__text popup__text">
                            Укажите общий объём с упаковкой. Если не знаете объём упаковки, укажите объём без её учёта.
                        </p>
                        <input name="product_volume" placeholder="Например: 0,7" type="number" name="size" class="item-popup__field form__input">
                    </div>
                    <div class="popup__item item-popup">
                        <h3 class="item-popup__title">Ваше имя</h3>
                        <input placeholder="Имя" type="text" class="item-popup__field form__input" name="name" oninput="this.value=this.value.replace(/[^a-zA-Zа-яА-Я\s]/g,'');">
                    </div>
                    <div class="popup__item item-popup">
                        <h3 class="item-popup__title">Ваш телефон</h3>
                        <input name="phone" oninput="this.value=this.value.replace(/[^0-9\s]/g,'');" placeholder="В формате 81234567890" type="text" class="item-popup__field form__input form__input_phone" >
                    </div>
                    <button  type="submit" class="btn-submit_form3 item-popup__btn button popup-link">Оставить заявку</button>
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
</main>
<footer class="footer">
    <div class="footer__container container">
        <div class="footer__body">
            <div class="footer__top">
                <div class="footer__logo">
                    <a href="#">
                        <picture><source type="image/webp"><img src="img/first-screen/logo.png" alt="EightEx"></picture>
                    </a>
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
                        </ul>
                        <div class="footer__phones">
                            <a href="tel:{{__('site.tel')}}" class="footer__menu-link menu-link footer__menu-link_phone menu-link_phone">
                                {{__('site.tel')}}
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
</body>
</html>
@include('script')

