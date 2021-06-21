@extends('layouts.layout')

@section('content')

<div class="container">
<form class="row g-3" style="padding-top: 30px" action="/updatedaily/{{ $daily->id }}" method="POST">
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col md-11">
            <h1 style="color: white; margin-top: 50px;">Edit Task</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label" style="padding-top: 30px">Name</label>
            <input type="text" class="form-control" id="nametask" name="nametask" value="{{ old('name') ?? $daily->name }}" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">
        </div>
        <div class="col-md-7"></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label" style="padding-top: 30px">Description</label>
            <textarea type="text" name="description" value="{{ old('description')}}" cols="30" rows="6" class="form-control" value="{{ old('name') ?? $daily->description }}" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">{{ $daily->description }}</textarea>
        </div>
        <div class="col-md-7"></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label" style="padding-top: 30px">Time</label>
            <input type="time" name="time" id="time" class="form-control" value="{{ $daily->time }}" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">
        </div>
        <div class="col-md-7"></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <p>Edit <button type="submit" style="margin-top: 10px; background-color: Transparent;"><i class="bi bi-arrow-right" style="color: red"></i></button></p>
        </div>
        <div class="col-md-7"></div>
    </div>
</form>
</div>

@endsection