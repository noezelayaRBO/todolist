@extends('layouts.layout')

@section('content')

<div class="container" style="padding-top: 50px;">
    <div class="row">
        <div class="col-lg-12"><h1>Contact Us</h1></div>
    </div>
    <form action="/contact" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            {{ $errors->first('name') }} 
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input type="text" name="email" value="{{ old('email') }}" class="form-control">
            {{ $errors->first('email') }}
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea type="text" name="message" value="{{ old('message') }}" cols="30" rows="10" class="form-control"></textarea>
            {{ $errors->first('message') }} 
        </div>
        @csrf
        <button type="submit" class="btn btn-dark" style="margin-top: 50px;">Send Message</button>
        
        
        

    </form>

@endsection