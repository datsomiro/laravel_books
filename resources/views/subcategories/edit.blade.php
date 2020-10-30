<h1>Subcategory Management - Edit Subcategory {{ $subcategory->name }}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ action('SubcategoryController@update', [$subcategory->id]) }}" method="POST">
    @csrf

    @method('PUT')
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @if($subcategory->category_id === $category->id) selected @endif>{{ $category->name }}</option>
        @endforeach
    </select>
    <input type="text" name="name" value="{{ $subcategory->name }}"/>
    <input type="submit" value="submit">
</form>