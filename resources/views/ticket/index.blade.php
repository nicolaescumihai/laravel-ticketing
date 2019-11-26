<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('ticket') }}">View all Tickets</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('ticket/create') }}">Create a Ticket</a>
    </ul>
</nav>

<h1>All the Tickets</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Ticket Type</td>
            <td>Ticket Status</td>
        </tr>
    </thead>
    <tbody>
    @foreach($tickets as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->ticket_type }}</td>
            <td>{{ $value->ticket_status }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <li><a href="{{ URL::to('ticket/' . $value->id . 'show') }}">Show this Ticket</a></li>

                <li><a href="{{ URL::to('ticket/' . $value->id . '/edit') }}">Edit this Ticket</a>

                <li><a href="{{ URL::to('ticket/' . $value->id . '/destroy') }}">Delete this Ticket</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>