@extends('layouts.app')
@section('content')
    <section class="center">
        <div class="container">
            <div class="container center__container">
                @foreach ($categories as $category)
                    <a href="{{ route('categories.show', $category->id) }}">
                        <div class="product">
                            <img class="product__image" src="{{ asset('storage/' . $category->image) }}">
                            <h2 class="product__title">{{ $category->title }}</h2>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection



