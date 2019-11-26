

@extends('layouts.app')

@section('content')
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('ticket') }}">View all Tickets</a>
    </div>
</nav>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a Ticket</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('ticket') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('ticket_uuid') ? ' has-error' : '' }}">
                            <label for="ticket_uuid" hidden class="col-md-4 control-label">ticket_uuid</label>

                            <div class="col-md-6">
                                <input id="ticket_uuid" type="hidden" class="form-control" name="ticket_uuid" value="{{ old('ticket_uuid') }}" required autofocus>
ticket_uuid
                                @if ($errors->has('ticket_uuid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ticket_uuid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ticket_type') ? ' has-error' : '' }}">
                            <label for="ticket_type" class="col-md-4 control-label">Ticket type</label>

                            <div class="col-md-6">
                                <!-- <input id="plane_type" type= select class="form-control" name="plane_type" required> -->
                                
                                <select class="form-control" name="ticket_type">
                                
                               
                                @foreach ($type as $key => $value)
                                @if(empty($value))
                                <option value="">Select a Type</option>
                                @else
                                <option value="{{ $value }}"> {{ $value }}</option>
                                @endif
                                @endforeach
                                </select>
                                @if ($errors->has('ticket_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ticket_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ticket_status') ? ' has-error' : '' }}">
                            <label for="ticket_status" class="col-md-4 control-label">Ticket status</label>

                            <div class="col-md-6">
                                <!-- <input id="plane_type" type= select class="form-control" name="plane_type" required> -->
                                
                                <select class="form-control" name="ticket_status">
                                
                               
                                @foreach ($status as $key => $value)
                                @if(empty($value))
                                <option value="">Select a Type</option>
                                @else
                                <option value="{{ $value }}"> {{ $value }}</option>
                                @endif
                                @endforeach
                                </select>
                                @if ($errors->has('ticket_status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ticket_status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

