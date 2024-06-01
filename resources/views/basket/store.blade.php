@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Добавление в корзину</h1>

        <form action="{{ route('basket.store') }}" method="POST">
            @csrf
            <div>
                <label for="product_id">Выберите продукт:</label>
                <select name="product_id" id="product_id">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Добавить в корзину</button>
        </form>
    </div>
@endsection
