@extends('layouts.app')

@section('content')
<div class="container">
   
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('passanger') }}">View all Passanger</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('passanger/create') }}">Create a Passanger</a>
    </ul>
</nav>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
               
        </div>
    </div>
</div>
@endsection
