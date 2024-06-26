@extends('layouts.main')


@section('content')
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
    <header class="header index-header-wrap">
        <div class="header__block"></div>
        <div class="header__wrapper position-absolute">
            <div class="header__body">
                <div class="header__logo">
                    <a href="{{route('main.page')}}">
                        <svg width="134" height="31" viewBox="0 0 134 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.5409 0C14.3979 0 15.5273 0.282963 16.692 0.557653C18.8499 1.06732 20.7759 2.08003 22.5742 3.3575C22.9809 3.64708 23.0246 3.8622 22.7422 4.26927C20.6852 7.19322 18.6583 10.1304 16.6315 13.0726C16.5138 13.238 16.3928 13.4151 16.2399 13.6368C16.4701 13.7245 16.6668 13.8023 16.8584 13.8735C17.7676 14.2458 18.6953 14.5834 19.586 15.0004C25.8043 17.9045 24.8329 26.0723 20.502 28.9135C18.465 30.2489 16.2281 30.8744 13.8316 30.9787C8.71909 31.2004 4.1814 29.6929 0.252094 26.4496C0.171424 26.3834 0.0974763 26.3073 0 26.2179L7.4687 16.6899C7.27711 16.5906 7.13258 16.5095 6.99477 16.445C6.8267 16.3672 6.63679 16.3026 6.45697 16.2315C3.13101 14.9077 1.20333 12.591 1.18484 8.95057C1.15963 5.24723 2.91925 2.62941 6.26201 1.10041C7.93283 0.401043 9.72554 0.0273401 11.5409 0V0ZM7.52921 25.1606C7.69727 25.2483 7.78802 25.3012 7.88382 25.3409C9.78922 26.1331 11.861 26.4595 13.9223 26.2924C15.0427 26.2322 16.126 25.8761 17.0584 25.2615C18.9239 23.9989 19.2667 20.7837 16.8163 19.5609C15.6786 18.9949 14.4399 18.621 13.2349 18.1907C13.1399 18.1745 13.0424 18.1811 12.9505 18.2099C12.8587 18.2387 12.7752 18.2889 12.7072 18.3562C10.9863 20.5934 9.28546 22.8456 7.52921 25.1606ZM15.9323 5.41601C14.6938 4.92582 13.3775 4.65308 12.0434 4.61015C10.6468 4.56712 9.29722 4.74915 8.11238 5.5517C6.00152 6.98141 6.09563 9.91695 8.30734 11.1779C8.9527 11.5452 9.67705 11.7752 10.356 12.0863C10.7174 12.2518 10.9241 12.136 11.1476 11.8332C12.3812 10.1569 13.6349 8.49717 14.8819 6.83083C15.2214 6.37412 15.5576 5.91741 15.9273 5.41601H15.9323Z" fill="white"/>
                            <path d="M31.0039 5H44.8695V7.8213H34.2907V12.5013H43.6681V15.3304H34.2907V20.167H45V23H31L31.0039 5Z" fill="white"/>
                            <path d="M49 4H53V7.01765H49V4ZM49.1526 9.14317H52.8766V23H49.1526V9.14317Z" fill="white"/>
                            <path d="M56.7129 25.3826L57.9503 23.0397C59.4995 23.9814 61.289 24.4793 63.1145 24.4767C66.0821 24.4767 67.702 23.0397 67.702 20.32V19.2677C66.5006 20.73 64.9828 21.757 62.5919 21.757C59.1878 21.757 56 19.3946 56 15.3648C56 11.3351 59.2139 9 62.5919 9C65.0368 9 66.5487 10.0523 67.676 11.3097V9.28895H71V20.0681C71 22.3525 70.3672 24.0471 69.1578 25.1756C67.8402 26.4076 65.8078 26.9992 63.1966 26.9992C60.9273 27.0247 58.691 26.4672 56.7129 25.3826ZM67.7261 15.3726C67.7261 13.141 65.7757 11.626 63.467 11.626C61.1582 11.626 59.35 13.1137 59.35 15.398C59.35 17.6296 61.1922 19.1447 63.471 19.1447C65.7497 19.1447 67.7301 17.6042 67.7301 15.3707L67.7261 15.3726Z" fill="white"/>
                            <path d="M75 4H78.3185V11.3922C79.252 10.0899 80.5954 8.97167 82.8444 8.97167C86.1089 8.97167 88 11.0537 88 14.2541V23H84.6815V15.1902C84.6815 13.0567 83.558 11.8256 81.583 11.8256C79.6638 11.8256 78.3185 13.1002 78.3185 15.2338V23H75V4Z" fill="white"/>
                            <path d="M92.8266 18.9099V11.5715H91V8.82683H92.8266V5H96.1261V8.82683H100V11.5715H96.1261V18.408C96.1261 19.6488 96.782 20.1487 97.8991 20.1487C98.608 20.1531 99.3082 19.9909 99.9444 19.6749V22.285C99.029 22.7808 98.0012 23.0265 96.9629 22.9977C94.544 22.9997 92.8266 21.9637 92.8266 18.9099Z" fill="white"/>
                            <path d="M104 5H117.862V6.85087H106.163V12.9904H116.63V14.8433H106.163V21.1433H118V23H104V5Z" fill="white"/>
                            <path d="M125.731 15.8785L120.218 9H122.703L127.023 14.4147L131.342 9H133.77L128.24 15.8229L134 23H131.488L126.963 17.2888L122.427 23H120L125.731 15.8785Z" fill="white"/>
                        </svg>
                    </a>
                </div>
                <button type="button" class="menu__icon" id="header-btn-menu">
                    <span></span>
                </button>
                <div class="header__menu menu index-header-menu">
                    <nav class="header__menu-nav menu-nav">
                        <ul class="header__menu-list menu-list">
                            <li class="header__menu-item menu-item">
                                <a href="#howWork" data-goto=".about" class="header__menu-link menu-link">Как мы работаем</a>
                            </li>
                            <li class="header__menu-item menu-item">
                                <a href="#popup" class="header__menu-link menu-link popup-link" id="open_popup" onclick="openPup()">Оставить заявку</a>
                            </li>
                            <li class="header__menu-item menu-item">
                                <a href="#company" data-goto=".team" class="header__menu-link menu-link">О компании</a>
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
            </div>
        </div>

        <video class="first-iframe" src="{{asset('/video/EightEx_horizontal.mov')}}" autoplay muted></video>

        <div class="mail-header-wrapper index-header">
            <div class="mail-header-content d-flex justify-content-between w-100">
                <div class="first-content-mail w-100">
                    <div class="delivery-from-china w-100">
                        <h1 class="">Доставка из Китая</h1>
                        <p class="first-screen__text">Ваш надёжный партнер с Китаем!</p>
                    </div>
                    <form action="#" class="first-screen__form form-first-screen form" id="open_popup">
                        <div class="form__items" style="height: auto;">
                            <a href="#popup" class="btn-submit_form1 form-first-screen__button
                            form__button button header__menu-link menu-link popup-link" style="text-align: center; color: white;">Оставить заявку</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>


<main>
    <div class="page__wrapper">
        <div class="us-team">
            <h2>Наша команда</h2>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="background-image: url('{{asset('/img/about/us_team.jpg')}}'); background-size: cover; background-position-y: -80px;">
                        {{-- <img src="{{asset('/img/about/us_team.jpg')}}" class="d-block w-100" alt="Наша команда"> --}}
                    </div>
                    <div class="carousel-item" style="background-image: url('{{asset('/img/about/team.jpg')}}'); background-size: cover;">
                        {{-- <img src="{{asset('/img/about/team.jpg')}}" class="d-block w-100" alt="Наша команда"> --}}
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                    <svg width="55" height="55" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.71875 27.5C1.71875 41.7381 13.2619 53.2812 27.5 53.2812C41.7381 53.2812 53.2812 41.7381 53.2812 27.5C53.2812 13.2619 41.7381 1.71875 27.5 1.71875C13.2619 1.71875 1.71875 13.2619 1.71875 27.5ZM26.0434 23.0802H42.1094V31.9198H26.0434V41.25L12.8906 27.5L26.0434 13.75V23.0802Z" fill="white"/>
                    </svg>
{{--                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                    <span class="sr-only">Previous</span>--}}
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                    <svg width="54" height="55" viewBox="0 0 54 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_53_251)">
                            <path d="M52.3125 27.5C52.3125 13.2619 40.9793 1.71875 27 1.71875C13.0208 1.71875 1.6875 13.2619 1.6875 27.5C1.6875 41.7381 13.0207 53.2813 27 53.2813C40.9792 53.2813 52.3125 41.7381 52.3125 27.5ZM28.4302 31.9198L12.6563 31.9198L12.6563 23.0802L28.4302 23.0802L28.4302 13.75L41.3437 27.5L28.4302 41.25L28.4302 31.9198Z" fill="white"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_53_251">
                                <rect width="55" height="54" fill="white" transform="translate(54) rotate(90)"/>
                            </clipPath>
                        </defs>
                    </svg>
{{--                    <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                    <span class="sr-only">Next</span>--}}
                </button>
            </div>
        </div>

        <section class="video">
            <div class="video__card card_single">
                <h3 class="card__title">
                    {{__('site.title_YouTube')}}
                </h3>
            </div>
            <iframe src="https://www.youtube.com/embed/0-qTSM-Fvmw?si=cLi2ojfG83sugL-D" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </section>

        <section class="about">
            <div class="label-about text-center" id="howWork">
                <h2 class="label__title">Как мы работаем</h2>
            </div>
            <div class="about__container_b container container_b">
                <div class="about-items d-flex">
                    <div class="about__card card">
                        <div class="about_images">
                            <div class="card__stage accent">
                                <p>Этап 1</p>
                            </div>
                            <picture><source srcset="img/about/01.webp" type="image/webp"><img src="img/about/01.png" alt="{{__('site.stage_1')}}"></picture>
                        </div>
                        <div class="card__content">
                            <h3>{{__('site.stage_1')}}</h3>
                            <h3 class="card__title">{{__('site.stage_1_2')}}</h3>
                        </div>
                    </div>
                    <div class="about__card card">
                        <div class="about_images">
                            <div class="card__stage accent">
                                <p>Этап 2</p>
                            </div>
                            <picture><source srcset="img/about/02.webp" type="image/webp"><img src="img/about/02.png" alt="{{__('site.stage_2')}}"></picture>
                        </div>
                        <div class="card__content">
                            <h3 class="card__title">{{__('site.stage_2')}}</h3>
                        </div>
                    </div>
                    <div class="about__card card">
                        <div class="about_images">
                            <div class="card__stage accent">
                                <p>Этап 3</p>
                            </div>
                            <picture><source srcset="img/about/03.webp" type="image/webp"><img src="img/about/03.png" alt="{{__('site.stage_3')}}"></picture>
                        </div>
                        <div class="card__content">
                            <h3>{{__('site.stage_3')}}</h3>
                            <h3 class="card__title">{{__('site.stage_3_2')}} {{__('site.stage_3_3')}}</h3>
                            <div class="card__text">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="scale">
            <h3 class="scale-mobile-title">Нам доверяют</h3>
            <div class="scale__container_b container_b container">
                <div class="scale__partners partners-scale">
                    <div class="partners-scale__items">
                        <h2 class="text-center">Сотни поставщиков маркетплейсов доверяют нам</h2>
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

        <section class="team" id="company">
            <div class="card__info card__info_full_team">
                <h3 class="card__title">{{__('site.team_title')}}</h3>
                <div class="card__text">
                    <p class="about-company">
                        {{__('site.team_text')}}
                    </p>
                </div>
            </div>
            <img src="{{asset('/img/about/team.jpg')}}" alt="{{__('site.team_title')}}">
        </section>

        <div class="siema-wrapper">
            @include('components.reels')
        </div>

        <section class="reviews">
            <div class="review-title">
                <h2 class="label__title text-center">Отзывы</h2>
                <b class="believe accent">Доверие</b>
            </div>
            <div class="reviews__container_b container_b container">
                <div class="reviews__items">
                    <div class="reviews__item doverie">
                        <div class="reviews__trigger trigger" style="border: 2px dashed #FFD600;">
                            <h2 class="trigger__title">Заслужили доверие не словами, а делом</h2>
                            <p class="trigger__text">
                                Помогли заработать селлерам на маркетплейсах более
                                <span class="review-info">100 000 000 рублей</span>.
                            </p>
                        </div>
                    </div>
                    @if(count($reviews)>0)
                        @foreach($reviews as $key => $reviewsModel)
                            <div class="reviews__item item-review">
                                <div class="item-review__wrapper" id="review-{{$key}}">
                                    <h2 class="item-review__title">{{$reviewsModel->name}}</h2>
                                    <p class="review-text">
                                        {{$reviewsModel->text}}
                                    </p>
                                    <button type="button" class="review-button" id="open_review">Смотреть полный отзыв</button>
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
                <div class="statistics-items">
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

        <section class="contact yellow-section" style="margin-bottom: 50px;">
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

                    <input  name="name" oninput="this.value=this.value.replace(/[^a-zA-Zа-яА-Я\s]/g,'');" type="text" placeholder="Ваше имя" class="form-contact__input  form__input text-left">
                    <input   name="phone" oninput="this.value=this.value.replace(/[^0-9\s]/g,'');" type="number" placeholder="+7 (999) 999-99-99" class="form-contact__input  form__input text-left">
                    <button  type="submit" class="btn-submit_form2 form-contact__button  form__button button popup-link" id="open_popup_thx">Оставить заявку</button>
                    <p class="form-contact__text  form__text">Отправляя форму, вы соглашаетесь на обработку персональных данных,
                        защищенных <a href="#" class="politics">политикой конфиденциальности</a></p>
                </form>
            </div>
        </section>
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
@endsection
