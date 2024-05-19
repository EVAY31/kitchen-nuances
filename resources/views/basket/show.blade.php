@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Корзина</h1>

        @if ($basket->products->count() > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>Продукт</th>
                    <th>Бренд</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Итого</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($basket->products()->withPivot('price', 'quantity')->get() as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>
                            @if ($product->brand)
                                <img src="{{ asset('storage/' . $product->brand->image) }}" alt="{{ $product->brand->title }}" width="50">
                            @else
                                Без бренда
                            @endif
                        </td>
                        <td>{{ number_format($product->pivot->price, 2, '.', ' ') }} &#8381;</td>
                        <td>
                            <form action="{{ route('basket.update', ['basket' => $basket->id, 'product' => $product->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="action" value="remove">
                                <button type="submit" class="btn btn-sm btn-danger">-</button>
                            </form>
                            {{ $product->pivot->quantity }}
                            <form action="{{ route('basket.update', ['basket' => $basket->id, 'product' => $product->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="action" value="add">
                                <button type="submit" class="btn btn-sm btn-success">+</button>
                            </form>
                        </td>
                        <td>{{ $product->pivot->price * $product->pivot->quantity }} &#8381;</td>
                        <td>
                            <form action="{{ route('basket.update', ['basket' => $basket->id, 'product' => $product->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <form action="{{ route('basket.delete', $basket->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Очистить корзину</button>
            </form>
        @else
            <p>Корзина пуста.</p>
        @endif
    </div>
@endsection
