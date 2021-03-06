@extends('layouts.layout')

@section('content')

<div class="container" style="padding-top: 50px">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="padding_top: 50px; color: white">Edit {{ $info->name }}</h1>
                </div>
            </div>
            <form class="row g-3" style="padding-top: 30px" action="/weekly/{{ $info->id }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" value="{{ auth()->user()->id }}" name="userid" id="userid">
                        <label for="validationCustom01" class="form-label" style="padding-top: 30px">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $info->name }}" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">
                        {{ $errors->first('name') }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label" style="padding-top: 30px">Description</label>
                    <textarea type="text" name="description" value="{{ old('message') }}" cols="30" rows="6" class="form-control" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">{{ $info->description }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label" style="padding-top: 30px">Day</label>
                        <select name="day" id="day" class="form-control" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px;">
                            <option value="1" {{ $info->day == 'Monday' ? 'selected' : '' }}>Monday</option>
                            <option value="2" {{ $info->day == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                            <option value="3" {{ $info->day == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                            <option value="4" {{ $info->day == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                            <option value="5" {{ $info->day == 'Friday' ? 'selected' : '' }}>Friday</option>
                            <option value="6" {{ $info->day == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                            <option value="7" {{ $info->day == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label" style="padding-top: 30px">Time</label>
                        <input type="time" name="time" id="time" class="form-control" value="{{ $info->time }}" style="background-color: Transparent; border: none; border-bottom: 2px solid #858585; border-radius: 0px; color: white;">
                        {{ $errors->first('time') }}
                    </div>
                </div>
                <div class="row hidden" style="padding-top: 20px">
                    <div class="col-md-12">
                        <input type="hidden" value="{{ auth()->user()->id }}" name="userid" id="userid">
                        <label for="validationCustom01" class="form-label" style="padding-top: 30px">User</label>
                        <select class="form-select" name="user" id="user">
                            <option value="{{ auth()->user()->id }}" selected>{{ auth()->user()->name }} </option>
                        @foreach ($user as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>    
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>Edit <button type="submit" style="margin-top: 10px; background-color: Transparent;"><i class="bi bi-arrow-right" style="color: red"></i></button></p>
                    </div>
                </div>

            </form>


        </div>
        <div class="col-md-7"></div>
    </div>{{--row--}}
</div>{{--container--}}

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