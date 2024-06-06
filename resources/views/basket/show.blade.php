@extends('layouts.app')

@section('content')
    <div class="basket-center">
        <div class="container basket__container">
            <h1 class="basket__title">Корзина</h1>

            @if ($basket->products->count() > 0)
                <table class="table">
                    <thead>
                    <tr>
                        <th>Продукт</th>
                        <th>Бренд</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th>Итого</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($basket->products()->withPivot('price', 'quantity')->get() as $product)
                        <tr>
                            <td>{{ $product->title }}</td>
                            <td>
                                @if ($product->brand)
                                    <img src="{{ asset('storage/' . $product->brand->image) }}"
                                         alt="{{ $product->brand->title }}" width="50">
                                @else
                                    Без бренда
                                @endif
                            </td>
                            <td>{{ number_format($product->pivot->price, 2, '.', ' ') }} &#8381;</td>
                            <td class="basket__counter">
                                <form action="{{ route('basket.update', [$basket->id, $product->slug]) }}"
                                      method="POST">
                                    @csrf
                                    <input type="hidden" name="action" value="remove">
                                    <button type="submit" class="btn btn-sm btn-danger">-</button>
                                </form>
                                {{ $product->pivot->quantity }}
                                <form action="{{ route('basket.update', [$basket->id, $product->slug]) }}"
                                      method="POST">
                                    @csrf
                                    <input type="hidden" name="action" value="add">
                                    <button type="submit" class="btn btn-sm btn-success">+</button>
                                </form>
                            </td>
                            <td>{{ $product->pivot->price * $product->pivot->quantity }} &#8381;</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="basket__btn">
                    <form class="clear" action="{{ route('basket.delete', $basket->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-add">Очистить корзину</button>
                    </form>

                    <a href="{{ route('orders.create') }}" class="btn btn-add decoration">Оформить заказ</a>
                </div>
            @else
                <p>Корзина пуста.</p>
            @endif
        </div>
    </div>
@endsection

