<h1>Category Management: Delete {{ $category->name }}</h1>

<a href="{{ action('CategoryController@index') }}">Back to index</a>
<form action="{{ action('CategoryController@destroy', [$category->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete">
</form>

{{-- Todo: List of subcategories --}}