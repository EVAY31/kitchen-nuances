@extends('layouts.app')
@section('content')
    <section class="choice container">
        <div class="choice_visualization">
            <h2>{{ $product->title }}</h2>
            <img class="choice_image" src="{{ asset('storage/' . $product->image) }}" alt="">
            </div>
                <div class="description"><p>{{ $product->description }}</p>
                    <h3>Характеристики:</h3>
                    <ul>
                        @foreach(json_decode($product->characteristics, true) as $key => $value)
                            <li>{{ $key }}: {{ $value }}</li>
                        @endforeach
                    </ul>
                    <p>Цена: {{ number_format($product->price, 2, '.', ' ') }} &#8381;</p>
                    <form action="{{ route('basket.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        {{--            <button type="submit" class="btn btn-primary">Добавить в корзину</button>--}}
                        <button type="submit" class="btn-add">Добавить в корзину</button>
                    </form>
                </div>
    </section>
@endsection
