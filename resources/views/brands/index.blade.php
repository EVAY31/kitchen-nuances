@extends('layouts.app')
@section('content')
    <section class="center">
        <div class="container">
            <div class="container center__container">
                @foreach ($brands as $brand)
                    <ul class="sorting__list">
                        <li class="brand__item">
                            <a href="{{ route('brands.show', $brand->id) }}">
                                <div class="product brand__item">
                                    <img class="product__image" src="{{ asset('storage/' . $brand->image) }}">
                                    <h2 class="product__title">{{ $brand->title }}</h2>
                                </div>
                            </a>
                        </li>
                    </ul>
                @endforeach
            </div>
        </div>
    </section>
@endsection
