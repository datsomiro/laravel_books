<h1>Category Management - Edit category {{ $category->name }}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ action('CategoryController@update', [$category->id]) }}" method="POST">
    @csrf

    @method('PUT')

    <input type="text" name="name" value="{{ $category->name }}"/>
    <input type="submit" value="submit">
</form>