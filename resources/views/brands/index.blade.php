@extends('layouts.app')
@section('content')
    <section class="brand-center">
            <div class="container brand__container">
                @foreach ($brands as $brand)
                    <ul class="sorting__list">
                        <li class="brand__item">
                            <a href="{{ route('brands.show', $brand->id) }}">
                                <div class="brand brand__item">
                                    <img class="brand__image" src="{{ asset('storage/' . $brand->image) }}">
                                    <h2 class="brand__title">{{ $brand->title }}</h2>
                                </div>
                            </a>
                        </li>
                    </ul>
                @endforeach
                    {{ $brands->links() }}
            </div>
    </section>
@endsection
