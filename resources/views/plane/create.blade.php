@extends('layouts.app')

@section('content')
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('plane') }}">View all Airports</a>
    </div>
</nav>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a Plane</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('plane') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('plane_uuid') ? ' has-error' : '' }}">
                            <label for="plane_uuid" hidden class="col-md-4 control-label">plane_uuid</label>

                            <div class="col-md-6">
                                <input id="plane_uuid" type="hidden" class="form-control" name="plane_uuid" value="{{ old('plane_uuid') }}" required autofocus>

                                @if ($errors->has('plane_uuid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plane_uuid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                            <label for="company" class="col-md-4 control-label">Company</label>

                            <div class="col-md-6">
                                <input id="company" type="company" class="form-control" name="company" value="{{ old('company') }}" required>

                                @if ($errors->has('company'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('plane_type') ? ' has-error' : '' }}">
                            <label for="plane_type" class="col-md-4 control-label">Plane type</label>

                            <div class="col-md-6">
                                <!-- <input id="plane_type" type= select class="form-control" name="plane_type" required> -->
                                
                                <select class="form-control" name="plane_type">
                                
                               
                                @foreach ($plane as $key => $value)
                                @if(empty($value))
                                <option value="">Select a Type</option>
                                @else
                                <option value="{{ $value }}"> {{ $value }}</option>
                                @endif
                                @endforeach
                                </select>
                                @if ($errors->has('plane_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plane_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('plane_no') ? ' has-error' : '' }}">
                            <label for="plane_no" class="col-md-4 control-label">Plane No</label>

                            <div class="col-md-6">
                                <input id="plane_no" type="plane_no" class="form-control" name="plane_no" required>

                                @if ($errors->has('plane_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plane_no') }}</strong>
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
