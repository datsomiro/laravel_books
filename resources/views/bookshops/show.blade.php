<h1>{{ $book->title }}</h1>
<h2>{{ $book->authors }}</h2>
<img src="{{ $book->image }}" alt="{{ $book->title }}">

<a href="{{ route('books') }}">Back to the index</a>

