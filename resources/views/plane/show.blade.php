@extends('layouts.app')

@section('content')

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

<h1>Showing {{ $plane->company }}  {{ $plane->plane_no }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $plane->plane_no }}</h2>
        <p>
            <strong>Company:</strong> {{ $plane->company }}<br>
            <strong>Plane Type</strong> {{ $plane->plane_type }}<br>
            <strong>Plane No</strong> {{ $plane->plane_no }}

        </p>
    </div>

</div>
</body>

@endsection