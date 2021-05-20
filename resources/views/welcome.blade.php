@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="fs-2">Welcome User</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="/create" class="btn btn-dark">Add Task</a>
            <a href="/mytask" class="btn btn-dark">My Task</a>
        </div>
    </div>
</div>

@endsection
