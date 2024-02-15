@extends('layouts.main')

@section('content')
    <style>
        body{
            overflow-x: hidden;
        }

        @media (max-width: 810px) {
            .menu__icon{
                right: 15px;
            }

            .menu__icon::before, .menu__icon::after, .menu__icon span{
                background-color: white;
                color: white;
            }
        }
    </style>

    <header class="header header-mail">
        <div class="header__block"></div>
        <div class="header__wrapper position-absolute">
            <div class="header__container container">
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
                    <div class="header__menu menu">
                        <nav class="header__menu-nav menu-nav">
                            <ul class="header__menu-list menu-list">
                                <li class="header__menu-item menu-item">
                                    <a href="#" data-goto=".about" class="header__menu-link menu-link">Как мы работаем</a>
                                </li>
                                <li class="header__menu-item menu-item">
                                    <a href="#popup" class="header__menu-link menu-link popup-link">Оставить заявку</a>
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
                                        {{__('site.tel')}}
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <img class="img-mail" src="{{asset('/img/mail_page.png')}}" alt="Eightex">

        <div class="first-screen__container container">
            <div class="first-screen__wrapper">
                <div class="first-screen__content">
                    <div class="delivery-from-china">
                        <h1 class="">Почта из Китая</h1>
                        <p class="first-screen__text">Оставьте заявку и мы доставим ваш товар</p>
                    </div>
                    <form action="#" class="first-screen__form form-first-screen form" id="form_1">
                        <div class="form__items" style="height: auto;">
                            <a href="#popup" class="btn-submit_form1 form-first-screen__button
                            form__button button header__menu-link menu-link popup-link" style="text-align: center; color: white;" id="open_popup">Оставить заявку</a>
                        </div>
                    </form>
                </div>
                <div class="address-delivery">
                    <b>Адрес для отправки товара:</b>
                    <p style="margin-left: 5px">广州市白云区西槎路31号西城鞋服商贸大厦G栋中01/MS4000。</p>
                    <p> 收货人：MS4000</p>
                    <p> 电话号: 13533559892</p>
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

        <div class="chat-wrapper d-flex" id="wrapper-chat">
            <div class="write-us-chat d-flex">
                <img src="{{asset('/img/chat-write.png')}}" alt="Консультант">
                <p>Здравствуйте! Готов помочь вам. Напишите мне, если у вас появятся вопросы.</p>
            </div>


            <div class="icons d-flex flex-column" id="icons-chat">
                <a href="https://t.me/{{__('site.telegram')}}" class="item-icon-chat" target="_blank">
                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="64" height="64" rx="32" fill="#27A6E5"/>
                        <path d="M44.7999 20.1635L39.9912 45.2676C39.9912 45.2676 39.3184 47.0081 37.4701 46.1734L26.3752 37.3641L26.3238 37.3381C27.8224 35.9446 39.4437 25.1242 39.9516 24.6337C40.7379 23.8741 40.2498 23.4219 39.3369 23.9957L22.1708 35.2847L15.5481 32.9772C15.5481 32.9772 14.5059 32.5933 14.4057 31.7585C14.3041 30.9224 15.5824 30.4702 15.5824 30.4702L42.5809 19.5023C42.5809 19.5023 44.7999 18.4926 44.7999 20.1635Z" fill="#FEFEFE"/>
                    </svg>
                </a>

                <a href="https://wa.me/{{__('site.tel')}}" class="item-icon-chat" target="_blank">
                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="64" height="64" rx="32" fill="#48C95F"/>
                        <path d="M44.6829 19.3C41.5219 16.15 37.3073 14.4 32.8585 14.4C23.6098 14.4 16.1171 21.8667 16.1171 31.0834C16.1171 34 16.9366 36.9167 18.3415 39.3667L16 48L24.8976 45.6667C27.3561 46.95 30.0488 47.65 32.8585 47.65C42.1073 47.65 49.6 40.1834 49.6 30.9667C49.4829 26.65 47.8439 22.45 44.6829 19.3ZM40.9366 37.0334C40.5854 37.9667 38.9463 38.9 38.1268 39.0167C37.4244 39.1334 36.4878 39.1334 35.5512 38.9C34.9659 38.6667 34.1463 38.4334 33.2098 37.9667C28.9951 36.2167 26.3024 32.0167 26.0683 31.6667C25.8341 31.4334 24.3122 29.45 24.3122 27.35C24.3122 25.25 25.3659 24.3167 25.7171 23.85C26.0683 23.3834 26.5366 23.3834 26.8878 23.3834C27.122 23.3834 27.4732 23.3834 27.7073 23.3834C27.9415 23.3834 28.2927 23.2667 28.6439 24.0834C28.9951 24.9 29.8146 27 29.9317 27.1167C30.0488 27.35 30.0488 27.5834 29.9317 27.8167C29.8146 28.05 29.6976 28.2834 29.4634 28.5167C29.2293 28.75 28.9951 29.1 28.878 29.2167C28.6439 29.45 28.4098 29.6834 28.6439 30.0334C28.878 30.5 29.6976 31.7834 30.9854 32.95C32.6244 34.35 33.9122 34.8167 34.3805 35.05C34.8488 35.2834 35.0829 35.1667 35.3171 34.9334C35.5512 34.7 36.3707 33.7667 36.6049 33.3C36.839 32.8334 37.1902 32.95 37.5415 33.0667C37.8927 33.1834 40 34.2334 40.3512 34.4667C40.8195 34.7 41.0537 34.8167 41.1707 34.9334C41.2878 35.2834 41.2878 36.1 40.9366 37.0334Z" fill="white"/>
                    </svg>
                </a>

                <svg class="icon-chat" id="icon-chat" width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="32" cy="32" r="32" fill="#FFD704"/>
                    <path d="M24.44 35.9111V24.8889H17.6C15.62 24.8889 14 26.4889 14 28.4444V39.1111C14 41.0667 15.62 42.6667 17.6 42.6667H19.4V48L24.8 42.6667H33.8C35.78 42.6667 37.4 41.0667 37.4 39.1111V35.8756C37.2817 35.9006 37.161 35.9132 37.04 35.9129H24.44V35.9111ZM46.4 16H30.2C28.22 16 26.6 17.6 26.6 19.5556V33.7778H39.2L44.6 39.1111V33.7778H46.4C48.38 33.7778 50 32.1796 50 30.2222V19.5556C50 17.6 48.38 16 46.4 16Z" fill="black"/>
                </svg>

                <svg class="item-icon-chat" id="close-icons-chat" width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="32" cy="32" r="32" fill="#BCBCBC"/>
                    <path d="M24.8709 39.1291L38.1292 25.8708" stroke="white" stroke-width="2" stroke-linecap="round"/>
                    <path d="M24.8709 25.8709L38.1292 39.1292" stroke="white" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
        </div>

       <div class="chat-content" id="chat-content">
            <div class="chat-wrap-text">
                <b class="close-chat" id="close-chat">X</b>

                <div class="d-flex flex-column consults-wrapper">
                    <h5>Наши консультанты ответят вам в самое ближайшее время</h5>
                    <div class="d-flex consults-in-chat">
                        <div class="d-flex flex-column">
                            <img src="{{asset('/img/arina.png')}}" alt="Арина" width="40" height="40">
                            <span>Арина</span>
                        </div>
                        <div class="d-flex flex-column">
                            <img src="{{asset('/img/mariya.png')}}" alt="Мария" width="40" height="40">
                            <span>Мария</span>
                        </div>
                        <div class="d-flex flex-column">
                            <img src="{{asset('/img/nadezhda.png')}}" alt="Надежда" width="40" height="40">
                            <span>Надежда</span>
                        </div>
                    </div>
                </div>
                <div></div>
            </div>

            <div class="write-test-chat">
                <textarea name="" id="" cols="30" rows="10" placeholder="Введите сообщение..." value=""></textarea>
                <div class="d-flex attachments">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 21.75C8.27208 21.75 5.25 18.7279 5.25 15V7C5.25 4.37665 7.37665 2.25 10 2.25C12.6234 2.25 14.75 4.37665 14.75 7L14.75 15.1429C14.75 16.6616 13.5188 17.8929 12 17.8929C10.4812 17.8929 9.25 16.6616 9.25 15.1429V7.28571C9.25 6.8715 9.58579 6.53571 10 6.53571C10.4142 6.53571 10.75 6.8715 10.75 7.28571V15.1429C10.75 15.8332 11.3096 16.3929 12 16.3929C12.6904 16.3929 13.25 15.8332 13.25 15.1429L13.25 7C13.25 5.20507 11.7949 3.75 10 3.75C8.20507 3.75 6.75 5.20507 6.75 7L6.75 15C6.75 17.8995 9.10051 20.25 12 20.25C14.8995 20.25 17.25 17.8995 17.25 15V7.28571C17.25 6.8715 17.5858 6.53571 18 6.53571C18.4142 6.53571 18.75 6.8715 18.75 7.28571V15C18.75 18.7279 15.7279 21.75 12 21.75Z" fill="#8B8B8B"/>
                    </svg>

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#8B8B8B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8 14C8 14 9.5 16 12 16C14.5 16 16 14 16 14M9 9H9.01M15 9H15.01" stroke="#8B8B8B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </div>

    </header>

    <main class="mail-page">
        <h1>Ответили на все твои вопросы в коротком видео</h1>

        <div class="faq-wrapper">
            <div>
                <iframe src="https://www.youtube.com/embed/qRhuOS9th2c?si=gtNKWdyMHswQgkTk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="faq-content">
                <h2>FAQ</h2>
                <div class="accordion" id="accordionExample">
                    <div class="item-accordion">
                        <div class="header-item-accordion" id="headingOne">
                            <b class="mb-0 d-flex justify-between">
                                <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Если я сделал ошибку в адресе?
                                    <img class="plus-accordion" src="{{asset('/img/plus.png')}}" alt="plus">
                                    <img class="close-accordion" src="{{asset('/img/close-accordion.png')}}" alt="plus">
                                </button>
                            </b>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div>
                                Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                            </div>
                        </div>
                    </div>

                    <div class="item-accordion">
                        <div class="header-item-accordion" id="headingTwo">
                            <b class="mb-0 d-flex justify-between">
                                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Если нет трек номера?
                                    <img class="plus-accordion" src="{{asset('/img/plus.png')}}" alt="plus">
                                    <img class="close-accordion" src="{{asset('/img/close-accordion.png')}}" alt="plus">
                                </button>
                            </b>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div>
                                Some placeholder content for the second accordion panel. This panel is hidden by default.
                            </div>
                        </div>
                    </div>

                    <div class="item-accordion">
                        <div class="header-item-accordion" id="headingThree">
                            <b class="mb-0 d-flex justify-between">
                                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Если нет трек номера?
                                    <img class="plus-accordion" src="{{asset('/img/plus.png')}}" alt="plus">
                                    <img class="close-accordion" src="{{asset('/img/close-accordion.png')}}" alt="plus">
                                </button>
                            </b>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div>
                                Some placeholder content for the second accordion panel. This panel is hidden by default.
                            </div>
                        </div>
                    </div>

                    <div class="item-accordion">
                        <div class="header-item-accordion" id="headingFour">
                            <b class="mb-0 d-flex justify-between">
                                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Если сделал ошибку в анкет?
                                    <img class="plus-accordion" src="{{asset('/img/plus.png')}}" alt="plus">
                                    <img class="close-accordion" src="{{asset('/img/close-accordion.png')}}" alt="plus">
                                </button>
                            </b>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div>
                                Some placeholder content for the second accordion panel. This panel is hidden by default.
                            </div>
                        </div>
                    </div>

                    <div class="item-accordion">
                        <div class="header-item-accordion" id="headingFive">
                            <b class="mb-0 d-flex justify-between">
                                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Если со мной никто не связался?
                                    <img class="plus-accordion" src="{{asset('/img/plus.png')}}" alt="plus">
                                    <img class="close-accordion" src="{{asset('/img/close-accordion.png')}}" alt="plus">
                                </button>
                            </b>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                            <div>
                                Some placeholder content for the second accordion panel. This panel is hidden by default.
                            </div>
                        </div>
                    </div>

                    <div class="item-accordion">
                        <div class="header-item-accordion" id="headingSix">
                            <b class="mb-0 d-flex justify-between">
                                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Если оставил заявку, но передумал?
                                    <img class="plus-accordion" src="{{asset('/img/plus.png')}}" alt="plus">
                                    <img class="close-accordion" src="{{asset('/img/close-accordion.png')}}" alt="plus">
                                </button>
                            </b>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                            <div>
                                Some placeholder content for the second accordion panel. This panel is hidden by default.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <style>
        .footer__container{
            padding-left: 40px;
        }
    </style>
@endsection
