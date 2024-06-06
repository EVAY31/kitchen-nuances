@extends('layouts.app')
@section('content')
    <section class="category-center">
            <div class="container category__container">
                @foreach ($categories as $category)
                    <a href="{{ route('categories.show', $category->id) }}">
                        <div class="category">
                            <img class="category__image" src="{{ asset('storage/' . $category->image) }}">
                            <h2 class="category__title">{{ $category->title }}</h2>
                        </div>
                    </a>
                @endforeach
                    {{ $categories->links() }}
            </div>
    </section>
@endsection
