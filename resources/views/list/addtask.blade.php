@extends('layouts.layout')

@section('content')

<div class="container">
    <form class="row g-3" style="padding-top: 30px" action="/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 style="text-align: center;">Add a Task</h2>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Name</label>
                <input type="text" class="form-control" id="nametask" name="nametask" value="">
            </div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="Program">Program</option>
                    <option value="In Progess">In Progress</option>
                </select>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <label for="validationCustom01" class="form-label">Description</label>
                <textarea type="text" name="description" value="{{ old('message') }}" cols="30" rows="6" class="form-control"></textarea>
            </div>
            <div class="col-md-2"></div>
        </div>
        {{-- <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="form-group d-flex flex-column">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="py-3">
                <div>{{ $errors->first('image') }}</div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div> --}}
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <button type="submit" class="btn btn-dark" style="margin-top: 50px;">Add</button>
            </div>
        </div>
    </form>
</div>
    @endsection