@extends('layouts.app')

@section('content')
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('airport') }}">View all Airports</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('airport/create') }}">Create a Airport</a>
    </ul>
</nav>

<h1>All the Airports</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Airport Name</td>
            <td>Airport Short Name</td>
            <td>Airport Location</td>
        </tr>
    </thead>
    <tbody>
    @foreach($airport as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->airport_name }}</td>
            <td>{{ $value->airport_short_name }}</td>
            <td>{{ $value->airport_location }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <li><a href="{{ URL::to('airport/' . $value->id . 'show') }}">Show this Airport</a></li>

                <li><a href="{{ URL::to('airport/' . $value->id . '/edit') }}">Edit this Airport</a>

                <li><a href="{{ URL::to('airport/' . $value->id . '/destroy') }}">Delete this Airport</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
@endsection