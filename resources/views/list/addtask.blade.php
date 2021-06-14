@extends('layouts.layout')

@section('content')

<div class="container-fluid" style="margin-top: 70px;">
    <form class="row g-3" style="padding-top: 30px" action="/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <h2 style="text-align: center;">Add a Task</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Name</label>
                    <input type="text" class="form-control" id="nametask" name="nametask" value="">
                    {{ $errors->first('nametask') }}
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Description</label>
                <textarea type="text" name="description" value="{{ old('message') }}" cols="30" rows="6" class="form-control"></textarea>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Start Day</label>
                <input type="date" name="date" id="date" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                {{ $errors->first('date') }}<br>
                <label for="validationCustom01" class="form-label">Finish Day</label>
                <input type="date" name="datefinish" id="datefinish" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                {{ $errors->first('datefinish') }}<br>
                <label for="validationCustom01" class="form-label">Time End</label>
                <input type="time" name="time" id="time" class="form-control">
                {{ $errors->first('time') }}
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row hidden" style="padding-top: 20px">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <select class="form-select"name="user" id="user">
                    <option value="{{ auth()->user()->name }}" selected>{{ auth()->user()->name }} </option>
                @foreach ($user as $user)
                    <option value="{{ $user->name }}">{{ $user->name }}</option>    
                @endforeach
            </select>
            </div>
        </div>
            <style>
                div.hidden{
                    display:none;
                }
            </style>
            @if ( $id == 1)
            <style>
                div.hidden{
                    display:flex;
                }
            </style>
            @endif
            
            
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <input type="hidden" id="email" name="email" value="{{ auth()->user()->email }}">
                <button type="submit" class="btn btn-dark" style="margin-top: 50px;">Add</button>
                <input type="hidden" class="form-control" id="username" name="username" value="{{ auth()->user()->name }}">
            </div>
        </div>
    </form>
</div>
    @endsection