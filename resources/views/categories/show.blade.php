@extends('layouts.app')

@section('content')
    <section class="center">
        <div class="container">
            <div class="container center__container">
                @if($products->isEmpty())
                    <p>В этой категории нет продуктов.</p>
                @else
                    @foreach ($products as $product)
                        <a href="{{ route('categories.show', $product->id) }}">
                            <div class="product">
                                <img class="product__image" src="{{ asset('storage/' . $product->image) }}">
                                <h2 class="product__title">{{ $product->title }}</h2>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection