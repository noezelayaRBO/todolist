@extends('layouts.layout')

@section('content')

<div class="container" style="margin-top: 70px;">
    <div class="row">
        <div class="col-md-12">
            <p class="fs-2" style="text-align: center">Welcome {{ auth()->user()->name }}</p>
        </div>
    </div>
     <div class="row">
        <div class="col-md-12" style="text-align: center">
            <a href="/create/{{ auth()->user()->id }}" class="btn btn-dark" style="margin-top: 50px; margin-right: 25px;">Add Task</a>
            <a href="/mytask/{{ auth()->user()->name }}" class="btn btn-dark" style="margin-top: 50px; margin-left: 25px;">My Task</a> 
    </div>
</div>
     
@endsection
