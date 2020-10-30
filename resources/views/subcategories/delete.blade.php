<h1>Subcategory Management: Delete {{ $subcategory->name }}</h1>

<a href="{{ action('SubcategoryController@index') }}">Back to index</a>
<form action="{{ action('SubcategoryController@destroy', [$subcategory->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete">
</form>