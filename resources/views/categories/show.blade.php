<h1>Category Management: {{ $category->name }}</h1>

<a href="{{ action('CategoryController@index') }}">Back to index</a>

<h2>Subcategories</h2>

@foreach($category->subcategories as $subcategory)
    <p>{{ $subcategory->name }}</p>
@endforeach