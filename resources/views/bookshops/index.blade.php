<h1>Index of bookshops</h1>

@foreach ($bookshops as $bookshop)
    <h2>{{ $bookshop->name }}</h2>
    <p>{{ $bookshop->city }}</p>
@endforeach

