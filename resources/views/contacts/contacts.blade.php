@extends('layouts.app')
@section('content')
    <section class="container contacts">
        <div class="container__left">
            <h2 class="contacts__title">"Kitchen Nuances" - магазин кухонной техники</h2>
            <div class="shop">
                <div class="shop__contacts">
                    <p class="telephone"><a href="tel:+74912500596">Телефон для связи: +7 (4912) 500-596</a></p>
                    <p class="email"><a href="mailto:info@kitchen-nuances.ru">E-mail: info@kitchen-nuances.ru</a></p>
                    <p class="address">Наш адрес: г. Рязань, ул. Чапаева, д. 56</p>
                </div>
                <div class="work-schedule">
                    <h3 class="work-schedule__title">График работы</h3>
                    <div class="work__item"><p>пн-пт</p><p>9:00 - 20:00</p></div>
                    <div class="work__item"><p>сб</p><p>10:00 - 19:00</p></div>
                    <div class="work__item"><p>вс</p><p>10:00 - 18:00</p></div>
                </div>
                <div class="stop">
                    <h3 class="stop__title">Остановка "Центральный рынок"</h3>
                    <p class="bus">Автобус: 15, 20, 21, 24, 27</p>
                    <p class="trolleybus">Троллейбус: 16</p>
                    <p class="minibus">Маршрутка: 77, 88</p>
                </div>
            </div>
        </div>
        <div class="container__right">
            <div class="map" id="map"></div>
        </div>
    </section>
@endsection
