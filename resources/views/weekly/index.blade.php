@extends('layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: center; margin-top: 50px;">Weekly</h2><br><br>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12">
            <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <div class="row">
                <div class="col-md-12" style="text-align: center">
                    <h4>Add a Weekly Task</h4>
                </div>
            </div>
            <form action="/weekly" class="row g-3" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <label for="validationCustom01" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="">
                    {{ $errors->first('name') }}
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <label for="validationCustom01" class="form-label">Description</label>
                    <textarea type="text" name="description" value="{{ old('message') }}" cols="30" rows="6" class="form-control"></textarea>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <label for="validationCustom01" class="form-label">Day</label>
                    <select name="day" id="day" class="form-control">
                        <option value="1">Monday</option>
                        <option value="2">Tuesday</option>
                        <option value="3">Wednesday</option>
                        <option value="4">Thursday</option>
                        <option value="5">Friday</option>
                        <option value="6">Saturday</option>
                        <option value="7">Sunday</option>
                    </select>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <label for="validationCustom01" class="form-label">Time</label>
                    <input type="time" name="time" id="time" class="form-control">
                    {{ $errors->first('time') }}
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row hidden" style="padding-top: 20px">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <input type="hidden" value="{{ auth()->user()->id }}" name="userid" id="userid">
                    <select class="form-select" name="user" id="user">
                        <option value="{{ auth()->user()->id }}" selected>{{ auth()->user()->name }} </option>
                    @foreach ($user as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>    
                    @endforeach
                </select>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <button type="submit" class="btn btn-dark" style="margin-top: 10px;">Add</button>
                </div>
                <div class="col-md-1"></div>
            </form>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
        <div class="col-md-2"></div>
        <div class="col-md-6">
        </div>
            <div class="row" style="padding-top: 50px">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h4 style="text-align: center"> My Week </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table table-hover table-striped">
                        <tbody>
                            <tr>
                                <th scope="col">Monday<br></th>
                                @foreach ($monday as $monday)                                        
                                    <td><a href="/weekly/{{ $monday->id }}/index">{{ $monday->name }}</a><br><input type="time" disabled value="{{ $monday->time }}"></td>    
                                @endforeach
                            </tr>
                            <tr>
                                <th>Tuesday<br></th>
                                @foreach ($tuesday as $tuesday)
                                        <td><a href="/weekly/{{ $tuesday->id }}/index">{{ $tuesday->name }}</a><br><input type="time" disabled value="{{ $tuesday->time }}"></td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Wednesday<br></th>
                                @foreach ($wednesday as $wednesday)
                                        <td><a href="/weekly/{{ $wednesday->id }}/index">{{ $wednesday->name }}</a><br><input type="time" disabled value="{{ $wednesday->time }}"></td>    
                                @endforeach
                            </tr>    
                            <tr>
                                <th>Thursday<br></th>
                                @foreach ($thursday as $thursday)
                                        <td><a href="/weekly/{{ $thursday->id }}/index">{{ $thursday->name }}</a><br><input type="time" disabled value="{{ $thursday->time }}"></td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Friday<br></th>
                                @foreach ($friday as $friday)
                                        <td><a href="/weekly/{{ $friday->id }}/index">{{ $friday->name }}</a><br><input type="time" disabled value="{{ $friday->time }}"></td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>Saturday<br></th>
                                @foreach ($saturday as $saturday)
                                        <td><a href="/weekly/{{ $saturday->id }}/index">{{ $saturday->name }}</a><br><input type="time" disabled value="{{ $saturday->time }}"></td>    
                                @endforeach
                            </tr>
                            <tr>
                                <th>Sunday<br></th>
                                @foreach ($sunday as $sunday)
                                        <td><a href="/weekly/{{ $sunday->id }}/index">{{ $sunday->name }}</a><br><input type="time" disabled value="{{ $sunday->time }}"></td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-1"></div>
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