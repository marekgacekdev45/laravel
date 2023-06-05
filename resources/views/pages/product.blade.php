@extends('layout.master')
@section('title', $product->title)
@section('content')

    @if (session()->has('addedToCart'))
        <section class="pop-up">
            <div class="pop-up-box">
                <div class="pop-up-title">
                    {{ session()->get('addedToCart') }}
                </div>
                <div class="pop-up-actions">
                    <a href="{{route('home')}}"><button class="btn btn-outlined">Continue Shoping</button></a>
                    <a href="{{route('cart')}}"><button class="btn btn-primary">Go to Cart</button></a>
                </div>
            </div>
        </section>
    @endif


    <div class="product-page">
        <div class="container">
            <div class="product-page-row">
                <section class="product-page-image">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="">
                </section>
                <section class="product-page-details">
                    <p class="p-title">{{ $product->title }}</p>
                    <p class="p-price">{{ $product->price / 100 }}$</p>
                    <p class="p-category">- {{ $product->category->name }}</p>
                    <p class="p-description">{{ $product->description }}</p>
                    <form action="{{ route('addToCart', $product->id) }}" method="POST">
                        @csrf
                        <div class="p-form">
                            <div class="p-colors">
                                <label for="color">Color</label>
                                <select name="color" id="color" required>
                                    <option value="" selected disabled>-- Color --</option>
                                    @foreach ($product->colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p class="p-quantity">
                                <label for="quanity">Quanity</label>
                                <input type="number" name="quantity" min="1" max="100" value="1" required>
                            </p>
                        </div>
                        <button type="submit" class="btn btn-cart">Add to Cart</button>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection
