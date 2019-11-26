@extends('layouts.app')

@section('content')

<?php
    $url = route('update_ticket', ['id'=> $ticket->id]);
?>
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

<h1>Edit {{ $ticket->ticket_status }}</h1>


<div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ $url }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('	ticket_type') ? ' has-error' : '' }}">
                            <label for="	ticket_type" class="col-md-4 control-label">Ticket type</label>

                            <div class="col-md-6">
                                <!-- <input id="plane_type" type= select class="form-control" name="plane_type" required> -->
                                
                                <select class="form-control" name="	ticket_type" value="{{ $ticket->ticket_type }}">
                                
                               
                                @foreach ($types as $key => $value)
                                @if(empty($value))
                                @php 
                                $name = 'Select a Type';
                                @endphp
                                @else 
                                @php 
                                $name = $value;
                                @endphp
                                @endif
                                @if($value === $ticket->ticket_type)
                                @php 
                                $selected = 'selected';
                                @endphp
                                @else
                                @php 
                                $selected = '';
                                @endphp
                                @endif
                                <option value = {{$value}} {{$selected}}> {{$name}} </option>

                                @endforeach
                                </select>
                                @if ($errors->has('	ticket_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('	ticket_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('	ticket_status') ? ' has-error' : '' }}">
                            <label for="	ticket_status" class="col-md-4 control-label">Ticket type</label>

                            <div class="col-md-6">
                                <!-- <input id="plane_type" type= select class="form-control" name="plane_type" required> -->
                                
                                <select class="form-control" name="	ticket_status" value="{{ $ticket->ticket_status }}">
                                
                               
                                @foreach ($status as $key => $value)
                                @if(empty($value))
                                @php 
                                $name = 'Select a Type';
                                @endphp
                                @else 
                                @php 
                                $name = $value;
                                @endphp
                                @endif
                                @if($value === $ticket->ticket_status)
                                @php 
                                $selected = 'selected';
                                @endphp
                                @else
                                @php 
                                $selected = '';
                                @endphp
                                @endif
                                <option value = {{$value}} {{$selected}}> {{$name}} </option>

                                @endforeach
                                </select>
                                @if ($errors->has('	ticket_status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('	ticket_status') }}</strong>
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