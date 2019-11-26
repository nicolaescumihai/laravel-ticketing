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
        <a class="navbar-brand" href="{{ URL::to('plane') }}">View all Planes</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('plane/create') }}">Create a Plane</a>
    </ul>
</nav>

<h1>All the Planes</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Company</td>
            <td>Plane type</td>
            <td>Plane no</td>
        </tr>
    </thead>
    <tbody>
    @foreach($planes as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->company }}</td>
            <td>{{ $value->plane_type }}</td>
            <td>{{ $value->plane_no }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <li><a href="{{ URL::to('plane/' . $value->id . 'show') }}">Show this Plane</a></li>

                <li><a href="{{ URL::to('plane/' . $value->id . '/edit') }}">Edit this Plane</a>

                <li><a href="{{ URL::to('plane/' . $value->id . '/destroy') }}">Delete this Plane</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>