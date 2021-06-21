@extends('layouts.layout')

@section('content')

<div class="container" style="margin-top: 50px;">
    <form class="row g-3" style="padding-top: 30px" action="/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11">
                <h1 style="color: white;">Add a Task</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Name</label>
                    <input type="text" class="form-control" id="nametask" name="nametask" value="" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">
                    {{ $errors->first('nametask') }}
            </div>
            <div class="col-md-7"></div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Description</label>
                <textarea type="text" name="description" value="{{ old('message') }}" cols="30" rows="6" class="form-control"  style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;"></textarea>
            </div>
            <div class="col-md-7"></div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Start Day</label>
                <input type="date" name="date" id="date" class="form-control" min="<?php echo date('Y-m-d'); ?>"  style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">
                {{ $errors->first('date') }}<br>
                <label for="validationCustom01" class="form-label">Finish Day</label>
                <input type="date" name="datefinish" id="datefinish" class="form-control" min="<?php echo date('Y-m-d'); ?>"  style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">
                {{ $errors->first('datefinish') }}<br>
                <label for="validationCustom01" class="form-label">Time End</label>
                <input type="time" name="time" id="time" class="form-control" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">
                {{ $errors->first('time') }}
            </div>
            <div class="col-md-7"></div>
        </div>
        <div class="row hidden" style="padding-top: 20px">
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <select class="form-select"name="user" id="user"  style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px;">
                    <option value="{{ auth()->user()->name }}" selected>{{ auth()->user()->name }} </option>
                @foreach ($user as $user)
                    <option value="{{ $user->name }}">{{ $user->name }}</option>    
                @endforeach
            </select>
            </div>
            <div class="col-md-7"></div>
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
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <input type="hidden" id="email" name="email" value="{{ auth()->user()->email }}">
                    <p>Add <button type="submit" style="margin-top: 10px; background-color: Transparent;"><i class="bi bi-arrow-right" style="color: red"></i></button></p>
                    <input type="hidden" class="form-control" id="username" name="username" value="{{ auth()->user()->name }}">
                </div>
                <div class="col-md-7"></div>
            </div>
            
        </div>
        
    </form>

    @endsection