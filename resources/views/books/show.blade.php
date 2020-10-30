@extends('layouts/main')

@section('content')



<h1>{{ $book->title }}</h1>
<h2>{{ $book->authors }}</h2>
{{--<img src="{{ asset('img/image.png') }}" alt="">--}}

{{--    domain: books.test/shop/--}}
{{--    current url: http://books.test/shop/books/1--}}
{{--    requested: /img/image.png--}}

{{--    http://books.test/img/image.png--}}
{{--    http://books.test/shop/img/image.png--}}

<img src="{{ $book->image }}" alt="{{ $book->title }}">

<a href="{{ route('books') }}">Back to the index</a>

<h2>Add to cart</h2>

@if (Session::has('order_success_message'))

    <div class="alert alert--success">{{ Session::get('order_success_message') }}</div>

@endif

@if ($errors->addtoorder->count())

    @foreach ($errors->addtoorder->all() as $error)

        <div class="alert alert--error">{{ $error }}</div>

    @endforeach

@endif

<form action="{{ route('books.add-to-order', $book->id) }}" method="post">
    @csrf

    <div class="form-group">
        <label for="">Quantity</label>
        <input type="text" name="quantity" value="{{ old('quantity', 1) }}">

        @foreach ($errors->addtoorder->get('quantity') as $error)
            <div class="form-group__error">{{ $error }}</div>
        @endforeach
        
    </div>

    <button>Add</button>

</form>

<hr>

<h2>Reviews</h2>

@if ($errors->count())
    @foreach ($errors->all() as $error)
        <div class="alert alert-error">{{ $error }}</div>
    @endforeach
@endif

<form method="post" action="{{ action('BookController@storeReview', [$book->id]) }}">
    @csrf
    <p>
        <label>Text</label>
        <input type="text" name="text"/>
    </p>
    <p>
        <label>Rating 0 - 100</label>
        <input type="number" name="rating"/>
    </p>
    <input type="submit">
</form>

@foreach($book->reviews as $review)
    <hr/>
    <p>{{ $review->text }}</p>
    <strong>{{ $review->rating }} / 100</strong>
@endforeach


@endsection

@section('alksfkadsand')

@endsection