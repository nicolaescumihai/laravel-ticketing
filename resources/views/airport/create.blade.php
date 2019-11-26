@extends('layouts.app')

@section('content')
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('airport') }}">View all Airports</a>
    </div>
</nav>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a Airport</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('airport') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('passanger_uuid') ? ' has-error' : '' }}">
                            <label for="airport_uuid" hidden class="col-md-4 control-label">airport_uuid</label>

                            <div class="col-md-6">
                                <input id="airport_uuid" type="hidden" class="form-control" name="airport_uuid" value="{{ old('airport_uuid') }}" required autofocus>

                                @if ($errors->has('airport_uuid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('airport_uuid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('airport_name') ? ' has-error' : '' }}">
                            <label for="airport_name" class="col-md-4 control-label">Airport Name</label>

                            <div class="col-md-6">
                                <input id="airport_name" type="airport_name" class="form-control" name="airport_name" value="{{ old('airport_name') }}" required>

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
                                <input id="airport_short_name" type="airport_short_name" class="form-control" name="airport_short_name" required>

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
                                <input id="airport_location" type="airport_location" class="form-control" name="airport_location" required>

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
