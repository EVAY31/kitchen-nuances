@extends('layouts.app')
@section('content')
    <section class="choice container">
        <div class="choice_visualization">
            <h2 class="decoration__item">{{ $product->title }}</h2>
            <img class="choice_image" src="{{ asset('storage/' . $product->image) }}" alt="">
            </div>
                <div class="description"><p class="decoration__item">{!! $product->description !!}</p>
                    <h3 class="decoration__item">Характеристики:</h3>
                    <ul class="decoration__item">
                        @if(!empty($product->characteristics))
                                <ul>
                                    @foreach($product->characteristics as $key => $value)
                                        <li>{{ $key }}: {{ $value }}</li>
                                    @endforeach
                                </ul>
                        @endif
                    </ul>
                    <p class="decoration__item">Цена: {{ number_format($product->price, 2, '.', ' ') }} &#8381;</p>
                    <form class="decoration__item" action="{{ route('basket.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn-add">Добавить в корзину</button>
                    </form>
                </div>
    </section>
@endsection
