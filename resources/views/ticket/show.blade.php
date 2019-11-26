@extends('layouts.app')

@section('content')

<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('ticket') }}">View all Ticket</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('ticket/create') }}">Create a Ticket</a>
    </ul>
</nav>

<h1>Showing {{ $ticket->company }} </h1>

    <div class="jumbotron text-center">
        <!-- <h2>{{ $ticket->plane_no }}</h2> -->
        <p>
            <strong>Type:</strong> {{ $ticket->ticket_type }}<br>
            <strong>Status</strong> {{ $ticket->ticket_status }}<br>
        </p>
    </div>

</div>
</body>

@endsection