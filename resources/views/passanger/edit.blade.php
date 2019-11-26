@extends('layouts.app')

@section('content')

<?php
    $url = route('update_passanger', ['id'=> $passanger->id]);
?>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('airport') }}">View all Passanger</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('passanger/create') }}">Create a Passanger</a>
    </ul>
</nav>

<h1>Edit {{ $passanger->first_name }}</h1>


<div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ $url }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="first_name" class="form-control" name="first_name" value="{{ $passanger->first_name }}" required>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="last_name" class="form-control" name="last_name" value="{{ $passanger->last_name }}" required>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nationality') ? ' has-error' : '' }}">
                            <label for="nationality" class="col-md-4 control-label">Nationality</label>

                            <div class="col-md-6">
                                <input id="nationality" type="nationality" class="form-control" name="nationality" value="{{ $passanger->nationality }}"required>

                                @if ($errors->has('nationality'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nationality') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('id_card') ? ' has-error' : '' }}">
                            <label for="id_card" class="col-md-4 control-label">Id Card</label>

                            <div class="col-md-6">
                                <input id="id_card" type="id_card" class="form-control" name="id_card" value="{{ $passanger->id_card }}"required>

                                @if ($errors->has('id_card'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_card') }}</strong>
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