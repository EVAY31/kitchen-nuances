@extends('layouts.app')
@section('content')
    <section class="center">
        <div class="container">
            <div class="container center__container">
                @foreach ($products as $product)
                    <div class="product">
                        <img class="product__image" src="{{ asset('storage/' . $product->image) }}">
                        <h2 class="product__title">{{ $product->title }}</h2>
                        <p class="product__price">{{ number_format($product->price, 2, '.', ' ') }} &#8381;</p>
                    </div>
                @endforeach
{{--                {{ $products->links() }}--}}
            </div>
        </div>
    </section>
@endsection
