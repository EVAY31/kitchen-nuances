@extends('layouts.app')
@section('content')
    <section class="container choice">
        <div class="choice_visualization">
            <h2 class="decoration__item">{{ $product->title }}</h2>
            <img class="choice_image" src="{{ asset('storage/' . $product->image) }}" alt="">
        </div>
        <div class="description"><p class="decoration__item">{!! $product->description !!}</p>
            <h3 class="decoration__item">Характеристики:</h3>
            <ul class="decoration__item">

                {{--                        @if(!empty($product->characteristics))--}}
                {{--                            @php--}}
                {{--                                $characteristics = json_decode($product->characteristics, true);--}}
                {{--                            @endphp--}}

                {{--                            @if(is_array($characteristics))--}}
                {{--                                <ul>--}}
                {{--                                    @foreach($characteristics as $key => $value)--}}
                {{--                                        <li>{{ $key }}: {{ $value }}</li>--}}
                {{--                                    @endforeach--}}
                {{--                                </ul>--}}
                {{--                            @else--}}
                {{--                                <p>Некорректные данные характеристик</p>--}}
                {{--                            @endif--}}
                {{--                        @endif--}}


                {{--                        @if(!empty($product->characteristics) && is_array($product->characteristics))--}}
                {{--                            <ul>--}}
                {{--                                @foreach($product->characteristics as $key => $value)--}}
                {{--                                    <li>{{ $key }}: {{ $value }}</li>--}}
                {{--                                @endforeach--}}
                {{--                            </ul>--}}
                {{--                        @endif--}}

                @if(!empty($product->characteristics))
                    @php
                        $characteristics = is_array($product->characteristics) ? $product->characteristics : json_decode($product->characteristics, true);
                    @endphp

                    @if(is_array($characteristics))
                        <ul>
                            @foreach($characteristics as $key => $value)
                                <li>{{ $key }}: {{ $value }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>Некорректные данные характеристик</p>
                    @endif
                @endif
            </ul>
            <p class="decoration__item">Цена: {{ number_format($product->price, 2, '.', ' ') }} &#8381;</p>
            @if(! session('basket'))
                <form class="decoration__item" action="{{ route('basket.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn-add">Добавить в корзину</button>
                </form>
            @else
                <form class="decoration__item" action="{{
                                route('basket.update',
                                [session('basket')->id, $product->slug])
                            }}" method="POST">
                    @csrf
                    <input type="hidden" name="action" value="add">
                    <button type="submit"
                            class="btn-add">{{ session('basket')->products->contains($product->id) ? 'Добавить ещё' : 'Добавить в корзину'}}</button>
                </form>

                @if(session('basket')->products->contains($product->id))
                    <form class="decoration__item" action="{{
                                    route('basket.update',
                                    [session('basket')->id, $product->slug])
                                }}" method="POST">
                        @csrf
                        <input type="hidden" name="action" value="remove">
                        <button type="submit" class="btn-add">Удалить из корзины</button>
                    </form>
                @endif
            @endif
        </div>
    </section>
@endsection
