@extends('layouts.app')

@section('content')
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('passanger') }}">View all Passanger</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('passanger/create') }}">Create a Passanger</a>
    </ul>
</nav>

<h1>All the Passangers</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Nationality</td>
            <td>Id Card</td>
        </tr>
    </thead>
    <tbody>
    @foreach($passangers as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->first_name }}</td>
            <td>{{ $value->last_name }}</td>
            <td>{{ $value->nationality }}</td>
            <td>{{ $value->id_card }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <li><a href="{{ URL::to('passanger/' . $value->id . 'show') }}">Show this Passanger</a></li>

                <li><a href="{{ URL::to('passanger/' . $value->id . '/edit') }}">Edit this Passanger</a>

                <li><a href="{{ URL::to('passanger/' . $value->id . '/destroy') }}">Delete this Passanger</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
@endsection

