<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/fonts/OpenSans-Regular.woff') }}" as="font" type="font/woff"
          crossorigin>
    <link rel="stylesheet" href="{{ asset('assets/fonts/OpenSans-Regular.woff2') }}" as="font" type="font/woff2"
          crossorigin>
    <link href="https://onpkg.com/simplebar@latest/dist/simpler.css" rel="stylesheet" defer>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/chatbot.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/media.css') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

</head>
<body>
<div class="site-container">
    <header class="header">
        <div class="container header__container">
            <nav class="nav header__nav">
                {{--                    -----------------------------------------Выпадающий список-------------------------------------------}}
                <ul class="header__list reset-list nav__list header-nav__list">
                    <li class="header__item">
                        <button class="header__item-btn js-header-dropdown-btn" data-path="one">
                            <strong class="header__item-heading">Каталог</strong>
                            <span class="header__item-icon"></span>
                        </button>
                        <div class="header__dropdown js-header-drop" data-target="one">
                            <div class="header__dropdown-wrap" data-simplebar>
                                <ul class="header__drop-list reset-list">
                                    <li class="header__dropdown-item"><a
                                            class="header__item-link header__item-link--tintoretto"
                                            href="{{ route('categories.index') }}"
                                            alt="Кнопка с категориями по нажатию, Вам будет доступен перечень всех категорий товаров"><span
                                                class="header__item-text">Категории</span></a></li>
                                    <li class="header__dropdown-item"><a
                                            class="header__item-link header__item-link--fridrih"
                                            href="{{ route('brands.index') }}"
                                            alt="Кнопка с брендами по нажатию, Вам будет доступен перечень всех брендов товаров">Бренд</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav__item"><a class="nav__link" href="{{ route('delivery-payment') }}"
                                             aria-label="Нажав ссылку, Вы переместитесь в раздел доставка и оплата">Доставка
                            и оплата</a></li>
                    <li class="nav__item"><a class="nav__link" href="{{ route('contacts') }}"
                                             aria-label="Нажав ссылку, Вы переместитесь в раздел контакты">Контакты</a>
                    </li>
                </ul>
                {{--                    ----------------------------------------(Конец кода)-Выпадающий список-------------------------------------------}}
            </nav>
            <a class="header__logo" href="{{ route('home_page') }}"><img class="logo"
                                                                         src="{{ asset('assets/image/Логотип.svg') }}"
                                                                         alt="Логотип который перебросит Вас на главную страницу"></a>
            <div class="menu_user">
                <a class="menu_user_icon basket"
                   href="{{ session('basket') ? route('basket.show', session('basket')->id) : '' }}"
                   alt="Кнопка для переходва в Вашу корзину">
                    <svg width="31px" height="26px" viewBox="0 0 49 56"
                         xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Basket" fill="#ffffff">
                                <path
                                    d="M48.2,55.5 L0.5,55.5 L0.5,13.5 L48.2,13.5 L48.2,55.5 Z M3.5,52.5 L45.2,52.5 L45.2,16.5 L3.5,16.5 L3.5,52.5 Z"
                                    id="Shape"></path>
                                <path
                                    d="M38,25.7 L35,25.7 L35,11.3 C35,7 31.5,3.5 27.2,3.5 L21.6,3.5 C17.3,3.5 13.8,7 13.8,11.3 L13.8,25.7 L10.8,25.7 L10.8,11.3 C10.8,5.3 15.6,0.5 21.6,0.5 L27.2,0.5 C33.2,0.5 38,5.3 38,11.3 L38,25.7 Z"
                                    id="Shape"></path>
                            </g>
                        </g>
                    </svg>
                    @if(session('basket'))
                        <span class="basket_count">{{ session('basket')->products()->sum('quantity') }}</span>
                    @endif
                </a>
                @auth
                    <li>
                        <a class="menu_user_icon user" href="{{ route('profile.edit') }}"
                           alt="Ссылка на профиль пользователя">
                            {{--                            {{ __('Profile') }}--}}
                            <svg height="31px"
                                 style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                                 viewBox="0 0 32 32" width="28px" xml:space="preserve"
                                 xmlns="http://www.w3.org/2000/svg"

                                 xmlns:xlink="http://www.w3.org/1999/xlink"><path
                                    d="M4.554,23.764c-0.111,0.322 -0.049,0.679 0.163,0.946c2.544,3.201 6.645,5.29 11.273,5.29c4.628,0 8.729,-2.089 11.273,-5.29c0.212,-0.267 0.273,-0.624 0.163,-0.946c-1.538,-4.485 -6.07,-7.764 -11.436,-7.764c-5.366,0 -9.898,3.279 -11.436,7.764Zm2.088,0.131c1.441,-3.458 5.093,-5.895 9.348,-5.895c4.255,0 7.907,2.437 9.348,5.895c-2.206,2.508 -5.577,4.105 -9.348,4.105c-3.771,0 -7.142,-1.597 -9.348,-4.105l0,-0Z"
                                    fill="white"/>
                                <path
                                    d="M15.99,2c-3.312,0 -6,2.689 -6,6c-0,3.311 2.688,6 6,6c3.311,0 6,-2.689 6,-6c-0,-3.311 -2.689,-6 -6,-6Zm-0,2c2.208,0 4,1.792 4,4c-0,2.208 -1.792,4 -4,4c-2.208,0 -4,-1.792 -4,-4c-0,-2.208 1.792,-4 4,-4Z"
                                    fill="white"/></svg>
                        </a>
                    </li>
                    <li>
                        <a class="menu_user_icon user" href="{{ route('logout') }} "
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           alt="Ссылка выход из профиль пользователя">
                            {{--                            {{ __('Log out') }}--}}
                            <svg  width="31px" height="26px"  fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z" fill="white"></path>
                                </g>
                            </svg>

                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @else
                    <li><a class="menu_user_icon user" href="{{ route('login') }}"
                           alt="Ссылка на страницу регистрации и аутентификации">
                            <svg height="31px"
                                 style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                                 viewBox="0 0 32 32" width="28px" xml:space="preserve"
                                 xmlns="http://www.w3.org/2000/svg"

                                 xmlns:xlink="http://www.w3.org/1999/xlink"><path
                                    d="M4.554,23.764c-0.111,0.322 -0.049,0.679 0.163,0.946c2.544,3.201 6.645,5.29 11.273,5.29c4.628,0 8.729,-2.089 11.273,-5.29c0.212,-0.267 0.273,-0.624 0.163,-0.946c-1.538,-4.485 -6.07,-7.764 -11.436,-7.764c-5.366,0 -9.898,3.279 -11.436,7.764Zm2.088,0.131c1.441,-3.458 5.093,-5.895 9.348,-5.895c4.255,0 7.907,2.437 9.348,5.895c-2.206,2.508 -5.577,4.105 -9.348,4.105c-3.771,0 -7.142,-1.597 -9.348,-4.105l0,-0Z"
                                    fill="white"/>
                                <path
                                    d="M15.99,2c-3.312,0 -6,2.689 -6,6c-0,3.311 2.688,6 6,6c3.311,0 6,-2.689 6,-6c-0,-3.311 -2.689,-6 -6,-6Zm-0,2c2.208,0 4,1.792 4,4c-0,2.208 -1.792,4 -4,4c-2.208,0 -4,-1.792 -4,-4c-0,-2.208 1.792,-4 4,-4Z"
                                    fill="white"/></svg>
                            {{--                            Log in--}}
                        </a></li>
                @endauth
                {{--                ______________________--}}
            </div>
            <div class="burger">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
        {{--        /*_______________________________________Кнопка на верх на сайте_________________________________________*/--}}
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="arrow-up-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                      d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/>
            </symbol>
        </svg>


        <div class="btn-up btn-up_hide">
            <svg class="btn-up-icon" role="img" aria-label="Прокрутить страницу к началу">
                <use xlink:href="#arrow-up-short"></use>
            </svg>
        </div>
        {{--        /*_______________________________________(Конец) Кнопка на верх на сайте_________________________________________*/--}}
    </main>
    <footer class="footer">
        <div class="container footer__container">
            <div class="footer__left">
                <ul>
                    <li class="left__item"><a href="{{ route('home_page') }}">
                            <img class="logo-footer"
                                 src="{{ asset('assets/image/Логотип.svg') }}"
                                 alt="Логотип который перебросит Вас на главную страницу"></a></li>
                    <li class="left__item left-text"><a href="{{ route('home_page') }}"
                                                        alt="Надпись магазина которая перебросит Вас на главную страницу">Интернет
                            магазин бытовой
                            кухонной
                            техники</a></li>
                </ul>
            </div>
            <div class="footer__center">
                <ul class="center__list">
                    <li class="header__item">
                        <button class="nav__link header__item-btn2 js-header-dropdown-btn" data-path="two">
                            <strong class="header__item-heading">Каталог</strong>
                            <span class="header__item-icon"></span>
                        </button>
                        <div class="header__dropdown2 js-header-drop" data-target="two">
                            <div class="header__dropdown-wrap" data-simplebar>
                                <ul class="header__drop-list2 reset-list">
                                    <li class="header__dropdown-item2"><a
                                            class="header__item-link header__item-link--tintoretto"
                                            href="{{ route('categories.index') }}"><span
                                                class="header__item-text">Категории</span></a></li>
                                    <li class="header__dropdown-item2"><a
                                            class="header__item-link header__item-link--fridrih"
                                            href="{{ route('brands.index') }}">Бренд</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="center__item"><a class="nav__link" href="{{ route('delivery-payment') }}"
                                                aria-label="Нажав ссылку, Вы переместитесь в раздел доставка и оплата">Доставка
                            и
                            оплата</a></li>
                    <li class="center__item"><a class="nav__link" href="{{ route('contacts') }}"
                                                aria-label="Нажав ссылку, Вы переместитесь в раздел контакты">Контакты</a>
                    </li>
                </ul>
                <p class="center__text">Copyright &copy;&nbsp;2024, Kitchen Nuances, All Rights Reserved</p>
            </div>
            <div class="footer__right">
                <p class="right__text">Переходя по&nbsp;ссылкам ниже, Вы&nbsp;соглашаетесть с&nbsp;их&nbsp;условиями</p>
                <ul>
                    <li class="right__link"><a href="{{ asset('assets/documents/Политика конфиденциальности.pdf') }}"
                                               download="" target="_blank">Политика конфиденциальности</a></li>
                    <li class="right__link"><a
                            href="{{ asset('assets/documents/Политика обработки персональных данных.pdf') }}"
                            download="" target="_blank">Политика обработки персональных данных</a></li>
                </ul>
            </div>
        </div>

    </footer>
</div>

<script src="https://api-maps.yandex.ru/2.1/?apikey=вашAPI-ключ&lang=ru_RU" defer></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js" defer></script>
<script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js" defer></script>
<!-- FingerPrint JS -->
<script src="{{ asset('assets/js/fp2.js') }}" defer></script>
<!-- ChatBot JS -->
<script src="{{ asset('assets/js/chatbot.js') }}" defer></script>
<script src="{{ asset('assets/js/style.js') }}" defer></script>
</body>
</html>
