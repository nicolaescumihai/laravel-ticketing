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
        <a class="navbar-brand" href="{{ URL::to('airport') }}">View all Airports</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('airport/create') }}">Create a Airport</a>
    </ul>
</nav>

<h1>Showing {{ $airport->airport_name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $airport->airport_name }}</h2>
        <p>
            <strong>Airport Short Name:</strong> {{ $airport->airport_short_name }}<br>
            <strong>Airport Location:</strong> {{ $airport->airport_location }}
        </p>
    </div>

</div>
</body>
</html>