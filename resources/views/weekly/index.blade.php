@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-11">
            <h1 style="margin-top: 50px; color: white;">Weekly</h1><br><br>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12">
            <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <p style="color: white;">Add a Weekly Task</p>
                </div>
            </div>
            <form action="/weekly" class="row g-3" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label" style="padding-top: 30px">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">
                    {{ $errors->first('name') }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label" style="padding-top: 30px">Description</label>
                    <textarea type="text" name="description" value="{{ old('message') }}" cols="30" rows="6" class="form-control" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label" style="padding-top: 30px">Day</label>
                    <select name="day" id="day" class="form-control" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px;">
                        <option value="1">Monday</option>
                        <option value="2">Tuesday</option>
                        <option value="3">Wednesday</option>
                        <option value="4">Thursday</option>
                        <option value="5">Friday</option>
                        <option value="6">Saturday</option>
                        <option value="7">Sunday</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label" style="padding-top: 30px">Time</label>
                    <input type="time" name="time" id="time" class="form-control" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">
                    {{ $errors->first('time') }}
                </div>
            </div>
            <div class="row hidden" style="padding-top: 20px">
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label" style="padding-top: 30px">User</label>
                    <input type="hidden" value="{{ auth()->user()->id }}" name="userid" id="userid" >
                    <select class="form-select" name="user" id="user" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px;">
                        <option value="{{ auth()->user()->id }}" selected>{{ auth()->user()->name }} </option>
                    @foreach ($user as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>    
                    @endforeach
                </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" id="email" name="email" value="{{ auth()->user()->email }}">
                    <p>Add <button type="submit" style="margin-top: 10px; background-color: Transparent;"><i class="bi bi-arrow-right" style="color: red"></i></button></p>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
        <div class="col-md-2"></div>
        <div class="col-md-6">
        </div>
            <div class="row" style="padding-top: 50px">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <h1 style="color: white"> My Week </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <table class="table table-hover table-striped">
                        <tbody>
                            <tr style="color: white;">
                                <th scope="col">Monday<br></th>
                                @foreach ($monday as $monday)                                        
                                    <td><a href="/weekly/{{ $monday->id }}/index" style="color: white;">{{ $monday->name }}</a><br><input type="time" disabled value="{{ $monday->time }}" style="color: white; background-color: Transparent;"></td>    
                                @endforeach
                            </tr>
                            <tr>
                                <th  style="color: white;">Tuesday<br></th>
                                @foreach ($tuesday as $tuesday)
                                        <td><a href="/weekly/{{ $tuesday->id }}/index" style="color: white;">{{ $tuesday->name }}</a><br><input type="time" disabled value="{{ $tuesday->time }}" style="color: white; background-color: transparent;"></td>
                                @endforeach
                            </tr>
                            <tr>
                                <th style="color: white;">Wednesday<br></th>
                                @foreach ($wednesday as $wednesday)
                                        <td><a href="/weekly/{{ $wednesday->id }}/index" style="color: white;">{{ $wednesday->name }}</a><br><input type="time" disabled value="{{ $wednesday->time }}" style="color: white; background-color: transparent;"></td>    
                                @endforeach
                            </tr>    
                            <tr>
                                <th style="color: white;">Thursday<br></th>
                                @foreach ($thursday as $thursday)
                                        <td><a href="/weekly/{{ $thursday->id }}/index" style="color: white;">{{ $thursday->name }}</a><br><input type="time" disabled value="{{ $thursday->time }}" style="color: white; background-color: transparent;"></td>
                                @endforeach
                            </tr>
                            <tr>
                                <th style="color: white;">Friday<br></th>
                                @foreach ($friday as $friday)
                                        <td><a href="/weekly/{{ $friday->id }}/index" style="color: white;">{{ $friday->name }}</a><br><input type="time" disabled value="{{ $friday->time }}" style="color: white; background-color: transparent;"></td>
                                @endforeach
                            </tr>
                            <tr>
                                <th style="color: white;">Saturday<br></th>
                                @foreach ($saturday as $saturday)
                                        <td><a href="/weekly/{{ $saturday->id }}/index" style="color: white;">{{ $saturday->name }}</a><br><input type="time" disabled value="{{ $saturday->time }}" style="color: white; background-color: transparent;"></td>    
                                @endforeach
                            </tr>
                            <tr>
                                <th style="color: white;">Sunday<br></th>
                                @foreach ($sunday as $sunday)
                                        <td><a href="/weekly/{{ $sunday->id }}/index" style="color: white;">{{ $sunday->name }}</a><br><input type="time" disabled value="{{ $sunday->time }}" style="color: white; background-color: transparent;"></td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>{{--md6--}}
    </div>{{--Row--}}
</div>{{-- container--}}

<style>
    div.hidden{
        display:none;
    }
</style>
@if ( $weekly == 1)
<style>
    div.hidden{
        display:flex;
    }
</style>
@endif  



@endsection