<h1>Create new book</h1>
<form action="{{ action('BookshopController@store') }}" method="post">
    @csrf
    <p>
        <label for="name">Name:</label>
        <input id="name" type="text" name="name" required/>
    </p>
    <p>
        <label for="city">City:</label>
        <input id="city" type="text" name="city" required/>
    </p>
    <button type="submit">Create</button>
</form>
