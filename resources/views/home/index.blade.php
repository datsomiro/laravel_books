@extends ('layouts.main')

@section('content')

<form action="{{ route('logout') }}" method="post">

    @csrf

    <button>Logout</button>

</form>

@endsection