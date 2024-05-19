@extends('layouts.app')
@section('content')
    <section class="center">
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide slide-1"></div>
                <div class="swiper-slide slide-2"></div>
                <div class="swiper-slide slide-3"></div>
                <div class="swiper-slide slide-4"></div>
                <div class="swiper-slide slide-5"></div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
        <div class="container center__container">
            @foreach ($products as $product)
                <a href="{{ route('products.show', $product->slug) }}">
                    <div class="product">
                        <img class="product__image" src="{{ asset('storage/' . $product->image) }}">
                        <h2 class="product__title">{{ $product->title }}</h2>
                        <p class="product__price">{{ number_format($product->price, 2, '.', ' ') }} &#8381;</p>
                    </div>
                </a>
            @endforeach
            {{ $products->links() }}
        </div>
    </section>
@endsection
