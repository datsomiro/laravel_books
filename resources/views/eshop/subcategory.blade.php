<h1>Subcategory: {{ $subcategory->name }}</h1>
<a href="">Back to category {{ $category->name }}</a>

@foreach($books as $b)
    <h3>{{ $b->title }}</h3>
    <p>{{ $b->authors }}</p>
    <img src="{{ $b->image }}" alt="">
@endforeach
