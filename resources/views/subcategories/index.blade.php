<h1>Subategories Management</h1>

<a href="{{ action('SubcategoryController@create') }}">Create new Subcategory</a>
@foreach($subcategories as $subcategory)
    <p>
        <a href="{{ action('SubcategoryController@show', $subcategory->id) }}">
            <strong>{{ $subcategory->name }}</strong>
        </a>

        <a href="{{ action('SubcategoryController@edit', [$subcategory->id]) }}">Update</a>

        <a href="{{ action('SubcategoryController@delete', [$subcategory->id]) }}">Delete</a>

        <form action="{{ action('SubcategoryController@destroy', [$subcategory->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete without asking">
        </form>



    </p>
@endforeach