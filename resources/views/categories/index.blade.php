<h1>Categories Management</h1>

<a href="{{ action('CategoryController@create') }}">Create new category</a>
@foreach($categories as $category)
    <p>
        <a href="{{ action('CategoryController@show', $category->id) }}">
            <strong>{{ $category->name }}</strong>
        </a>

        <a href="{{ action('CategoryController@edit', [$category->id]) }}">Update</a>

        <form action="{{ action('CategoryController@destroy', [$category->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete">
        </form>

    </p>
@endforeach