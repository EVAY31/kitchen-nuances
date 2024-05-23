{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <section class="center">--}}
{{--        <div class="container">--}}
{{--            <div class="container center__container">--}}
{{--                @if($products->isEmpty())--}}
{{--                    <p>В этой категории нет продуктов.</p>--}}
{{--                @else--}}
{{--                    @foreach ($products as $product)--}}
{{--                        <a href="{{ route('categories.show', $product->id) }}">--}}
{{--                            <div class="product">--}}
{{--                                <img class="product__image" src="{{ asset('storage/' . $product->image) }}">--}}
{{--                                <h2 class="product__title">{{ $product->title }}</h2>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}


@extends('layouts.app')
@section('content')
    <section class="center">
        <div class="container">
            <div class="container center__container">
                @if($products->isEmpty())
                    <p>В этой категории нет продуктов.</p>
                @else
                    @foreach ($products as $product)
                        <ul class="sorting__list">
                            <li class="category__item">
                                <a href="{{ route('products.show', $product->slug) }}">
                                    <div class="product category__item2">
                                        <img class="product__image" src="{{ asset('storage/' . $product->image) }}">
                                        <h2 class="product__title">{{ $product->title }}</h2>
                                        <p class="product__price">{{ number_format($product->price, 2, '.', ' ') }}
                                            &#8381;</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
