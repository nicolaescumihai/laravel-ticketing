@extends('layouts.app')

@section('content')

<?php
    $url = route('update_airport', ['id'=> $airport->id]);
?>
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

<h1>Edit {{ $airport->airport_name }}</h1>


<div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ $url }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('airport_name') ? ' has-error' : '' }}">
                            <label for="airport_name" class="col-md-4 control-label">Airport Name</label>

                            <div class="col-md-6">
                                <input id="airport_name" type="airport_name" class="form-control" name="airport_name"  value="{{ $airport->airport_name }}" required>

                                @if ($errors->has('airport_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('airport_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('airport_short_name') ? ' has-error' : '' }}">
                            <label for="airport_short_name" class="col-md-4 control-label">Airport Short Name</label>

                            <div class="col-md-6">
                                <input id="airport_short_name" type="airport_short_name" class="form-control" name="airport_short_name" value="{{ $airport->airport_short_name }}" required>

                                @if ($errors->has('airport_short_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('airport_short_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('airport_location') ? ' has-error' : '' }}">
                            <label for="airport_location" class="col-md-4 control-label">Airport Location</label>

                            <div class="col-md-6">
                                <input id="airport_location" type="airport_location" class="form-control" name="airport_location" value="{{ $airport->airport_location }}" required>

                                @if ($errors->has('airport_location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('airport_location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </div>
                        </div>
</body>

@endsection