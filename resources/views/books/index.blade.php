@extends('layouts/main', ['title' => 'List of books'])

@section('content')

<h1>Index of good books</h1>

@foreach ($books as $i => $b)
    <h2>{{ $b->title }}</h2>
    <p>{{ $b->authors }}</p>
    <img src="{{ $b->image }}"/>
    <p>
        <a href="{{ action('BookController@show', $b->id) }}">Detail of book</a>
    </p>
    <div class="reviews">
        @foreach ($b->reviews as $review)
            <div class="review">
                {{ $review->text }}<br>
                {{ $review->star_value }} stars
            </div>
        @endforeach
    </div>

    {{--    <p>--}}
    {{--        {{ url('/books/' . $b->id) }}--}}
    {{--    </p>--}}
    {{--    <p>--}}
    {{--        {{ action('BookController@index') }}--}}
    {{--    </p>--}}
    {{--    --}}
    {{--    <p>--}}
    {{--        {{ action('Auth\LoginController@showLoginForm') }}--}}
    {{--        {{ route('login') }}--}}
    {{--    </p>--}}
    {{--    <p>--}}
    {{--        {{ route('books') }}--}}
    {{--    </p>--}}
@endforeach

@endsection