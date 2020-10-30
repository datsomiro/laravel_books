<h1>Subcategory Management: {{ $subcategory->name }}</h1>

@if($subcategory->category)
    <p>Category: {{ $subcategory->category->name }}</p>
@endif

<a href="{{ action('SubcategoryController@index') }}">Back to index</a>