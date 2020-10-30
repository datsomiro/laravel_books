<h1>Books Eshop</h1>

<h2>Categories</h2>
<ul>
    @foreach($categories as $c)
        <li>
            <a href="">{{ $c->name }}</a>
        </li>
    @endforeach
</ul>

{{--@include('books/index')--}}

<h2>Books</h2>
@foreach($books as $b)
    <h3>{{ $b->title }}</h3>
    <p>{{ $b->authors }}</p>
    <img src="{{ $b->image }}"/>
@endforeach


