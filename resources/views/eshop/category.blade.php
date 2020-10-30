<h1>Category: {{ $category->name }}</h1>

<a href="{{ action('EshopController@index') }}">Back to list of categories</a>

<h2>Subcategories</h2>

<ul>
    @foreach($subcategories as $s)
        <li>{{ $s->name }}</li>
    @endforeach
</ul>

@foreach($books as $b)
    <h3>{{ $b->title }}</h3>
    <p>{{ $b->authors }}</p>
    <img src="{{ $b->image }}" alt="">
@endforeach
