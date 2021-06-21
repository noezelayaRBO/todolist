@extends('layouts.layout')

@section('content')

<div class="container" style="padding-top: 50px;">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-lg-5">
            <h1 style="color: white">Contact Us</h1><br>
            <p style="color: white">Tell us about your suggest</p><br>
            <form action="/contact" method="POST">
                <div class="form-group">
                    <label for="name" style="padding-top: 30px">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">
                    {{ $errors->first('name') }}
                </div>
                <div class="form-group">
                    <label for="email" style="padding-top: 30px">email</label>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">
                    {{ $errors->first('email') }}
                </div>
                <div class="form-group">
                    <label for="message" style="padding-top: 30px">Message</label>
                    <textarea type="text" name="message" value="{{ old('message') }}" cols="30" rows="10" class="form-control" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;"></textarea>
                    {{ $errors->first('message') }} 
                </div>
                @csrf
                <p>Send Message <button type="submit" style="margin-top: 50px; background-color: Transparent;"><i class="bi bi-arrow-right" style="color: red"></i></button></p>
                
            </form>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4" style="background-color: white; height: 550px; padding-top: 50px; padding-left: 50px; padding-right: 50px;">
                <h3 style="color: #e23538;">CONTACTS</h3>
                <p style="color: #e23538; padding-top: 30px;">Phone</p>
                <p>303-000-0000</p>
                <p style="color: #e23538; padding-top: 30px;">E-mail</p>
                <p>example@example.com</p>
                <p style="color: #e23538; padding-top: 30px;">Local</p>
                <p>3828 Piermont Dr, Albuquerque, New Mexico 87112 USA</p>
            </div>
        <div class="col-md-1"></div>
    </div>
    
</div>

@endsection