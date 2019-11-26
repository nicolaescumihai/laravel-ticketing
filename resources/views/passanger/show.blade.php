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

<h1>Showing {{ $passanger->first_name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $passanger->first_name }}</h2>
        <p>
            <strong>Last Name:</strong> {{ $passanger->last_name }}<br>
            <strong>Nationality</strong> {{ $passanger->nationality }}<br>
            <strong>Id Card</strong> {{ $passanger->id_card }}

        </p>
    </div>

</div>
</body>

@endsection