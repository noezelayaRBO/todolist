@extends('layouts.layout')

@section('content')

<div class="container-fluid">
<form class="row g-3" style="padding-top: 30px" action="/updatedaily/{{ $daily->id }}" method="POST">
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col md-12">
            <h2 style="text-align: center;">Edit Task</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Name</label>
            <input type="text" class="form-control" id="nametask" name="nametask" value="{{ old('name') ?? $daily->name }}">
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Description</label>
            <textarea type="text" name="description" value="{{ old('description')}}" cols="30" rows="6" class="form-control" value="{{ old('name') ?? $daily->description }}">{{ $daily->description }}</textarea>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Time</label>
            <input type="time" name="time" id="time" class="form-control" value="{{ $daily->time }}">
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4"></div>
    </div>
</form>
</div>

@endsection