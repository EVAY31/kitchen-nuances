@extends('layouts.app')
@section('content')
    <div class="orders-center">
        <section class="container orders">
            <form action="{{ route('orders.store', [session('basket')->id]) }}" method="POST" class="orders__form">
                @csrf
                <div class="form-group orders__form">
                    <label for="email">Email</label>
                    <input
                        required
                        type="email"
                        class="form-control form-control_color"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                        placeholder="Enter"
                        value="{{ auth()->user() ? auth()->user()->email : '' }}">
                    <small id="emailHelp" class="form-text text-muted">Ваша почта для связи</small>
                </div>
                <div class="form-group">
                    <label for="tel">Телефон</label>
                    <input
                        required
                        type="tel"
                        class="form-control form-control_color"
                        id="tel"
                        placeholder="+77777777777"
                        value="{{ auth()->user() ? (auth()->user()->phones->first()->phone ?? '') : '' }}">
                    <small id="phoneHelp" class="form-text text-muted">Ваш телефон для связи</small>
                </div>
                <div class="form-group orders__form">
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
                        @foreach(session('basket')->products as $product)
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
                        </tbody>
                    </table>
                    <p>Общая сумма: {{ session('basket')
                ->products
                ->sum(function($product) {
                    return $product->pivot->price * $product->pivot->quantity;
                })
            }}</p>
                </div>
                {{--                <div class="orders__btn">--}}
                <button type="submit" class="btn btn-add">Оформить</button>
                {{--                   --}}
                {{--                </div>--}}

            </form>
            <form action="{{ route('basket.delete', session('basket')->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-add btn-delete">Удалить заказ</button>
            </form>
        </section>
    </div>
@endsection
