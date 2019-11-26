@extends('layouts.app')

@section('content')

<?php
    $url = route('update_plane', ['id'=> $plane->id]);
?>
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

<h1>Edit {{ $plane->company }}</h1>


<div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ $url }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                            <label for="company" class="col-md-4 control-label">Company</label>

                            <div class="col-md-6">
                            <input id="company" type="company" class="form-control" name="company"  value="{{ $plane->company }}" required>

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
                                
                                <select class="form-control" name="plane_type" value="{{ $plane->plane_type }}">
                                
                               
                                @foreach ($plane_types as $key => $value)
                                @if(empty($value))
                                @php 
                                $name = 'Select a Type';
                                @endphp
                                @else 
                                @php 
                                $name = $value;
                                @endphp
                                @endif
                                @if($value === $plane->plane_type)
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
                                <input id="plane_no" type="plane_no" class="form-control" name="plane_no" value="{{ $plane->plane_no }}" required>

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
                                    Edit
                                </button>
                            </div>
                        </div>
</body>

@endsection