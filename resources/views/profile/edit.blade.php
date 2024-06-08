@extends('layouts.app')

@section('content')
    <div class="edit-center">
        <h2><strong>Имя: </strong>{{ $user->name }}</h2>
        <br>
        <p><strong>Email: </strong>
            {{ $user->email }}
        </p>
        <br>
        @foreach($user->phones as $phone)
            <p><strong>Телефон: </strong>
                {{ $phone->phone }}
            </p>
            <br>
        @endforeach
        @foreach($user->addresses as $address)
            <p><strong>Адрес: </strong>
                {{ $address->address }}
            </p>
            <br>
        @endforeach
        @foreach($orders as $order)
            <table class="table">
                <thead>
                <tr>
                    <th>Номер заказа</th>
                    <th>Бренд</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Итого</th>
{{--                    <th>Статус заказа</th>--}}
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $order->id }}</td>
                </tr>
                @foreach($order->products as $product)
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
                            {{ $product->pivot->quantity }}
                        </td>
                        <td>{{ $product->pivot->price * $product->pivot->quantity }} &#8381;</td>
                    </tr>
                @endforeach
                <tr>
                    <td><strong>Статус заказа: </strong> {{ __('order.status.' . $order->status) }}</td>
                </tr>
                </tbody>
            </table>
        @endforeach
    </div>
@endsection
