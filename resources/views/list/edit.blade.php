@extends('layouts.layout')

@section('content')

<div class="container">
    <form class="row g-3" style="padding-top: 30px" action="/update/{{ $task->id }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 style="text-align: center;">Edit Task</h2>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="nametask" value="{{ old('name') ?? $task->name }}">
            </div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="Program" {{$task->status == 'Program' ? 'selected' : '' }}>Program</option>
                    <option value="In Progress" {{$task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                </select>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <label for="validationCustom01" class="form-label">Description</label>
                <textarea type="text" name="description" value="{{ old('description')}}" cols="30" rows="6" class="form-control" value="{{ old('name') ?? $task->description }}">{{ $task->description }}</textarea>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                {{-- <div class="form-group d-flex flex-column">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="py-3">
                <div>{{ $errors->first('image') }}</div>
                </div> --}}
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <input type="hidden" class="form-control" id="user" name="user" value="{{ auth()->user()->name }}">
                <button type="submit" class="btn btn-dark" style="margin-top: 50px;">Update</button></form>
            <form action="/delete/{{ $task->id }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger" style="margin-top: 20px;">Delete</a>
            </div>
        </div>
    </form>
</div>
    @endsection