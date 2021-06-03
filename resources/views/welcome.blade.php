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
    </div>
</div>

@endsection
