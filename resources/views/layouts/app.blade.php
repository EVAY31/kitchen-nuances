<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/fonts/OpenSans-Regular.ttf') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/OpenSans-Regular.woff') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/OpenSans-Regular.woff2') }}">
    <link href="https://unpkg.com/simplebar@latest/dist/simplebar.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
{{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @vite(['resources/js/app.js'])

</head>
<body>
<div class="site-container">
    <header class="header">
        <div class="container header__container">
            <nav class="nav header__nav">
                {{--                    -----------------------------------------Выпадающий список-------------------------------------------}}
                <ul class="header__list reset-list">
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
                                            href="{{ route('categories.index') }}"><span
                                                class="header__item-text">Категории</span></a></li>
                                    <li class="header__dropdown-item"><a
                                            class="header__item-link header__item-link--fridrih"
                                            href="{{ route('brands.index') }}">Бренд</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                {{--                    ----------------------------------------(Конец кода)-Выпадающий список-------------------------------------------}}
                <ul class="nav__list list-reset header-nav__list">
                    <li class="nav__item"><a class="nav__link" href="{{ route('delivery-payment') }}"
                                             aria-label="Нажав ссылку, Вы переместитесь в раздел доставка и оплата">Доставка
                            и оплата</a></li>
                    <li class="nav__item"><a class="nav__link" href="{{ route('contacts') }}"
                                             aria-label="Нажав ссылку, Вы переместитесь в раздел контакты">Контакты</a>
                    </li>
                </ul>
            </nav>
            <a href="{{ route('home_page') }}"><img class="logo" src="{{ asset('assets/image/Логотип.svg') }}"
                                                    alt="Логотип"></a>
            <div class="menu_user">
{{--                <a class="menu_user_icon basket" href="{{ route('basket.show') }}">--}}
{{--                                    <a class="menu_user_icon basket" href="{{ route('basket.show', session('basket_id')) }}">--}}
{{--                </a>--}}
                <a class="menu_user_icon user">
                    <svg height="31px"
                         style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                         version="1.1" viewBox="0 0 32 32" width="28px" xml:space="preserve"
                         xmlns="http://www.w3.org/2000/svg"
                         {{--                         xmlns:serif="http://www.serif.com/"--}}
                         xmlns:xlink="http://www.w3.org/1999/xlink"><path
                            d="M4.554,23.764c-0.111,0.322 -0.049,0.679 0.163,0.946c2.544,3.201 6.645,5.29 11.273,5.29c4.628,0 8.729,-2.089 11.273,-5.29c0.212,-0.267 0.273,-0.624 0.163,-0.946c-1.538,-4.485 -6.07,-7.764 -11.436,-7.764c-5.366,0 -9.898,3.279 -11.436,7.764Zm2.088,0.131c1.441,-3.458 5.093,-5.895 9.348,-5.895c4.255,0 7.907,2.437 9.348,5.895c-2.206,2.508 -5.577,4.105 -9.348,4.105c-3.771,0 -7.142,-1.597 -9.348,-4.105l0,-0Z"
                            fill="white"/>
                        <path
                            d="M15.99,2c-3.312,0 -6,2.689 -6,6c-0,3.311 2.688,6 6,6c3.311,0 6,-2.689 6,-6c-0,-3.311 -2.689,-6 -6,-6Zm-0,2c2.208,0 4,1.792 4,4c-0,2.208 -1.792,4 -4,4c-2.208,0 -4,-1.792 -4,-4c-0,-2.208 1.792,-4 4,-4Z"
                            fill="white"/></svg>
                </a>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="footer">
        <div class="container footer__container">
            <div class="footer__left">
                <ul>
                    <li class="left__item"><a href="{{ route('home_page') }}"><img class="logo-footer"
                                                                                   src="{{ asset('assets/image/Логотип.svg') }}"
                                                                                   alt="Логотип"></a></li>
                    <li class="left__item"><a href="{{ route('home_page') }}">Интернет магазин бытовой кухонной
                            техники</a></li>
                </ul>
            </div>
            <div class="footer__center">
                <ul class="center__list">
                    <li class="center__item"><a href="#">Каталог</a></li>
                    <li class="center__item"><a href="{{ route('delivery-payment') }}">Доставка и оплата</a></li>
                    <li class="center__item"><a href="{{ route('contacts') }}">Контакты</a></li>
                </ul>
                <p class="center__text">Copyright &copy;&nbsp;2024, Kitchen Nuances, All Rights Reserved</p>
            </div>
            <div class="footer__right">
                <p class="right__text">Переходя по&nbsp;ссылкам ниже, Вы&nbsp;соглашаетесть с&nbsp;их&nbsp;условиями</p>
                <a href="{{ route('documents.index') }}" class="right__link">Политика конфиденциальности
                    <br>Политика обработки персональных данных</a>
                {{--                <ul>--}}
                {{--                    <li class="right__link"><a  href="{{ asset('assets/documents/Политика конфиденциальности.pdf') }}" download="">Политика конфиденциальности</a></li>--}}
                {{--                    <li class="right__link"><a  href="{{ asset('assets/documents/Политика обработки персональных данных.pdf') }}" download="">Политика обработки персональных данных</a></li>--}}
                {{--                    <a class="main" href="2.7_Skillbox_Layout.docx" download="">Скачать программу курса</a>--}}
                {{--                </ul>--}}
            </div>
        </div>

    </footer>

    {{--    <a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>--}}
    {{--<script src="{{ asset('assets/js/jquery.js') }}"></script>--}}
    {{--<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>--}}
    {{--<script src="{{ asset('assets/js/particles.min.js') }}"></script>--}}
    {{--<script src="{{ asset('assets/js/app.js') }}"></script>--}}
    {{--<script src="{{ asset('assets/js/jquery.parallax.js') }}"></script>--}}
    {{--<script src="{{ asset('assets/js/smoothscroll.js') }}"></script>--}}
    {{--<script src="{{ asset('assets/js/custom.js') }}"></script>--}}
</div>
<script src="https://api-maps.yandex.ru/2.1/?apikey=вашAPI-ключ&lang=ru_RU" defer></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js" defer></script>
<script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js" defer></script>
<script src="{{ asset('assets/js/style.js') }}" defer></script>
</body>
</html>
