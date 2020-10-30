@extends('layouts/main')

@section('content')

<h1>Create new book</h1>
<form action="{{ action('BookController@store') }}" method="post">
    @csrf
{{-- /resources/views/components/form-group.blade.php --}}
    @component('components/form-group', ['label' => 'Title'])

        <input id="title" type="text" name="title"/>

    @endcomponent

    @component('components/form-group', ['label' => 'Authors'])
        
        <input id="authors" type="text" name="authors"/>

    @endcomponent
    
    @component('components/form-group', ['label' => 'Image'])
    
        <input id="image" type="text" name="image" value="https://www.codingbootcamp.cz/img/cbp_logo-dark.png"/>

    @endcomponent

    <button type="submit">Create</button>
</form>

@endsection